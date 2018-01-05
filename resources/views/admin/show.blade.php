@extends('layouts.app')

@section('content')
<center>
  <h1>Approve Article</h1>
</center>
<br>
<br>

<div class="col-md-4 col-md-offset-4">
  <div class="form-group">
    <form method="post" action="{{ route('home.update',$data->id) }}">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="form-group has-success">
        <label class="form-control-label" >Judul</label>
        <input type="text" class="form-control " name="judul" value="{{$data->judul}}" disabled>

      </div>
        <div><img src={{asset("images/".$data->image)}} height="100" width="100" ></div>

      <div class="form-group has-success">
        <label class="form-control-label" >Body</label>
        <input type="text" class="form-control" name="body" value="{{$data->body}}" disabled>
      </div>

    </form>
    <br>
    <a href={{"app-article/".$data->id}}><button class="btn btn-success">Approve</button></a>
    <a href={{"reject-article/".$data->id}}><button class="btn btn-danger">Reject</button></a>

    <a href="/admin/page"><button class="btn btn-primary" name="button">Back</button></a>
  </div>


  @endsection
