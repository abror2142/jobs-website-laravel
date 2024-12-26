<form action="{{ route('logout') }}" method="POST">
    @csrf
    <x-auth.secondary-button type="submit">Logout
    </x-auth.secondary-button>
</form>