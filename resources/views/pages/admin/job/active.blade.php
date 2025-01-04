<x-admin-layout>
    <div class="mt-5 w-full max-w-5xl mx-auto flex flex-col gap-4 ">
        @foreach ($jobs as $job)
            <x-admin.job-list-item href="/jobs/{{ $job->id }}/" :job="$job" >
            </x-admin.job-list-item>
        @endforeach
        {{$jobs->links()}}
    </div>
</x-admin-layout>