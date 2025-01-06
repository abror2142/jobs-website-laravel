<x-admin-layout> 
    <form method="POST" action="/admin/jobs" class="max-w-xl m-auto bg-gray-200 rounded dark:bg-gray-800 px-6 dark:text-gray-50 py-4 space-y-4">
      @csrf
     
        <h2 class="text-2xl font-bold text-center">Create Job</h2>
        
        <div id="category-container">
          <!-- First Select: Top-level categories -->
          <div id="category_0_div">
              <label for="category_0" class="block text-lg font-medium text-gray-700">Category</label>
              <select id="category_0" name="category_0" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
          </div>
        </div>
      
        
      <!-- Job Title -->
      <div class="">
        <label for="title" class="block font-medium ml-1">Job title.</label>
        <div class="flex items-center rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
          <input type="text" name="title" id="title" class="rounded-md block min-w-0 grow py-1.5 pl-3 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Senior Manager">
        </div>
      </div>

        <!-- Tags -->
      <div class="mb-6">
        <p class="block text-sm font-medium text-gray-700 mb-2">Select Tags:</p>
        <div class="flex flex-wrap gap-2">
            @foreach($tags as $tag)
              <label 
                  class="block cursor-pointer px-4 py-2 rounded-md border border-gray-300 bg-gray-200 text-gray-700 hover:bg-gray-300 transition duration-200"
              >
                  <input 
                      type="checkbox" 
                      name="tags[]" 
                      value="{{ $tag->id }}" 
                      class="hidden"
                      onchange="this.parentElement.classList.toggle('bg-blue-500'); this.parentElement.classList.toggle('text-white'); this.parentElement.classList.toggle('hover:bg-blue-400')"
                  >
                  {{ $tag->name }}
              </label>
            @endforeach
        </div>
      </div>
      

        <div class="">
          <label for="short_description" class="block font-medium ml-1">Short description.</label>
          <div class="flex items-center rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            <input type="text" name="short_description" id="short_description" class="rounded-md block min-w-0 grow py-1.5 pl-3 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6">
          </div>
        </div>

        <div class="">
          <label for="full_description" class="block font-medium ml-1">Write a few sentences about the job.</label>
          <div class="">
            <textarea name="full_description" id="full_description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
        </div>

        <div class="flex items-center ps-3">
          <input id="active-checkbox" type="checkbox" name="active" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="active-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active (will be pulished)</label>
        
        </div>

        <div class="flex items-center justify-center">
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </div>
    </form>
  
  </x-admin-layout>
  