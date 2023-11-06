<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-2">
                <div class="lg:col-span-9">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <div class="flex row justify-between items-center">
                                <div class="row flex items-center">
                                    <div class="hidden lg:block">
                                        <x-application-logo class="block h-12 w-auto" />
                                    </div>
                                    <div class="ml-4 text-lg lg:text-2xl">EPS SAP - Safety Bulletins and Information</div>
                                </div>
                                @if(auth()->user()->admin)
                                    <button class="bg-gray-400 text-gray-100 px-2 py-1 text-xs rounded-lg shadow-lg">New</button>
                                @endif
                            </div>
                            @foreach($messages as $message)
                                <livewire:message-panel :message="$message"/>
                            @endforeach
                        </div>
                        <div class="p-2">
                            {{$messages->links()}}
                        </div>

                    </div>
                </div>
                <div class="lg:col-span-3">
                    <div class="mt-4 lg:mt-0 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <div class="ml-4 text-lg lg:text-2xl">Documents</div>
                            <div class="mt-8 p-2 bg-gray-100 rounded-xl">
                                <div>Electrical Safety Rules</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>HV Processes and Procedures</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>HV Systems Approved Procedures</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>EPS HV Guidelines</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>EPS Approved Terminology</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>Emergency Contact Details</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>EPS Approved Persons Details</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>ARC Flash Policy</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>System Safety Toolbox Talks</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                            <div class="mt-2 p-2 bg-gray-100 rounded-xl">
                                <div>EPS Annual HV Maintenance</div>
                                <div class="text-xs">Version 1.3</div>
                                <button class="mt-2 px-2 py-1 bg-indigo-500 text-gray-100 rounded-lg shadow-lg text-xs">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
