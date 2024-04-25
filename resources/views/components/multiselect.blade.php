<div x-data="{ open: false, selected: [] }" @click.away="open = false" class="relative inline-block text-left">
    <div>
        <span class="rounded-md shadow-sm">
            <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150">
                Categories
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </span>
    </div>

    <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
        <div class="rounded-md bg-white shadow-xs">
            <div class="py-1">
                @foreach ($categories as $category)
                    <a href="#" @click.prevent="selected.includes({{ $category->id }}) ? selected = selected.filter(i => i !== {{ $category->id }}) : selected.push({{ $category->id }})" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <template x-for="category in selected" :key="category">
        <input type="hidden" name="categories[]" :value="category" />
    </template>

    {{-- <input type="hidden" name="categories" :value="selected.join(',')" /> --}}
</div>