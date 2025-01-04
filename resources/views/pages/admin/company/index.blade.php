<x-admin-layout>
   <div class="max-w-2xl mx-auto mt-10 dark:text-gray-50">
        <p class="text-xl font-semibold">
            {{ $company->name }} 
        </p>
        <p>
            {{ $company->short_description }}
        </p>
        <p>
            {{ $company->full_description }}
        </p>
        <img src="{{asset($company->logo)}}" />
    </div>
</x-admin-layout>