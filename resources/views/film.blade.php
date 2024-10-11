@extends('./layouts/main')
@section('content')
<section class="min-vh-100 bg-dark">
    @include('./partials/navbar')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="text-white mb-4">Film</h1>
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
            @foreach ($film as $filmItem)
            <div class="col-sm-6 col-lg-3">
                <div class="card bg-dark border-light text-light">
                    <div class="card-body">
                        <h5 class="card-title mb-0">{{$filmItem->title}}</h5>
                        <small>{{$filmItem->genre->name}}</small>
                        <p class="card-text mt-2">{{$filmItem->description}}</p>
                        <div class="d-flex gap-2 justify-content-between">
                            <button class="btn btn-warning" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modalEdit{{$filmItem->id}}">Edit</button>
                            <form action="/film/delete/{{$filmItem->id}}" method="POST" style="width: 100%">
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
        <form action="/film/add" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Film</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div>
                    <label for="genreId" class="form-label">Genre</label>
                    <select name="genre_id" id="genreId" class="form-control" required>
                        <option value="">Pilih Genre</option>
                        @foreach($genre as $genreItem)
                            <option value="{{ $genreItem->id }}">{{ $genreItem->name }}</option>
                        @endforeach
                    </select>
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
@foreach ($film as $filmItemModal)
<div class="modal fade" id="modalEdit{{$filmItemModal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-light">
        <div class="modal-content bg-dark">
        <form action="/film/update/{{$filmItemModal->id}}" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Film</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$filmItemModal->title}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$filmItemModal->description}}</textarea>
                </div>
                <div>
                    <label for="genreId" class="form-label">Genre</label>
                    <select name="genre_id" id="genreId" class="form-control" required>
                        <option value="">Pilih Genre</option>
                        @foreach($genre as $genreItem)
                            <option value="{{ $genreItem->id }}" {{ $filmItemModal->genre_id == $genreItem->id ? 'selected' : '' }}>
                                {{ $genreItem->name }}
                            </option>
                        @endforeach
                    </select>
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