@extends('layouts.app')

@section('content')
<center>
  <h1>Input Article</h1>
</center>
<br>
<br>

<div class="col-md-4 col-md-offset-4">
  <div class="form-group">
    <form method="post" action="{{ route('home.update',$data->id) }}" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PUT')}}
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="form-group has-success">
        <label class="form-control-label" >Judul</label>
        <input type="text" class="form-control " name="judul" value="{{$data->judul}}" >

      </div>






      <div class="row cancel">
        <div class="col-md-4">

          <input type="file" name="image">
          <br>
        </div>

      </div>

      <div class="form-group has-success">
        <label class="form-control-label" >Body</label>
        <textarea class="form-control" value="{{$data->body}}" name="body"></textarea>
      </div>

<button class="btn btn-success">Submit</button>
    </form>
    <br>
    <a href="/home"><button class="btn btn-primary" name="button">Back</button></a>
  </div>


  @endsection
