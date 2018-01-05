<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $post=DB::table('posts')
      ->where('statusApproval','approved')
      ->get();
        return view('welcome',compact('post'));
    }

    public function show($id)
    {
      $data=DB::table('posts')
      ->where('id',$id)
      ->first();
      return view('show',compact('data'));
    }
}
