<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"> {{ __('All articles') }}</h2>
                    </div>
                        <div class="relative overflow-x-auto">
                            {{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr >
                                    <th scope="col" class="px-6 py-3 items-center ">Title</th>
                                    <th scope="col" class="px-6 py-3 items-center ">Content</th>
                                    <th scope="col" class="px-6 py-3 flex justify-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <td class="px-4 py-2 ">{{ $article->title }}</td>
                                            <td class=" px-4 py-2 ">{{ Str::limit($article->content, 100) }}...</td>

                                            <td class=" px-4 py-2 flex justify-center">
                                                <a href="{{route('articles.edit', ['article'=>$article])}}" class="w-24 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update</a>
                                               
                                                <form action="{{ route('articles.destroy', ['article'=>$article]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="w-24 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <div class="w-full">
                                    <div class="my-16 flex justify-center items-center">
                                        @if (session('success'))
                                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                                <strong class="font-bold">Success!</strong>
                                                <span class="block sm:inline">{{ session('success') }}</span>
                                            </div>
                                        @endif
                                        </div>
                                </div>
                            </table> --}}

                            <form class="max-w-lg mx-auto">
                                <div class="flex">
                                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your Email</label>
                                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 " type="button">{{__("All categories")}} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                    </button>
                                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdown-button">
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Mockups</button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Templates</button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Design</button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Logos</button>
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="relative w-full">
                                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-blue-300 ">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        
                            <ul class="mt-12">
                                @foreach ($articles as $article)
                                <a href="{{route('articles.show', ['article' => $article->id])}}">
                                    <li class="bg-blue-50 rounded-lg p-2 m-2 grid grid-cols-5 hover:bg-blue-100">
                                        
                                        <h3 class="col-span-3">{{ $article->title }}</h3>
                                        {{-- <p class="col-span-2">{{ $article->content }}</p> --}}
                                        <p>{{ $article->category_id }}</p>
                                        <div class="flex flex-row justify-end">
                                            <span>Date {{ $article->created_at }}</span>
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




