<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'day la trang index->home controller';
        return view('admin.posts.index');
    }
    public function dashboard()
    {
        // return 'day la trang index->home controller';
        $users = DB::select('select * from users');
        dd($users);

        return view('layouts.admin');
    }

}
