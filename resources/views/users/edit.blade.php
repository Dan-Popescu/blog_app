    
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Update user') }}
            </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="post" action="{{ route('users.update', $user) }}" class="flex flex-row justify-center">
                            @csrf
                            @method('patch')
                            <div class="flex flex-col justify-center items-center w-full">
                                <div class="my-4 w-4/5 flex flex-row justify-center">
                                    <div class="flex flex-col justify-center items-start ">
                                    <x-input-label for="name" :value="__('Name')" class="w-24 my-2"/>
                                     @php
                                    $name = old('name') ? old('name') : $user->name;
                                    @endphp
                                    <input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" required autofocus value="{{$user->name}}"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="my-4 w-2/3 flex flex-row justify-center">
                                    <div class="flex flex-col justify-center items-start ">
                                    <x-input-label for="email" :value="__('Email')" class="w-16 my-2"/>
                                     @php
                                    $name = old('email') ? old('email') : $user->email;
                                    @endphp
                                    <input id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="email" required autofocus value="{{$user->email}}"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="my-4 w-2/3 flex justify-center items-center">
                                    <x-primary-button class="w-32 flex justify-center ">
                                        {{ __('Update') }}
                                    </x-primary-button>
                                </div>
                                    {{-- get success message if any is received from server--}}
                                    <div class="my-4 w-2/3 ps-24 flex justify-center items-center">
                                    @if (session('success'))
                                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">Success!</strong>
                                            <span class="block sm:inline">{{ session('success') }}</span>
                                        </div>
                                    @endif
                                    </div>
                                    <x-input-error :messages="$errors->get('error')" class="mt-2" />

                        </form>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>

<script>
    function updateuserField(event, field:string) {
        $user[field] = event.target.value;
    }
</script>