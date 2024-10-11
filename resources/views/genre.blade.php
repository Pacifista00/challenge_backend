@extends('./layouts/main')
@section('content')
<section class="min-vh-100 bg-dark">
    @include('./partials/navbar')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="text-white mb-4">Genre</h1>
            <button class="btn btn-warning py-2 px-5 fs-6" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger p-2" role="alert">
                @foreach ($errors->all() as $error)
                    <small>{{ $error }}</small><br>
                @endforeach
            </div>
        @endif
        <hr class="text-white">
        <div class="row">
            @foreach ($genre as $genreItem)
            <div class="col-sm-6 col-lg-3">
                <div class="card bg-dark border-light text-light">
                    <div class="card-body">
                        <h5 class="card-title">{{ $genreItem->name }}</h5>
                        <div class="d-flex gap-2 justify-content-between">
                            <button class="btn btn-warning" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modalEdit{{$genreItem->id}}">Edit</button>
                            <form action="/genre/delete/{{$genreItem->id}}" method="POST" style="width: 100%">
                                @csrf
                                <button type="submit" class="btn btn-warning" style="width: 100%">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- modal tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-light">
        <div class="modal-content bg-dark">
        <form action="/genre/add" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Genre</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Add</button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- end modal tambah --}}

{{-- modal edit --}}
@foreach ($genre as $modalGenreItem)
<div class="modal fade" id="modalEdit{{$modalGenreItem->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-light">
        <div class="modal-content bg-dark">
        <form action="/genre/update/{{$modalGenreItem->id}}" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Genre</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $modalGenreItem->name }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
{{-- end modal edit --}}
@endsection