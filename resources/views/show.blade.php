@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
  <div class="form-group">

<div class="form-group has-success">
  <label class="form-control-label" >{{$data->judul}}</label>


</div>
  <div><img src={{asset("images/".$data->image)}} height="100" width="100" ></div>

<div class="form-group has-success">
  <br>
  <label class="form-control-label" >{{$data->body}}</label>

</div>
<a href="/"><span class="btn btn-success">Back</span></a>
</div>
</div>


@endsection
