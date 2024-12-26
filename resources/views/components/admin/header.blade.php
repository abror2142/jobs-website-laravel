<div class="bg-gray-200 flex justify-between items-center px-6 py-4">
    <div class="w-[150px] h-[40px] bg-gray-600">

    </div>

    <div class="flex gap-3 items-center px-3 py-1.5 rounded-full bg-gray-300">
        <div class="w-[40px] h-[40px] rounded-full bg-gray-600">

        </div>
        <div class="">
            {{ request()->user()->name }}
        </div>
    </div>
    <div>
        <x-admin.logout-form></x-admin.logout-form>
    </div>
</div>