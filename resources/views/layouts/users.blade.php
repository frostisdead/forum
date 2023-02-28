<x-app-layout>
    <x-slot name="title">{{ __('Users list') }}</x-slot>
@section ('content')
    {{-- <body>
        <div class="max-w-2xl mx-auto">
            <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Users List</h3>
           </div>
           <div class="flow-root">
                <ul role="list" class="divide-y divide-white-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        @foreach ($users as $user)
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$user->name}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{$user->email}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $320
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $320
                            </div>
                        </div>
                        @endforeach
                    </li>
                </ul>
            </div>  
    </body> --}}

    <div class="flex flex-col max-w-md mt-10 mx-auto w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg">
        @foreach ($users as $user)
        <br>
        <ul class="flex flex-col divide-y w-full">
          <li class="flex flex-row">
            <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">
              <div class="flex-1 pl-1">
                <div class="font-medium dark:text-white">{{$user->name}}</div>
                <div class="text-gray-600 dark:text-gray-200 text-sm">{{$user->email}}</div>
              </div>
              <div class="flex flex-row justify-center">
                <div class="text-gray-600 dark:text-gray-200 text-xs">{{$user->role}}</div>
                <button onclick="location.href='{{route ('user.profile', $user->id) }}'" class="w-10 text-right flex justify-end">
                  <svg width="20" fill="currentColor" height="20" class="hover:text-gray-800 dark:hover:text-white dark:text-gray-200 text-gray-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </li>
        </ul>
        <br>
        @endforeach
    </div>
@endsection
</x-app-layout>


