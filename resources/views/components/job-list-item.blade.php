<div {{ $attributes->merge(['class' => 'dark:text-gray-50 px-4 py-3 bg-gray-800 flex justify-between items-center rounded hover:bg-gray-700'])}} >
    <a class="flex flex-col gap-2 grow" href="/jobs/{{ $jobId }}">
        <p class="text-2xl font-semibold">{{ $jobTitle }}</p>
        <div class="flex gap-4 text-sm">
            <p><span class="font-medium">Created at: </span>{{ $jobCreated }}</p>
            <p><span class="font-medium">Updated at: </span>{{ $jobUpdated }}</p>
        </div>
    </a>

    <div class="flex gap-3">
        <x-delete-button action="/jobs/{{ $jobId }}"></x-delete-button>
        
        <a href="/jobs/{{$jobId}}/edit/">
            <i class="fa-solid fa-file-pen text-2xl text-blue-600"></i>
        </a>
    </div>

    {{ $slot }}
</div>