<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Users List') }}
        </h2>
    </x-slot>
        <div>
           <livewire:pages.usermanagement.users /> 
        </div>
</x-app-layout>