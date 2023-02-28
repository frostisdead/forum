<x-app-layout>
    <x-slot name="title">
    {{ __($post->post_topic) }}
    </x-slot>
 @section('content')
  <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl border border-red-600">
   <div class="grid w-full grid-cols-1 gap-12 mx-auto lg:grid-cols-3">
     <div class="p-6">
       <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">{{$post->post_topic}}</h1>
       <p class="mx-auto text-base leading-relaxed text-gray-500">{{$post->post_description}}</p>
       <p class="mx-auto text-base leading-relaxed text-gray-500">Author: {{$post->post_by}}</p>
       <div class="mt-4">
        <a href="{{ route('destroy.post', ['slug' => $post->slug]) }}" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600">Destroy post</a>
      </div>
     </div>
   </div>
 </div>
<br>

<div class="flex space-x-2 justify-center">
  <button
    type="button"
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    onclick="location.href='{{ route('create.comment', $post->id) }}'"
    class="inline-block px-6 py-2.5 bg-transparent text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-gray-100 focus:text-blue-700 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200 active:text-blue-800 transition duration-300 ease-in-out"
  >Add a comment</button>
</div>
<br>

<div class="my-4">
  <div class="flex flex-col mt-4">
    <div class="flex flex-row mx-auto justify-between px-1 py-1">
      <div class="flex-1 pl-1">
        <div class="text-base font-semibold text-gray-600">
          @foreach ($comments as $comment)
          <a href="{{route('user.profile', $comment->user_id)}}" class="text-m text-black-800">{{$comment->users->name}}</a>
          <span class="text-m text-black-800"><br>Comment: {{ $comment->content }}<br>Posted: {{ $comment->created_at }}<br></span>
          <br>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection
 </x-app-layout>