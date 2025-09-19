<?php

use App\Models\Book;

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3><a href="{{ route('books') }}">Book List</a></h3>
                    <nav>
                        <a href="{{ route('books', ['filter' => null]) }}">All</a> |
                        <a href="{{ route('books', ['filter' => 'read']) }}">Read</a> |
                        <a href="{{ route('books', ['filter' => 'unread']) }}">Unread</a>
                    </nav>
                    <?php

                        $books = Book::all();

                        $user = Auth::user();
                    ?>
                        @foreach ($books as $book)
                            <a href="{{ route('book', ['book' => $book->id]) }}"><h3 class='font-bold text-lg text-indigo-800 dark:text-indigo-200'>"{{ $book->name }}"</h3></a>
                            <span class='text-yellow-200'>Written by: {{ $book->author }}</span><br />
                            <form action="{{ route('book-user.store', $book->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit">Add to My Books</button>
                            </form>
                            <br /><br />
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>