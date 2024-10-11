<div class="container mb-3">
    <form action="/search" method="POST" class="d-flex gap-3">
        @csrf
        <input class="form-control" type="text" name="keyword" placeholder="Search films...">
        <button type="submit" class="btn btn-warning">Search</button>
    </form>
</div>
