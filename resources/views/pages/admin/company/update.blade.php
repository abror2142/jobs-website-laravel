<x-admin-layout>

  <form method="POST" enctype="multipart/form-data" action="/company">
    @csrf
    @method('PUT')

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Update Company</h2>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Company Name</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="name" value="{{ $company->name }}" id="name" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Apple Co.">
              </div>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="short_description" class="block text-sm/6 font-medium text-gray-900">Short Description</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="short_description" value="{{ $company->short_description }}" id="short_description" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6">
              </div>
            </div>
          </div>

          <div class="col-span-full">
            <label for="full_description" class="block text-sm/6 font-medium text-gray-900">Full Description</label>
            <div class="mt-2">
              <textarea name="full_description" id="full_description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                {{ $company->full_description }}
              </textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the company.</p>
          </div>

          <div class="col-span-full">
            <div>
              <img src="{{ asset($company->logo) }}" class="w-[200px]"/>
            </div>           
            <div class="mt-4 flex text-sm/6 text-gray-600">
              <label for="logo-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                <span>Upload a file</span>
                <input id="logo-upload" name="logo" type="file" class="sr-only">
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    </div>
  </form>

</x-guest-layout>
