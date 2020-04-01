@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Titolo</td>
              <td>Autore</td>
              <td>Genere</td>
              <td colspan="2">Operazione</td>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->titolo}}</td>
                <td>{{$book->autore}}</td>
                <td>{{$book->genere}}</td>
                <td><a href="{{action('BooksController@editlaravel',$book->id)}}" class="btn btn-primary">Modifica</a></td>
                <td>
                    <form action="{{action('BooksController@destroylaravel', $book->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="POST">
                        <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection