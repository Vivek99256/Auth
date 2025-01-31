<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 text-blue-500 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m0 0a9 9 0 11-6.75 3.75A9 9 0 0115 8z" />
                            </svg>
                        </div>
                        <p class="text-lg font-medium">{{ __("You're logged in!") }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="/dashboard" class="inline-block px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all">
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
