@props(['job'])

<div {{ $attributes->merge(['class' => 'px-4 py-3 bg-gray-200 flex justify-between items-center rounded dark:hover:bg-gray-700 dark:bg-gray-800 dark:text-gray-50 '])}} >
    <a class="flex flex-col gap-2 grow" href="/jobs/{{ $job->id }}">
        <p class="text-2xl font-semibold">{{ $job->title }}</p>
        <div class="flex gap-4 text-sm">
            <p><span class="font-medium">Created at: </span>{{ $job->created_at }}</p>
            <p><span class="font-medium">Updated at: </span>{{ $job->updated_at }}</p>
        </div>
    </a>

    <div class="flex gap-3">
        <x-admin.delete-button action="/jobs/{{ $job->id }}"></x-admin.delete-button>
        
        <a href="/jobs/{{$job->id}}/edit/">
            <i class="fa-solid fa-file-pen text-2xl text-blue-600"></i>
        </a>
    </div>

    {{ $slot }}
</div>