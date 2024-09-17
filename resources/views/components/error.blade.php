@if($errors->any())
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{$errors->first()}}</strong>
    </div>
@endif