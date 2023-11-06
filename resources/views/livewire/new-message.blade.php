<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Bulletin') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-4">
        <form wire:submit.prevent="save">
            <div class="row flex justify-center">
                <div class="max-w-2xl w-full bg-gray-100 rounded-md px-3 pb-1.5 pt-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                    <label for="name" class="block text-xs font-medium text-gray-900">Bulletin Title</label>
                    <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 bg-gray-100 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Message Title">
                </div>
            </div>
            <div class="row flex justify-center">
                <div class="max-w-4xl w-full">
{{--                    <label class="block text-sm font-medium leading-6 text-gray-900">Add Bulletin Body</label>--}}
                    <div class="mt-2">
                        <x-trix-editor
                            wire:model="body"
                            label="Add Bulletin Body"
                            :initial-value="$body"
                            name="{{$body}}"
                            placeholder="Write something..."
                            upload="true"
                            endpoint="/uploads"
                            delete-endpoint="/uploads/remove"
                        />
    {{--                    <x-rich-text wire:model.lazy="body" id="body" rows="10" :initial-value="$body" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></x-rich-text>--}}
                    </div>
                </div>
            </div>
            <div class="row flex justify-center">
                <div class="max-w-4xl w-full">
                    <div class="row flex justify-end">
                        <button type="submit" class="px-2 py-1 rounded-lg bg-green-500 text-gray-50 font-bold">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
