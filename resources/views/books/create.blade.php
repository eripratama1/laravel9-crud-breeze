<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    {{-- Akses ke route books.store unutk melakukan penyimpanan data --}}
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Of
                                Book</label>

                            <input type="text" name="name" id="email"
                                class="bg-gray-50 border border-gray-300 
                                {{-- Menampilkan pesan error jika data gagal saat di validasi --}}
                                @error('name') border-red-500 @enderror 
                                text-gray-900 
                                text-sm 
                                rounded-lg
                                focus:ring-blue-500 
                                focus:border-blue-500 
                                block w-full p-2.5 
                                dark:bg-gray-700 
                                dark:border-gray-600 
                                dark:placeholder-gray-400 
                                dark:text-white 
                                dark:focus:ring-blue-500 
                                dark:focus:border-blue-500">
                            
                                @error('name')
                            {{-- Menampilkan pesan error jika data gagal saat di validasi --}}
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">{{ $message }}</span>
                            </p>
                            @enderror
                        </div>

                        <div class="relative z-0 mb-6 w-full group">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Published Year
                            </label>

                            <input type="text" name="published_year"
                                class="bg-gray-50 
                                border 
                                border-gray-300 
                                {{-- Menampilkan pesan error jika data gagal saat di validasi --}}
                                @error('published_year')border-red-500 @enderror
                                text-gray-900
                                text-sm rounded-lg
                                focus:ring-blue-500
                                focus:border-blue-500 
                                block w-full p-2.5 
                                dark:bg-gray-700 
                                dark:border-gray-600 
                                dark:placeholder-gray-400 
                                dark:text-white 
                                dark:focus:ring-blue-500 
                                dark:focus:border-blue-500">
                            {{-- Menampilkan pesan error jika data gagal saat di validasi --}}
                            @error('published_year')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>

                        <div class="relative z-0 mb-6 w-full group">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                Author</label>
                            <select id="countries" name="author_id"
                                class="bg-gray-50
                                @error('author_id') border-red-500 @enderror 
                                border border-gray-300 
                                text-gray-900 
                                text-sm rounded-lg 
                                focus:ring-blue-500 
                                focus:border-blue-500 
                                block w-full p-2.5 
                                dark:bg-gray-700 
                                dark:border-gray-600 
                                dark:placeholder-gray-400 
                                dark:text-white 
                                dark:focus:ring-blue-500 
                                dark:focus:border-blue-500">
                                @foreach ($authors as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            
                            @error('author_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('books.index') }}" 
                            class="button 
                            text-white 
                            justify-end 
                            bg-gray-700 
                            hover:bg-gray-800 
                            focus:ring-4 
                            focus:outline-none 
                            focus:ring-gray-300 
                            font-medium 
                            rounded-lg 
                            text-sm w-full sm:w-auto px-5 py-2.5 
                            text-center dark:bg-gray-600 
                            dark:hover:bg-gray-700 
                            dark:focus:ring-gray-800 mr-2">
                                Cancel
                            </a>

                            <button type="submit"
                                class="text-white 
                                justify-end 
                                bg-blue-700 
                                hover:bg-blue-800 
                                focus:ring-4 
                                focus:outline-none 
                                focus:ring-blue-300 
                                font-medium rounded-lg 
                                text-sm w-full 
                                sm:w-auto px-5 py-2.5 
                                text-center dark:bg-blue-600 
                                dark:hover:bg-blue-700 
                                dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>