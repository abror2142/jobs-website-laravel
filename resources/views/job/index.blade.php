<x-app-layout>
    <div class="mt-5 w-full max-w-5xl mx-auto flex flex-col gap-4 ">
        <div class="flex justify-end">
            <a class=" flex gap-4  items-center rounded px-4 py-2 bg-gray-700 text-gray-50 hover:bg-gray-600" href="/jobs/create/">
                <p>Create Job</p>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <p class="text-2xl font-bold text-center text-gray-50">Jobs</p>
        @foreach ($jobs as $job)
            <x-job-list-item href="/jobs/{{ $job->id }}/">
                <x-slot:jobTitle>
                    {{ $job->title }}
                </x-slot:jobTitle>
                <x-slot:jobCreated>
                    {{ $job->created_at }}
                </x-slot:jobCreated>
                <x-slot:jobUpdated>
                    {{ $job->updated_at }}
                </x-slot:jobUpdated>
                <x-slot:jobId>
                    {{ $job->id }}
                </x-slot:jobId>
            </x-job-list-item>
        @endforeach
        {{$jobs->links()}}
    </div>
</x-app-layout>