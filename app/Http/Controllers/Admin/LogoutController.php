<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * destroy the admin login session
    */
    public function __invoke(Request $request)
    {
        try {
            auth()->guard('admin')->logout();

            return redirect()->route('admin.login');

        } catch (QueryException $exception) {
            return response()->json([
                'response' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
