
<script src="{{asset('assets/js/toastr/sweetalert2@11.js')}}"></script>
<script src="{{asset('assets/js/toastr/sweetalert.min.js')}}"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
