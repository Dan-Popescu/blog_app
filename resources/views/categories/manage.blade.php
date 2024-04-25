<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage categories') }}
            </h2>
    </x-slot>

    {{-- @component('components.card', ['url' => route('categories.create')])
        <x-slot name="title">
            {{ __('Create new category') }}
        </x-slot>
    @endcomponent --}}
    <div class="my-24 flex flex-row justify-center gap-64">
        @component('components.card', ['url' => route('categories.create')])
        <x-slot name="title">
            {{ __('Create new category') }}
        </x-slot>
        @endcomponent
        @component('components.card', ['url' => route('categories.delete')])
        <x-slot name="title">
            {{ __('Delete a category') }}
        </x-slot>
        @endcomponent
    </div>
    

    {{-- <div class="my-4 w-2/3 flex flex-col items-center">
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
    </div> --}}

</x-app-layout>