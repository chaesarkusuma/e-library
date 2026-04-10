@extends('dashboard.layout.main')

@section('konten')
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 lg:col-span-9 p-4">
            @session('success')
                <p class="bg-green-100 px-6 py-5 rounded-md text-sm text-green-800 border border-green-300 mb-5 mt-5">
                    {{ session('success') }}
                </p>
            @endsession
            <a href="/dashboard/book/create"
                class="px-5 py-3 bg-sky-300 rounded-md text-gray-500 hover:bg-sky-400 transition">Tambah book</a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 lg:col-span-12 p-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Buku
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                cover
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($books->count())
                            @foreach ($books as $book)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $book->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $book->category->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $book->author->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img class="w-11" src="{{ Storage::url($book->cover) }}" alt="">
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <form action="/dashboard/book/{{ $book->slug }}" method="POST"
                                            class="text-red-500 hover:text-red-500">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('apakah anda yakin?')"><i
                                                    class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                                        </form>
                                        <p>|</p>
                                        <div class="text-yellow-500 hovet:text-yellow-600">
                                            <a href="/dashboard/book/{{ $book->slug }}/edit"><i
                                                    class="fa-pen fa-solid fa-square"></i>Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <td colspan="6" class="p-4 text-center text-gray-500">
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- pagination --}}
                <div class="mt-6">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
