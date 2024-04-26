<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"> {{ __('All users') }}</h2>
                    </div>
                   
                    {{-- <form class="my-12 cursor-pointer" method="GET" action={{route("users.create")}}>
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                              </svg>  
                        </button>
                    </form> --}}
                    <button  class="my-8 cursor-pointer">
                        <a href={{route('users.create')}}>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                              </svg>  
                        </a>
                    </button>
                   
                        <div class="relative overflow-x-auto">
                           
                           
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr >
                                    <th scope="col" class="px-6 py-3 items-center ">{{__("Name")}}</th>
                                    <th scope="col" class="px-6 py-3 items-center ">{{__("Email")}}</th>
                                    <th scope="col" class="px-6 py-3 flex justify-center">{{__("Actions")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <td class="px-4 py-2 ">{{ $user->name }}</td>
                                            <td class="px-4 py-2 ">{{ $user->email }}</td>

                                            <td class=" px-4 py-2 flex justify-center">
                                                <a href="{{route('users.edit', ['user'=>$user])}}" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__('Update')}}</a>
                                               
                                                <form action="{{ route('users.destroy', ['user'=>$user]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{__('Delete')}}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                                        @if (session('success'))
                                        <div class="w-full">
                                            <div class="my-16 flex justify-center items-center">
                                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                                    <strong class="font-bold">Success!</strong>
                                                    <span class="block sm:inline">{{ session('success') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                       
                                {{-- <div class="w-full">
                                    <div class="my-16 flex justify-center items-center">
                                        @if (session('success'))
                                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                                <strong class="font-bold">Success!</strong>
                                                <span class="block sm:inline">{{ session('success') }}</span>
                                            </div>
                                        @endif
                                        </div>
                                </div> --}}
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

{{ $users->links() }}





