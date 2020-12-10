@if(request()->session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="fas fa-thumbs-up mr-3"></i></span>
    <span class="alert-text"><strong>Berhasil!</strong> {{ session('success') }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif