<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"> {{ __('My articles') }}</h2>
                    </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr >
                                    <th scope="col" class="px-6 py-3 items-center ">{{__("Title")}}</th>
                                    <th scope="col" class="px-6 py-3 items-center ">{{__("Category")}}</th>
                                    <th scope="col" class="px-6 py-3 items-center ">{{__("Content")}}</th>
                                    <th scope="col" class="px-6 py-3 flex justify-center">{{__("Actions")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <td class="px-4 py-2 ">{{ $article->title }}</td>
                                            <td class="px-4 py-2 ">
                                                {{-- Display all categories related to the article --}}
                                                @foreach ($article->categories as $category)
                                                    <span class="bg-gray-200 dark:bg-gray-700 dark:text-gray-400 text-gray-900 px-2 py-1.5 rounded-lg me-1.5">{{ $category->name }}</span>
                                                @endforeach
                                                {{-- {{ $article->category->name }} --}}
                                            </td>
                                            <td class=" px-4 py-2 ">{{ Str::limit($article->content, 100) }}...</td>

                                            <td class=" px-4 py-2 flex justify-center">
                                                <a href="{{route('articles.edit', ['article'=>$article])}}" class="w-32 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update</a>
                                               
                                                <form action="{{ route('articles.destroy', ['article'=>$article]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="w-32 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
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
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

{{ $articles->links() }}


