<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Add User !!
                </div>
            </div>
            @if ($errors->any())
                <div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-red-700 dark:text-gray-100">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form action="{{ route('user.update', $user['id']) }}" method="POST" class="flex flex-col w-full mt-4">
                @method('PUT')
                @csrf
                <div class="flex w-full gap-4">
                    <div class="w-1/2">
                        <input type="text" placeholder="name" name="nama" value="{{ $user->nama }}"
                            class="w-full text-gray-500 bg-white border-none rounded shadow dark:text-white dark:bg-gray-800 placeholder:font-semibold">
                    </div>
                    <div class="w-1/2">
                        <input type="email" placeholder="email" name="email" value="{{ $user->email }}"
                            class="w-full text-gray-500 bg-white border-none rounded shadow dark:text-white dark:bg-gray-800 placeholder:font-semibold">
                    </div>
                </div>
                <div class="flex w-full gap-4 mt-4">
                    <div class="w-full">
                        <input type="text" placeholder="nomor induk" name="nomor_induk" value="{{ $user->nomor_induk }}"
                            class="w-full text-gray-500 bg-white border-none rounded shadow dark:text-white dark:bg-gray-800 placeholder:font-semibold">
                    </div>
                </div>

                <input type="submit" class="py-2 mt-4 font-bold text-white bg-indigo-500 rounded shadow">
            </form>
        </div>
    </div>
</x-app-layout>
