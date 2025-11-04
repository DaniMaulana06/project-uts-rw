<h2>Halo, {{ session('admin_name') }}!</h2>
<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
