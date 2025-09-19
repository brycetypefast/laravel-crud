@php

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book :: ' . $book->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3><a href="{{ route('books') }}">Books Read</a></h3>
                    @php
                                          
                        echo "<a href='" . route('book', ['book' => $book->id]) . "'><h3 class='font-bold text-lg text-indigo-800 dark:text-indigo-200'>" . $book->name . "</h3></a>";
                        echo "<span class=" . ($book->pivot->has_read ? "text-yellow-200" : "") . "> Written by: " . $book->author . "</span>";
                    @endphp

                    <form action="{{ route('book', $book->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="has_read">Read?</label>
                        <input type="hidden" name="has_read" value="0">
                        <input type="checkbox" name="has_read" id="has_read" value="1" onChange="submit()" {{ old('has_read', $book->pivot->has_read) ? 'checked' : '' }}>
                    </form>
                    <form action="{{  route('book.remove', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @php
                        echo "<br /><br />";
                        echo "<a href='" . route('books') . "'><span class='text-yellow-200 dark:text-yellow-200'>Return to All Books</span></a>";
        
                    @endphp
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>