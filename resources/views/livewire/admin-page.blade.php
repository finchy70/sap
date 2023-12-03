<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-semibold leading-6 text-gray-900">Users</h1>
                </div>
                <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                    <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add user</button>
                </div>
            </div>
        </div>
        <div class="mt-8 row flex justify-between px-4 sm:px-6 lg:px-8">
            <div>
            <input wire:model.live="search" type="text" class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search..."/>
            </div>
            <div>
                <label for="perPage">Per Page</label>
                <select class='ml-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6' wire:model.live='perPage' name="perPage" id="perPage">
                    <option value="10">10</option>
                    <option vlaue="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flow-root overflow-hidden">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <table class="w-full text-left">
                        <thead>
                        <tr>
                            <th scope="col" class="relative isolate py-3.5 pr-3 pl-3 text-left text-sm font-semibold text-gray-900">
                                Name
                            </th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 md:table-cell">Email</th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Role</th>
                            <th scope="col" class="hidden pl-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="{{$loop->iteration % 2 ? 'bg-gray-200' : 'bg-gray-100'}}">
                                <td class="relative py-4 pl-3 pr-3 text-sm font-medium text-gray-900">
                                    {{$user->name}}
                                </td>
                                <td class="hidden px-3 py-4 text-sm text-gray-500 md:table-cell">
                                    {{$user->email}}
                                </td>
                                <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                                    {{$user->admin ? 'Admin' : 'User'}}
                                </td>
                                <td class="relative py-4 pl-3 text-right text-sm font-medium">
                                    @if(auth()->user()->id != $user->id)
                                        <a href="#" class="mr-2 text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                    @else
                                        <span></span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($users->count() >= $perPage)
                        <div class="mt-4 bg-gray-50 p-2 rounded-xl overflow-hidden">
                            {{$users->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
