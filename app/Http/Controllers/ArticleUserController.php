<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Facades\Auth;


class ArticleUserController extends Controller
{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
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
    $id=Auth::user()->id;

    $post = DB::table('posts')
    ->where('id_user',$id)
    ->where('statusDraft','saved')
    ->orwhere('statusApproval','reject')
    ->get();

    return view('/home',compact('post'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $this->validate($request, [
      'body' => 'required',
      'judul' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);


    $image = $request->file('image');
    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $input['imagename']);


    //$this->postImage->add($input);

    DB::table('posts')
    ->insert([
      'id_user' => Auth::user()->id,
      'judul' => $request->judul,
      'body' => $request->body,
      'image' =>   $input['imagename'] ,
    ]);



    return redirect('/home');

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $data = DB::table('posts')
    ->where('id',$id)
    ->first();
    return view('edit',compact('data'));
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
    $this->validate($request, [
      'body' => 'required',
      'judul' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    $oldFile = DB::table('posts')->where('id',$id)->first();
    if($request->file('image')){


      $image = $request->file('image');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $image->move($destinationPath, $input['imagename']);
      DB::table('posts')
      ->where('id', $id)
      ->update([
        'image' => $input['imagename']
      ]);
    }

    DB::table('posts')
    ->where('id', $id)
    ->update([
      'judul' => $request->judul,
      'body' => $request->body,

    ]);
    File::delete(public_path('images/'.$oldFile->image));
    return redirect('home');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    DB::table('posts')
    ->where('id',$id)
    ->delete();
    return redirect('/home');
  }

  public function post($id)
  {
    DB::table('posts')
    ->where('id', $id)
    ->update(['statusDraft' => 'posted','statusApproval' => 'pending']);


    return redirect('/home');

  }




}
