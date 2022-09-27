<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('admin-only', auth()->user())) {
            return view('roles.admin.index');
        } else {
            abort(403);
        }
    }
}
