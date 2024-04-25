
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('New user') }}
            </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-center items-center my-8">
                            <h2 class="ps-24 text-2xl font-semibold"> {{ __('New user') }}</h2>
                        </div>
                        <form method="post" action="{{ route('users.store') }}" class="flex flex-col items-center justify-center">
                            @csrf

                            <div class="flex flex-col justify-center items-center w-full">
                                <div class="my-4 w-2/3">
                                    <div class="flex justify-center items-center ">
                                    <x-input-label for="name" :value="__('Name')" class="w-24 flex justify-start"/>
                                    <x-text-input id="name" class="block mt-1 w-3/5 " type="text" name="name" :value="old('name')" required autofocus/>
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    @if ($errors->first('name'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Erreur de saisie!</strong>
                                        <span class="block sm:inline">{{ __($errors->first('name'))}}</span>
                                    </div>
                                    @endif
                                </div>

                                <div class="my-4 w-2/3">
                                    <div class="flex justify-center items-center ">
                                    <x-input-label for="email" :value="__('Email')" class="w-24 flex justify-start"/>
                                    <x-text-input id="email" class="block mt-1 w-3/5 " type="email" name="email" :value="old('email')" required autofocus/>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    @if ($errors->first('email'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Erreur de saisie!</strong>
                                        <span class="block sm:inline">{{ __($errors->first('email'))}}</span>
                                    </div>
                                    @endif
                                </div>

                                <div class="my-4 w-2/3">
                                    <div class="flex justify-center items-center ">
                                    <x-input-label for="password" :value="__('Password')" class="w-24 flex justify-start me-2"/>
                                    <x-text-input id="password" class="block mt-1 w-3/5 " type="password" name="password" :value="old('password')" required autofocus/>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    @if ($errors->first('password'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Erreur de saisie!</strong>
                                        <span class="block sm:inline">{{ __($errors->first('password'))}}</span>
                                    </div>
                                    @endif
                                </div>


                                <div class="my-4 w-full ps-24 flex justify-center items-center">
                                    <x-primary-button class="w-32 flex justify-center ">
                                        {{ __('Create') }}
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
                                </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>


</x-app-layout>
