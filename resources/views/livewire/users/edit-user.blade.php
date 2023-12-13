<div>
    <form wire:submit="submit">
        <div class="space-y-4">
            @csrf
            <div class="row max-w-xl mx-auto">
                <div>
                    <label for="name" class="ml-1 block text-sm font-medium leading-6 text-gray-900" required()>Name</label>
                    <div class="mt-2">
                        <input type="text" wire:model='name' name="name" id="name" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('name')<span class="text-red-500 text-sm font-bold italic">{{$message}}</span>  @enderror
                </div>
            </div>
            <div class="row max-w-xl mx-auto">
                <div>
                    <label for="email" class="ml-1 block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" wire:model='email' name="email" id="email" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('email')<span class="text-red-500 text-sm font-bold italic">{{$message}}</span>  @enderror
                </div>
            </div>
            <div class="row max-w-xl mx-auto">
                <div>
                    <label for="userType" class="ml-1 block text-sm font-medium leading-6 text-gray-900">User Type</label>
                    <select wire:model.live='userType' name="userType" id="userType" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Please select...</option>
                        <option value="eps">EPS User</option>
                        <option value="client">Client</option>

                    </select>
                    @error('userType')<span class="text-red-500 text-sm font-bold italic">{{$message}}</span>  @enderror
                </div>
            </div>
            @if($showClients)
                <div class="row max-w-xl mx-auto">
                    <div>
                        <label for="clientId" class="ml-1 block text-sm font-medium leading-6 text-gray-900">Client</label>
                        <select wire:model='clientId' name="clientId" id="clientId" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Client...</option>
                            @foreach($clients as $client)
                                <option {{old('clientId') == $client->id ? 'selected' : ''}} value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                        @error('clientId')<span class="text-red-500 text-sm font-bold italic">{{$message}}</span>  @enderror
                    </div>
                </div>
            @endif
            @if($showEpsUserType)
                <div class="row max-w-xl mx-auto">
                    <div>
                        <label for="epsUserType" class="ml-1 block text-sm font-medium leading-6 text-gray-900">EPS User Type</label>
                        <select wire:model='epsUserType' name="epsUserType" id="epsUserType" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select EPS User Type...</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>


                        </select>
                        @error('epsUserType')<span class="text-red-500 text-sm font-bold italic">{{$message}}</span>  @enderror
                    </div>
                </div>
            @endif
            <div class="row max-w-xl mx-auto">
                <div class="row flex justify-end space-x-4">
                    <a href="{{route('userAdminPage')}}" class="rounded-md bg-gray-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
                    <button type='submit' class="rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

