<x-app-layout>
    <x-slot name="title">{{ 'Profile' }}</x-slot>
@section ('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css">

<div class='flex items-center justify-center min-h-screen from-pink-200 via-purple-300 to-blue-500 bg-gradient-to-br'>
    
    <div class='w-full max-w-lg py-8 flex flex-row items-center justify-center mx-auto bg-[#FFFBFB] rounded-lg shadow-xl'>

            
            <div class="w-full md:w-3/5 space-y-4 flex flex-col justify-center items-center">
                @foreach ($user as $us)
                <div class="flex flex-col justify-center">
                    <p class="text-center md:text-left text-2xl font-bold text-gray-900">{{$us->name}}</p>
                    @if (auth()->user()->role == 'Admin')
                    <p class="inline text-gray-700 font-normal leading-6 w-full text-base">{{$us->role}} of this forum</p>
                    @elseif (auth()->user()->role == 'Moderator')
                    <p class="inline text-gray-700 font-normal leading-6 w-full text-base">{{$us->role}} of this forum</p>
                    @elseif (auth()->user()->role == 'User')
                    <p class="inline text-gray-700 font-normal leading-6 w-full text-base">{{$us->role}} of this forum</p>
                    @endif
                </div>
                
                @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
                <div class="flex flex-col justify-center">
                    <a href="{{route('view.role', $us->id)}}">Change role</a>
                    @if ($us->banned == false)
                    <a href="{{route('ban', $us->id)}}">Ban</a>
                    @elseif ($us->banned == true)
                    <a href="{{route('unban', $us->id)}}">Unban</a>
                    @endif 
                </div>
                @endif
                @endforeach
           
            </div>
            
        </div>
       
    </div>
    
</div>
@endsection
</x-app-layout>