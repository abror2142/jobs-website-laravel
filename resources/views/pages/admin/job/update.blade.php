<x-admin-layout>
  <form method="POST" action="/admin/jobs/{{$job->id}}" class="max-w-2xl m-auto bg-gray-800 p-6 dark:text-gray-50 mt-10">
    @csrf
    @method('PUT')

    <h2 class="text-2xl font-bold text-center">Update Job</h2>
    
    <!-- Category Selection -->
    <div id="category-container">
      <div id="category_0_div">
        <label for="category_0" class="block text-lg font-medium text-gray-700">Category</label>
        <select id="category_0" name="category_0" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
          <option value="">Select Category</option>
          @foreach ($categories as $category)
            <option 
              value="{{ $category->id }}" 
              {{ $job->category_id == $category->id ? 'selected' : '' }}
            >
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Job Title -->
    <div class="mb-4">
      <label for="title" class="block font-medium ml-1">Job Title</label>
      <input 
        type="text" 
        name="title" 
        id="title" 
        value="{{ old('title', $job->title) }}" 
        class="rounded-md block w-full px-3 py-1.5 text-gray-900 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        placeholder="Senior Manager"
      >
    </div>

    <!-- Tags -->
    <div class="mb-6">
      <p class="block text-sm font-medium text-gray-700 mb-2">Select Tags:</p>
      <div class="flex flex-wrap gap-2">
        @foreach($tags as $tag)
          <label 
            class="block cursor-pointer px-4 py-2 rounded-md border border-gray-300 bg-gray-200 text-gray-700 hover:bg-gray-300 transition duration-200 {{ $job->tags->contains($tag->id) ? 'bg-blue-500 text-white hover:bg-blue-400' : '' }}"
          >
            <input 
              type="checkbox" 
              name="tags[]" 
              value="{{ $tag->id }}" 
              class="hidden"
              {{ $job->tags->contains($tag->id) ? 'checked' : '' }}
            >
            {{ $tag->name }}
          </label>
        @endforeach
      </div>
    </div>

    <!-- Short Description -->
    <div class="mb-4">
      <label for="short_description" class="block font-medium ml-1">Short Description</label>
      <input 
        type="text" 
        name="short_description" 
        id="short_description" 
        value="{{ old('short_description', $job->short_description) }}" 
        class="rounded-md block w-full px-3 py-1.5 text-gray-900 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        placeholder="Brief description of the job"
      >
    </div>

    <!-- Full Description -->
    <div class="mb-4">
      <label for="full_description" class="block font-medium ml-1">Full Description</label>
      <textarea 
        name="full_description" 
        id="full_description" 
        rows="3" 
        class="block w-full rounded-md px-3 py-1.5 text-gray-900 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      >{{ old('full_description', $job->full_description) }}</textarea>
    </div>

    <!-- Active Checkbox -->
    <div class="flex items-center mb-4">
      <input 
        id="active-checkbox" 
        type="checkbox" 
        name="active" 
        value="1"
        {{ $job->active ? 'checked' : '' }}
        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
      >
      <label for="active-checkbox" class="ml-2 text-sm font-medium text-gray-700">Active (will be published)</label>
    </div>

    <!-- Submit Button -->
    <div class="flex items-center justify-center">
      <button 
        type="submit" 
        class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-500"
      >
        Save
      </button>
    </div>
  </form>
</x-admin-layout>
