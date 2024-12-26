<x-app-layout> 
  <form method="POST" action="/jobs/{{$job->id}}" class="max-w-2xl m-auto bg-gray-800 p-6 dark:text-gray-50 mt-10">
    @csrf
    @method('PUT')

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 ">
        <h2 class="text-2xl font-bold text-center">Update Job</h2>
        <div class="mt-2 flex flex-col gap-4">
          <div class="">
            <label for="title" class="block font-medium">Job title</label>
            <div class="flex items-center rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="title" id="title" value={{ $job->title }} class="rounded-md block min-w-0 grow py-1.5 pl-3 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Senior Manager">
            </div>
          </div>

          <div class="">
            <label for="short_description" class="block font-medium">Short description</label>
            <div class="flex items-center rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="short_description"  value={{ $job->short_description }} id="short_description" class="rounded-md block min-w-0 grow py-1.5 pl-3 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6">
            </div>
          </div>

          <div class="">
            <label for="full_description" class="block font-medium">Write a few sentences about the job.</label>
            <div class="">
              <textarea name="full_description" id="full_description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ $job->full_description }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-5 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold  shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    </div>
  </form>

</x-app-layout>
