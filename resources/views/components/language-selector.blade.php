    <div class="w-36 flex justify-around items-center  rounded-sm cursor-pointer">
    <select id="countries"  onchange="window.location.href=this.value" class="h-12 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
        <option value="{{ route('lang.switch', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }} class="cursor-pointer">{{__("English")}}</option>
        <option value="{{ route('lang.switch', 'fr') }}" {{ app()->getLocale() == 'fr' ? 'selected' : '' }} class="cursor-pointer">{{__("French")}}</option>
    </select>
    </div>
  