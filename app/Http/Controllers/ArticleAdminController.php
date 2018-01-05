<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArticleAdminController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $post = DB::table('posts')
                      ->where('statusApproval','pending')
                      ->get();
    

        return view('admin.home',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = DB::table('posts')
      ->where('id',$id)
      ->first();

      return view('admin.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id)
    {
      DB::table('posts')
      ->where('id', $id)
      ->update(['statusDraft' => 'closed','statusApproval' => 'approved']);


      return redirect('/admin/page');

    }

    public function reject($id)
    {
      DB::table('posts')
      ->where('id', $id)
      ->update(['statusDraft' => 'saved','statusApproval' => 'reject']);


      return redirect('/admin/page');

    }
}
