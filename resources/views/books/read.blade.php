<?php

use App\Models\Book;

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books Read') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php

                        $booksRead = Book::where('has_read', 1)->get();

                        foreach ($booksRead as $books) {

                            echo "<a href='" . route('book', ['book' => $books->id]) . "'><h3 class='font-bold text-lg text-indigo-800 dark:text-indigo-200'>" . $books->name . "</h3></a>";
                            echo "<span class=" . (($books->has_read == 1) ? "text-yellow-200 dark:text-yellow-800" : "") . "> Written by: " . $books->author . "</span>";
                            
                            echo "<br /><br />";
        
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>