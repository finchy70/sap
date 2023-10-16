<div class="p-4 my-4 bg-gray-200 rounded-lg overflow-hidden shadow-lg">
    <h1 class="row-auto flex text-xl font-medium text-gray-900 items-center">
        <div>{{$message->title}}</div>
    </h1>
    <div class="text-sm">
        {{$message->body}}
    </div>
    <hr class="my-1 border-1 border-gray-400">
    <div class="row flex justify-between">
        <div class="text-xs">Posted by - {{$message->user->name}}</div>
        <div class="p-1 bg-blue-500 text-white rounded-xl text-xs">
            {{$message->created_at->format('d-m-Y')}}
        </div>
    </div>
</div>


