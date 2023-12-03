<x-app-layout>
    <div class="py-12 space-y-4">
        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            <div class="row flex justify-center">
                <div class="max-w-2xl w-full bg-gray-100 rounded-md px-3 pb-1.5 pt-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                    <label for="title" class="block text-xs font-medium text-gray-900">Bulletin Title</label>
                    <input name='title' type="text" id="title" class="block w-full border-0 p-0 text-gray-900 bg-gray-100 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Message Title">
                </div>
            </div>
            <div class="mx-auto max-w-2xl w-full">
                @error('title')<span class="text-red-500 text-sm font-bold italic">{{$message}}</span>@enderror
            </div>

            <div class="row flex justify-center">
                <div class="max-w-4xl w-full">
                    @trix(\App\Message::class, 'body')
                    <div class="row flex justify-end">
                        <button type="submit" class="mt-4 px-2 py-1 rounded-lg bg-green-500 text-gray-50 font-bold">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

