<div class="bg-gray-200 flex justify-between items-center px-6 py-4">
    <div class="w-[150px] h-full bg-gray-600">

    </div>

    <div class="group relative flex flex-col gap-3 items-center">
        <!-- Profile Section -->
        <div class="flex items-center h-12">

            <div class="bg-gray-300 rounded-s-full
                        group-hover:rounded-none group-hover:rounded-tl-3xl">
                <img src="{{ asset(auth()->user()->user_info->image_url) }}" width="50px" class="rounded-full" />
            </div>

            <p class="px-2 pr-6 bg-gray-300 h-full flex items-center justify-center rounded-e-full
                        group-hover:rounded-none group-hover:rounded-tr-3xl">
                {{ request()->user()->name }}
            </p>
    
        </div>
    
        <!-- Logout Forms -->
        <div class="invisible group-hover:visible flex flex-col items-center justify-between gap-2 bg-gray-300
                    absolute top-0 translate-y-1/2 left-0 w-full px-4 py-3
                    rounded-b-3xl">
            <x-admin.logout-form></x-admin.logout-form>
            <a href="" class="flex gap-2 justify-between items-center w-full hover:bg-gray-400 px-2 py-1">
                Settings
                <i class="fa-solid fa-gear"></i>
            </a>
        </div>
    </div>
</div>