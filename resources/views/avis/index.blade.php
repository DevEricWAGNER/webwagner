<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ __('Avis') }}</h1>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Tous les avis') }}</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{route('avis.create')}}" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Donner mon avis</a>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="w-full px-6 py-2 text-black bg-green-300 border border-black rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mt-8 -mx-4 sm:-mx-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
