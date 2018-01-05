@extends('layouts.app')

@section('content')

<div>
  <div class="col-md-8 col-md-offset-2">
    <table class="table table-bordered">
      <tr>
        <td align="center">Judul</td>
        <td align="center">Tanggal</td>
        <td align="center">Show</td>
      
      </tr>
      @foreach($post as $a)
      <tr>
        <td>{{$a->judul}}</td>
        <td>{{$a->created_at}}</td>

        <td align="center">

          <a href={{route('page.show',$a->id)}}><button>Show</button></a>

        </td>
      </tr>
      @endforeach
    </table>

  </div>
</div>

@endsection
