<x-admin-layout>
    <div class="flex flex-col gap-4 px-8 py-2">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl">Profile</h1>
            <a 
                class="font-semibold text-blue-700 flex gap-3 items-center text-blue border 
                       border-blue-400 rounded-md border-1 px-3 py-1 hover:bg-gray-200">
                <p class="text-lg">Update</p>
                <i class="fa-solid fa-pen"></i>
            </a>
        </div>

        <div class="w-full flex gap-4">
            <div class="flex flex-col gap-2 items-center justify-center">
                @if ($user_info->image_url)
                    <img src="{{ asset($user_info->image_url) }}" class="rounded-full bg-gray-200" width="120px" height="120px"/>
                @else
                    <p class="w-[120px] h-[120px] rounded-full bg-gray-200 text-7xl text-gray-500 flex items-center justify-center">
                        @if ($user_info->first_name !== NULL && $user_info->last_name !== NULL)
                            {{ $user_info->first_name[0] . $user_info->last_name[0] }}
                        @else
                            NP
                        @endif
                    </p>
                @endif
                <form method="POST" action="/admin/profile/image-upload" enctype="multipart/form-data" class="userImageForm">
                    @csrf
                    <label for="uploadUserImage"
                        class="flex bg-gray-800 hover:bg-gray-700 text-white text-base px-3 py-1 outline-none rounded w-max cursor-pointer mx-auto font-[sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mr-2 fill-white inline" viewBox="0 0 32 32">
                            <path
                            d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                            data-original="#000000" />
                            <path
                            d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                            data-original="#000000" />
                        </svg>
                            @if (auth()->user()->image == NULL)
                                Upload
                            @else
                                Change
                            @endif
                        <input type="file" id='uploadUserImage' class="hidden" name="image" onchange="form.submit()" />
                    </label>
                </form>
            </div>

            <div class="bg-gray-200 flex-1">
            </div>
        </div>

        <div class="grid grid-cols-3 gap-12 w-full">
            <div class="col-start-1 flex flex-col gap-4 items-center">
                
                
                <div class="flex items-center border border-black rounded-md w-full">
                    <label for="username" class="px-4 bg-blue-600 h-full flex items-center"><i class="fa-solid fa-user text-lg text-white"></i></label>
                    <input id="username" class="rounded-md flex-1 border-none" disabled value="{{ auth()->user()->name }}"/>
                </div>

                <div class="flex items-center border border-black rounded-md w-full">
                    <label for="email" class="px-4 bg-blue-600 h-full flex items-center"><i class="fa-solid fa-envelope text-lg text-white"></i></label>
                    <input id="email" class="rounded-md flex-1 border-none" disabled value="{{ auth()->user()->email }}"/>
                </div>

                <div class="flex items-center border border-black rounded-md w-full">
                    <label for="username" class="px-4 bg-blue-600 h-full flex items-center"><i class="fa-solid fa-key text-lg text-white"></i></label>
                    <input id="username" type="password" class="rounded-md flex-1 border-none" disabled value="12345678"/>
                </div>

                <div class="flex justify-center"> 
                    <button class="rounded-md bg-blue-600 px-4 py-2 text-white ">Change Password</button>
                </div>
                
            </div>

            <div class="col-start-2 col-span-2 space-y-2">
                <div class="flex gap-4">
                    <div class="flex-1 flex flex-col gap-1">
                        <label for="firstName" class="no-wrap">First Name</label>
                        <input id="firstName" class="rounded-md" placeholder="First Name" value="{{ $user_info->first_name }}" disabled/>
                    </div>

                    <div class="flex-1 flex flex-col gap-1">
                        <label for="middleName">Middle Name</label>
                        <input id="middleName" class=" rounded-md" placeholder="Middle Name" value="{{ $user_info->middle_name }}" disabled />
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="lastName">Last Name</label>
                    <input id="lastName" class="rounded-md" placeholder="Last Name" value="{{ $user_info->last_name }}" disabled />
                </div>

                <div class="flex flex-col gap-1">
                    <label for="dateOfBirth">Date Of Birth</label>
                    <input class="rounded-md" id="dateOfBirth" type="date" value="{{ $user_info->date_of_birth }}" disabled/>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="flex gap-1 flex-col">
                        <label for="personalPhoneNumber">Personal Phone Number</label>
                        <input id="personalPhoneNumber" class="rounded-md" value="{{ $user_info->personal_phone_number }}"/>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="homePhoneNumber">Home Phone Number</label>
                        <input id="homePhoneNumber" class="rounded-md" value="{{ $user_info->home_phone_number }}" />
                    </div>
                    
                    <div class="flex gap-1 flex-col">
                        <label for="workPhoneNumber">Work Phone Number</label>
                        <input id="workPhoneNumber" class="rounded-md" value="{{ $user_info->work_phone_number }}"/>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-admin-layout>