@if(Session::has('flash_message'))
<div class="alert-danger">
    {{Session::get('flash_message')}}
</div>
@endif