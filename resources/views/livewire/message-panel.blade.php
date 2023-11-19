<div class="p-4 my-4 bg-gray-200 rounded-lg overflow-hidden shadow-lg">
    <h1 class="mb-2 row-auto flex justify-between text-xl font-medium text-gray-900 items-center">
        <div>{{$message->title}}</div>
        @if(auth()->user()->admin)
            <a href="{{route('messages.edit', $message->id)}}" class="bg-green-200 text-gay-300 px-2 py-1 text-xs rounded-lg shadow-lg">Edit</a>
        @endif
    </h1>
    <div class="text-sm">
        {!! $message->trixRichText[0]['content'] !!}
    </div>
    <hr class="my-1 border-1 border-gray-400">
    <div class="row flex justify-between">
        <div class="text-xs">Posted by - {{$message->user->name}}</div>
        <div class="px-1 bg-blue-500 text-white rounded-xl text-xs">
            {{$message->created_at->format('d-m-Y')}}
        </div>
    </div>
</div>


