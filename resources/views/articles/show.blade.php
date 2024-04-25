<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"> {{ __($article->title) }}</h2>
                        <span>{{date('\L\e d/m/Y à h:i', strtotime($article->created_at));}}</span>
                    </div>
                    @foreach ($categories as $category)
                            <span class="bg-blue-100 py-0.5 px-2 rounded-md">{{ $category->name }}</span>
                    @endforeach
                    <div class="relative overflow-x-auto">
                        <p>{{ $article->content }}</p>
                        
                    </div>
                </div> 
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold"> {{ __('Comments') }}</h2>
                    </div>
                    <div>
                        <form action="{{route("comments.store")}}" method="POST" class="mb-4">
                            @csrf
                            <textarea name="content" id="content" cols="30" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 h-20 mb-4" placeholder="Write your comment here..."></textarea>
                            <input type="hidden" name="article_id" value="{{$article->id}}">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Comment</button>
                        </form>
                        <div class="border-t pt-4">
                            @foreach ($comments as $comment)
                            
                            <div class="flex justify-between items-center border-b">
                                <div class="flex flex-col mb-4 w-full pt-4">
                                    <span class="font-bold">{{$comment->user_name}}</span>
                                    <span class="my-4">{{ $comment->content }}</span>
                                    <span class="text-gray-600 text-sm">{{ date('\L\e d/m/Y à h:i', strtotime($comment->created_at)); }}</span>
                                </div>
                                @if ($comment->user_id == Auth::id())
                                <form action="{{route('comments.destroy', ['comment'=>$comment])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="w-24 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DELETE</button>
                                </form>
                                
                                @endif
                                
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>