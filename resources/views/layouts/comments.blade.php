<x-app-layout>
    <x-slot name="title">{{ __('Users list') }}</x-slot>
@section ('content')

@if(count((array)$comments))
    @foreach ($comments as $comment)
    
        <p> {{ App\Models\User::get('name') }} : {{ $comment->comment }} </p>
        
        @endforeach
@endif

@endsection
</x-app-layout>