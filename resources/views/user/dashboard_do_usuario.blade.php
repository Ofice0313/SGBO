@extends('user/templates/dashboard_layout')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <h1>dashboard do Usuário</h1>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.nav-link').on('click', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            $.get(url, function(data){
                $('#main-content').html(data);
            });
        });
    });
</script>
@endpush
