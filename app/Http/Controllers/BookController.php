<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function show($id)
    {   
        $user = Auth::user();
        $book = $user->books()
             ->where('books.id', $id)
             ->firstOrFail();
        return view('book', ['book' => $book]);
    }

    public function index(Request $request) {

        $filter = $request->query('filter'); // e.g. ?filter=read

        $user = Auth::user();

        $query = $user->books();

        if ($filter === 'read') {
            $books = $query->wherePivot('has_read', 1)->get();
        } elseif ($filter === 'unread') {
            $books = $query->wherePivot('has_read', 0)->get();
        } else {
            $books = $query->get(); // all books
        }

        return view('books', ['books' => $books]);

    }

    public function updateHasRead(Request $request, $id) 
    {

        // validate the request!
        /*
        $validated = $request->validate()



        */

        $user = Auth::user();

        $book = $user->books()->where('books.id', $id)->firstOrFail();

        if (!$book) {

            return response()->json(['message' => 'Book not found. Couldn\'t update'], 404);

        }

        // $book->update(['has_read' => $request->has_read]);

        

        if ($request->has_read == 1) {

            $user->books()->updateExistingPivot($id, ['has_read' => 1]);

        } elseif ($request->has_read == 0) {

            $user->books()->updateExistingPivot($id, ['has_read' => 0]);

        } else {

        }

        $book = $user->books()->where('books.id', $id)->firstOrFail();

        return view('book', ['book' => $book]);

    }

    public function remove_relation(Request $request, $id) {

        $user = Auth::user();

        $user->books()->detach($id);
        return view('books');

    }


}