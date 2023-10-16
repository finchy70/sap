<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"><div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <div class="flex row justify-start items-center">
                    <x-application-logo class="block h-12 w-auto" />
                    <div class="ml-8 text-3xl">EPS SAP - Safety Bulletins and Information</div>
                </div>
                @foreach($messages as $message)
                    <x-message :message="$message"/>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
