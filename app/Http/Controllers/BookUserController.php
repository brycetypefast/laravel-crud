<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookUserController extends Controller
{
    public function store(Request $request, $bookId)
    {
        
        $user = Auth::user();

        // attach just this one book
        $user->books()->attach($bookId);

        return redirect()->back()->with('success', 'Book added to user’s list!');
    }
}