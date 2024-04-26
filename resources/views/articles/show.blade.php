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
            {{$user->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"> {{$article->title}}</h2>
                        <span>{{date('\L\e d/m/Y à h:i', strtotime($article->created_at));}}</span>
                    </div>
                    @foreach ($categories as $category)
                            <span class="py-0.5 px-2 rounded-md" style="background-color: {{$category->color}}; color:{{isColorDark($category->color)? "black" : "white"}}">{{ $category->name }}</span>
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
                            <textarea name="content" id="content" cols="30" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 h-20 mb-4" placeholder="{{__("Write your comment here...")}}"></textarea>
                            <input type="hidden" name="article_id" value="{{$article->id}}">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">{{__("Comment")}}</button>
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
                                <a href="{{route('comments.edit', ['comment'=>$comment])}}" class="text-nowrap py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__("Update")}}</a>
                                <form action="{{route('comments.destroy', ['comment'=>$comment])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{__("Delete")}}</button>
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