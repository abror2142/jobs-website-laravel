@props(['job'])

<tr {{ $attributes->merge(['class' => 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'])}} >
    <td scope="row" class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white border border-gray-400">
        <a class="flex flex-col grow" href="/jobs/{{ $job->id }}">
            <p class="text-2xl font-semibold">{{ $job->title }}</p>
            <div class="flex gap-4 text-sm">
                <p><span class="font-medium">Created at: </span>{{ $job->created_at }}</p>
                <p><span class="font-medium">Updated at: </span>{{ $job->updated_at }}</p>
            </div>
        </a>
    </td>
    
    <td class="text-center border border-gray-400">
        <input 
            id="list-active-checkbox" 
            type="checkbox" value=""  
            @checked($job->active == 1) 
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 
                focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
            onclick=""

        />  
    </td>
    
    <td class="text-center border border-gray-400">
        <x-admin.delete-button action="/jobs/{{ $job->id }}"></x-admin.delete-button>
    </td>
    
    <td class="text-center border border-gray-400"> 
        <a href="/jobs/{{$job->id}}/edit/">
            <i class="fa-solid fa-file-pen text-2xl text-blue-600"></i>
        </a>
    </td>
    {{ $slot }}
</tr>