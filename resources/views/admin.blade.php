<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex w-full gap-4">
                <div class="w-1/2 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Page {{ Auth::user()->role }} !!
                    </div>
                </div>
                <div class="flex float-left w-1/2 gap-4">                    
                    <input type="search" id="seach" name="search" form="form-search"
                    class="w-1/4 mt-4 mb-4 ml-auto overflow-hidden bg-white border-none shadow-sm dark:text-gray-200 dark:bg-gray-800 sm:rounded-lg"
                    placeholder="search ..." value="{{ request('search') ? request('search') : '' }}">
                </div>
                
                <form action="{{ route('petugas') }}" id="form-search" method="GET" class="hidden">
                    @csrf
                </form>
                
            </div>
            <a href="{{ route('pdf') }}" type="button" class="px-4 py-1 text-white bg-red-500 rounded">Export PDF</a>
            @foreach ($users as $user)
                <div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col">
                            <h1 class="text-lg font-bold uppercase">{{ $user->name }}</h1>
                            <h1 class="text-sm font-semibold">{{ $user->role }}</h1>
                            <h1 class="text-sm">{{ $user->nomor_induk }}</h1>
                            <h1 class="pb-4 text-sm">{{ $user->email }}</h1>
                        </div>
                        <a href="{{ route('user.edit', $user->id) }}"
                            class="px-6 py-2 transition-all bg-indigo-500 rounded text-gray-50 hover:bg-indigo-700">edit</a>
                        <button type="button"
                            class="px-6 py-1.5 transition-all bg-red-500 rounded opacity-90 text-gray-50 hover:bg-red-800"
                            onclick="confirm('ingin hapus user {{ $user->name }}?') ? document.getElementById('form-delete{{ $user->id }}').submit() : false">delete</button>

                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                            id="form-delete{{ $user->id }}" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
