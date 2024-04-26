
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('New category') }}
            </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-center items-center my-8">
                            <h2 class="text-2xl font-semibold"> {{ __('New category') }}</h2>
                        </div>
                        <form method="post" action="{{ route('categories.store') }}" class="flex flex-col items-center justify-center">
                            @csrf
                            <div class="flex flex-col justify-center items-center w-full">
                                <div class="my-4 w-2/5">
                                    <div class="flex flex-col items-start">
                                    <x-input-label for="name" :value="__('Name')" class="w-16"/>
                                    <x-text-input id="name" class="block mt-1 w-full " type="text" name="name" :value="old('name')" required autofocus/>
                                    </div>
                                    @if ($errors->first('name'))
                                    <div class="my-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Erreur de saisie!</strong>
                                        <span class="block sm:inline">{{ __($errors->first('name'))}}</span>
                                    </div>
                                    @endif
                                    <div class="mt-4">
                                        <label for="color">Pick a color</label>
                                        <x-color-picker name="color" />
                                    </div>
                                    
                                </div>
                                
                                

                                <div class="my-4 w-full flex justify-center items-center">
                                    <x-primary-button class="w-32 flex justify-center ">
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </div>
                                    {{-- get success message if any is received from server--}}
                                    <div class="my-4 w-2/3 flex justify-center items-center">
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
