<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function index(Request $request) {
    
    $users = User::when($request->search, function($query) use ($request) {
                $query
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ;
            })->paginate(8)->withQueryString();

    return Inertia::render('Home', [
        'users' => $users,

        'searchTerm' => $request->search,
        //Give permission to show delete user section / not delete
        'can' => [
            'delete_user' => 
                Auth::user() ? 
                Auth::user()->can('delete', User::class) : 
                null
        ]

    ]);

    }


    public function destroy(Request $request) {
        User::findOrFail($request->id)->delete();
    }
}
