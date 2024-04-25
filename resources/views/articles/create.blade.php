
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('New article') }}
            </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-center items-center my-8">
                            <h2 class="text-2xl font-semibold"> {{ __('New article') }}</h2>
                        </div>
                        <form method="post" action="{{ route('articles.store') }}" class="flex flex-col items-center justify-center">
                            @csrf
                            <div class="flex flex-col justify-center items-center w-full">
                                <div class="my-4 w-2/3">
                                    <div class="flex justify-between items-center ">
                                    <x-input-label for="title" :value="__('Title')" class="w-24"/>
                                    <x-text-input id="title" class="block mt-1 w-full " type="text" name="title" :value="old('title')" required autofocus/>
                                    </div>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    @if ($errors->first('title'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Erreur de saisie!</strong>
                                        <span class="block sm:inline">{{ __($errors->first('title'))}}</span>
                                    </div>
                                    @endif
                                </div>

                                {{-- Category --}}
                                <div class="my-4 w-2/3 flex flex-col items-center">
                                    <div class="flex justify-between items-start ">
                                    <x-input-label for="category" :value="__('Category')" class="w-24 top-0"/>
                                        <div class="flex flex-wrap flex-row justify-between w-full">
                                            @foreach ($categories as $category)
                                                <div class="w-48 flex items-center gap-3">
                                                    <input type="checkbox" name="categories[]" value="{{$category->id}}" class="whitespace-nowrap rounded-sm w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">{{__($category->name)}}</input>
                                                </div>
                                            @endforeach
                                        </div>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>


                                <div class="my-4 w-full">
                                    <div class="flex justify-between items-start">
                                    <x-input-label for="content" :value="__('Content')" class="mt-2 w-24"/>
                                    <textarea class="resize-y rounded-md mt-1 w-full  min-h-96" id="content"  type="text" name="content" :value="old('content')" required autofocus></textarea>
                                    </div>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
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
