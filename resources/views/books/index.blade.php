<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books Lists') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center toast">


                        {{-- Menampilkan pesan sukses dengan session --}}
                        <x-session-status :status="session('message')"></x-session-status>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('books.create') }}"
                            class="button py-2 mb-2 px-3 text-xs font-medium text-white bg-gray-800 rounded-lg">Create</a>
                    </div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs 
                                bg-gray-200 
                                text-gray-700 uppercase 
                                bg-gray-50 
                                dark:bg-gray-700 
                                dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Book
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Author
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Published Year
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Options
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr
                                        class="
                                    bg-gray-300 border-b d
                                    ark:bg-gray-800 
                                    dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $book->name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{-- 
                                                Memanggil method getAuthor() yang sudah didefinisikan pada 
                                                model Book untuk menampilkan nama author yang ada pada tabel authors
                                                berdasarkan data author_id dari table boooks 
                                            --}}
                                            {{ $book->getAuthor->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $book->published_year }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{-- menambahkan tag untuk akses ke route dashboard saat button delete di klik --}}
                                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                                <a type="button" href="{{ route('books.edit', $book->id) }}"
                                                    class="
                                                    text-gray-800 
                                                    bg-yellow-400 
                                                    hover:bg-yellow-500 
                                                    font-medium rounded-lg
                                                    focus:outline-none 
                                                    text-xs px-3 py-2 mb-2">
                                                    Update
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Delete Data..?')"
                                                    class="py-2 
                                                    px-3 
                                                    text-xs 
                                                    font-medium 
                                                    text-center 
                                                    text-gray-100 
                                                    bg-red-500 rounded-lg 
                                                    hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{-- Menampilkan navigasi untuk berpindah halaman dengan method links() --}}
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
