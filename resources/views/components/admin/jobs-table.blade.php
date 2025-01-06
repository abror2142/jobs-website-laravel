@props(['jobs'])

<table class="w-full text-gray-500 dark:text-gray-400 table-auto border-collapse border border-gray-600">
    <thead class="text-gray-700 bg-gray-50 uppercase dark:bg-gray-700 dark:text-gray-400">
        <th scope="col" class="w-full px-3 py-3 border border-gray-400">Info</th>
        <th scope="col" class="px-3 py-3 border border-gray-400">Published</th>
        <th scope="col" class="px-3 py-3 border border-gray-400">Delete</th>
        <th scope="col" class="px-3 py-3 border border-gray-400">Update</th>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
            <x-admin.jobs-table-row href="/jobs/{{ $job->id }}/" :job="$job" >
            </x-admin.jobs-table-row>
        @endforeach
    </tbody>
</table>

{{ $jobs->links() }}