@php
    function isColorDark($hexColor) {
        // Convert hex to RGB
        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));
    
        // Calculate luminance
        $luminance = (0.2126 * $r + 0.7152 * $g + 0.0722 * $b) / 255;
    
        // If luminance is less than 0.5, color is dark
        return $luminance < 0.5;
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"> {{ __('All articles') }}</h2>
                    </div>
                        <div class="relative">

                            <div class="max-w-full mx-auto mt-6">
                                <div class="flex">
                                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your Email</label>
                                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 " type="button">{{__("All categories")}} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                    </button>
                                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                        <ul class="py-2 text-sm text-gray-700 h-40 overflow-y-scroll" aria-labelledby="dropdown-button">
                                            <li>
                                                <a href="{{route("articles.index")}}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">All categories</a>
                                            </li>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{route("articles.category",['category'=>$category])}}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="relative w-full">
                                        <form action="{{route('articles.index')}}" method="GET">
                                            <input type="search" id="search-dropdown" name="titlesearch" value="{{ request()->get('titlesearch') }}" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                                            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-blue-300 ">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                <span class="sr-only">Search</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                            <ul class="mt-12">
                                @foreach ($articles as $article)
                                <a href="{{route('articles.show', ['article' => $article->id])}}">
                                    <li class="bg-blue-50 rounded-lg p-2 px-3 m-2 flex flex-col hover:bg-blue-100">
                                        <div>
                                            @foreach ($article->categories as $category)
                                            <span class='py-0.5 px-2 rounded-md' style="background-color:{{$category->color}}; color:{{isColorDark($category->color)? "black" : "white"}}">{{ $category->name }}</span>
                                            @endforeach
                                        </div>
                                        
                                        <div class="grid grid-cols-5">
                                            <h3 class="col-span-3 font-bold">{{ $article->title }}</h3>
                                            {{-- <p class="col-span-2">{{ $article->content }}</p> --}}
                                            <p>{{ $article->category_id }}</p>
                                            <div class="flex flex-row justify-end">
                                                <span class="text-sm ">{{ date('d/m/Y h:i', strtotime($article->created_at)) }}</span>
                                            </div>
                                        </div>
                                        
                                        
                                    </li>
                                </a>
                                @endforeach
                            </ul>
                            {{ $articles->links() }}

                        </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>




