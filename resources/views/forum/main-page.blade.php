<x-app-layout>
  <x-slot name="title">{{ __('Forum') }}</x-slot>
  @section('content')
  <br>
      @foreach ($categories as $cats)
          <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl border border-red-600">
              <div class="grid w-full grid-cols-1 gap-12 mx-auto lg:grid-cols-3">
                  <div class="p-6">
                      <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">{{ $cats->category_name }}</h1>
                      <p class="mx-auto text-base leading-relaxed text-gray-500">{{ $cats->description }}</p>
                      <div class="mt-4">
                          <a href="{{ route('show.subcats', ['slug' => $cats->slug]) }}" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600" title="read more"> Read More» </a>
                      </div>
                  </div>
              </div>
          </div>
          <br>
      @endforeach

      {{-- <div class="flex justify-center">
        <nav aria-label="Page navigation example">
          <ul class="flex list-style-none">
            {{$pages->links('pagination::tailwind')}}
            </ul>
        </nav>
      </div> --}}

      <div class="my-4 flex justify-center">
        {{ $categories->links('vendor.pagination.tailwind') }}
     </div>

      <br>

      <footer>
          <div class="text-indigo-500 inline-flex items-center">
              <button type="button">Go to Dashboard</button>
          </div>
      </footer>
  @endsection
</x-app-layout>