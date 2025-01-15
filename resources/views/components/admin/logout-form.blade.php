<form action="{{ route('logout') }}" method="POST" class="w-full">
    @csrf
    <button class="bg-transparent flex gap-2 justify-between items-center w-full hover:bg-gray-400 px-2 py-1" type="submit">
        Logout
        <i class="fa-solid fa-person-walking-arrow-right"></i>
    </button>
</form>