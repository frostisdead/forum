<x-app-layout>
    <x-slot name="title">{{ __('Create Comment') }}</x-slot>
{{-- @section('content')
<div class="px-2 py-4 bg-white rounded-xl border shadow-xl mx-auto w-4/5 sm:max-w-md sm:px-5 hover:border-blue-200">
    <form action="route{{'custom.create.comment'}}" class="mt-4">
      <label for="content" class="block">
        <textarea id="content" cols="30" rows="3" placeholder="Type your comment..." class="px-3 py-2 border shadow-sm border-gray-300 rounded-md w-full block placeholder:text-gray-400 placeholder-gray-500
          focus:outline-none focus:ring-1 bg-gray-50 focus:ring-blue-600 focus:border-blue-600 text-sm"></textarea>
      </label>
      <button type="button" class="mt-2 inline-flex items-center justify-center text-gray-100 font-medium leading-none
             bg-blue-600 rounded-md py-2 px-3 border border-transparent transform-gpu hover:-translate-y-0.5 
             transition-all ease-in duration-300 hover:text-gray-200 hover:bg-blue-700 text-sm">
        Post comment
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 rotate-90" viewBox="0 0 20 20" fill="currentColor">
          <path
            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
        </svg>
      </button>
    </form>

@endsection --}}



@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <form method="post" action="{{ route('custom.create.comment') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Content: </label>
                            <input type="text" id="content" name="content" class="form-control" required/>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" id="post_id" name="post_id" value="{{ $post_id }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Create post"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<form method="POST" action="{{ route('custom.create.comment') }}">
    @csrf
    <div class="mb-4">
      <label for="content" class="block text-gray-700 font-bold mb-2">Comment:</label>
      <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" id="post_id" name="post_id" value="{{ $post_id }}">
    </div>
    <div class="mb-4">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post Comment</button>
    </div>
  </form>
  


@endsection 
</x-app-layout>