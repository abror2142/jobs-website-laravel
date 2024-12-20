<x-app-layout>
    <div class="mt-5 w-full max-w-5xl mx-auto flex flex-col gap-4 ">
        <p class="text-2xl font-bold text-center text-gray-50">Jobs</p>
        @foreach ($jobs as $job)
            <x-job-list-item>
                <x-slot:jobTitle>
                    {{ $job->title }}
                </x-slot:jobTitle>
                <x-slot:jobCreated>
                    {{ $job->created_at }}
                </x-slot:jobCreated>
                <x-slot:jobUpdated>
                    {{ $job->updated_at }}
                </x-slot:jobUpdated>
            </x-job-list-item>
        @endforeach
        {{$jobs->links()}}
    </div>
</x-app-layout>