    
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Update article') }}
            </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="post" action="{{ route('articles.update', $article) }}" class="flex flex-row justify-center">
                            @csrf
                            @method('patch')
                            <div class="flex flex-col justify-center items-center w-full">
                                <div class="my-4 w-2/3">
                                    <div class="flex justify-between items-center ">
                                    <x-input-label for="title" :value="__('Title')" class="w-24"/>
                                     @php
                                    $title = old('title') ? old('title') : $article->title;
                                    @endphp
                                    {{-- <x-text-input id="title" class="block mt-1 w-full " type="text" name="title" :value="$title" required autofocus/> --}}

                                    <input id="title" class="block mt-1 w-full " type="text" name="title" required autofocus value="{{$article->title}}"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                               
                                <div class="my-4 w-2/3">
                                    <div class="flex justify-between items-start">
                                    <x-input-label for="content" :value="__('Content')" class="mt-2 w-24"/>
                                    {{-- <textarea class="resize-y rounded-md mt-1 w-full  min-h-96" id="content"  type="text" name="content" required autofocus>{{old('content') ? old('content') : $article->content}}</textarea> --}}
                                    <textarea class="resize-y rounded-md mt-1 w-full  min-h-96" id="content"  type="text" name="content" required autofocus>{{$article->content}}</textarea>
                                    </div>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>

                                <div class="my-4 w-2/3 ps-24 flex justify-center items-center">
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
    function updateArticleField(event, field:string) {
        $article[field] = event.target.value;
        // Now you can use the `title` variable in your JavaScript code
    }
</script>