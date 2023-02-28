<x-app-layout>

        <x-slot name="title">
          @foreach ($subcat_name as $cat)
          {{ __($cat->subcategory_name) }}
          @endforeach
        </x-slot>
    
     @section('content')
     @foreach ($posts as $psts)

     
      <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl border border-red-600">
       <div class="grid w-full grid-cols-1 gap-12 mx-auto lg:grid-cols-3">
         <div class="p-6">

          <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">{{$psts->post_topic}}</h1>
          {{-- <p class="mx-auto text-base leading-relaxed text-gray-500">{{$psts->post_description}}</p> --}}
          <div class="mt-4">
            <a href="{{ route('show.post', ['slug' => $psts->slug]) }}" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600">Go to learn about {{$psts->subcategory_name}}</a>
          </div>

         </div>
       </div>
     </div>
     <br>
     @endforeach
     </body>
     {{$pages->links('pagination::tailwind')}}
     @endsection
     </x-app-layout>