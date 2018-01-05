@extends('layouts.app')

@section('content')

<div>
  <div class="col-md-8 col-md-offset-2">
    <table class="table table-bordered">
      <tr>
        <td align="center">Judul</td>
        <td align="center">Tanggal</td>
        <td align="center">Edit</td>
      </tr>
      @foreach($post as $a)
      <tr>
        <td>{{$a->judul}}</td>
        <td>{{$a->created_at}}</td>

        <td align="center">
          <a href={{"/home/post-article/".$a->id}}><button>post</button></a>
          <a href={{"home/".$a->id."/edit"}}><button>edit</button></a>
          <a href="{{ route('home.destroy',$a->id) }}"  onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            <button>delete</button>
          </a>

          <form id="delete-form" action="{{ route('home.destroy',$a->id) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <input type="submit" value="delete" style="display: none;">
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <center>
      <a href="{{ route('home.create')}}"><button class="btn btn-warning">Add New</button></a>
    </center>
  </div>
</div>

@endsection
