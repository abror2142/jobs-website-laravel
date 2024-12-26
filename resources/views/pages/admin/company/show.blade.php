<x-app-layout>
    <p class="text-center text-2xl font-bold dark:text-gray-50">Job Detail</p>
    <p class="text-xl font-semibold dark:text-gray-50">{{$job->title}}</p>
    <p class="text-md dark:text-gray-50">{{ $job->short_description }}</p>
    <p class="text-md dark:text-gray-50">{{ $job->full_description }}</p>
</x-app-layout>