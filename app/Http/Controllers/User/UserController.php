<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('user-only', auth()->user())) {
            return view('roles.user.index');
        } else {
            if (Auth::user()->is_admin == 1) return redirect('/admin');
            else abort(403);
        }
    }
}
