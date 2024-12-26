<form class="bg-transparent" method="POST" {{ $attributes }} >
    @csrf
    @method('DELETE')

    <button type="submit" class="">
        <i class="fa-solid fa-trash text-2xl text-red-600"></i>
    </button>
</form>