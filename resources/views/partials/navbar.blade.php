<div class="d-flex gap-3 justify-content-center py-3">
    <a class="btn {{ $active =='film' ? 'btn-warning' : 'btn-secondary'}}" href="/film">Film</a>
    <a class="btn {{ $active =='genre' ? 'btn-warning' : 'btn-secondary'}}" href="/genre">Genre</a>
    <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-secondary" type="submit">Logout</button>
    </form>
</div>