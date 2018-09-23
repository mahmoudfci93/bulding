
@if(Session::has('flash_message'))
    <script>
        swal({
            title: "{{Session::get('flash_message')}}",
            text: "اضغط حسناً للإستمرار",
            icon: "success",
            button: "حسناً"
        });
    </script>
@endif