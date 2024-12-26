<x-admin-layout> 
    <form method="POST" action="/admin/jobs" class="max-w-xl m-auto bg-gray-200 rounded dark:bg-gray-800 px-6 dark:text-gray-50">
      @csrf
      <div class="py-4 space-y-4">
        <h2 class="text-2xl font-bold text-center">Create Job</h2>
        
        <div id="category-container">
          <!-- First Select: Top-level categories -->
          <div id="category_1_div">
              <label for="category_1" class="block text-lg font-medium text-gray-700">Category 1</label>
              <select id="category_1" name="category_1" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
          </div>
      </div>
        
        <div class="">
          <label for="title" class="block font-medium ml-1">Job title.</label>
          <div class="flex items-center rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            <input type="text" name="title" id="title" class="rounded-md block min-w-0 grow py-1.5 pl-3 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Senior Manager">
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

        <div class="flex items-center justify-center">
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </div>
    </form>
  
  </x-admin-layout>
  