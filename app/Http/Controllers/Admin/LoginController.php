<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display Admin Login Page
    */
    public function login(): View  | RedirectResponse
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return \view('admin.auth.login');
    }

    /**
     * Admin Auth Check
    */
    public function authCheck(AdminLoginRequest $request): JsonResponse
    {
        try {
            $credentials = $request->validated();

            // Attempt to authenticate the admin user
            if (auth()->guard('admin')->attempt($credentials)) {

                return response()->json([
                    'response' => Response::HTTP_OK,
                    'type' => 'success',
                    'message' => 'Welcome to Dashboard'
                ]);
            }
            // Authentication failed
            return response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'error',
                'message' => 'Invalid credentials'
            ]);

        } catch (QueryException $exception) {
            return response()->json([
                'response' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
