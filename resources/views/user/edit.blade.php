@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('BooksController@updatelaravel', $id)}}" >
        <!--{{csrf_field()}}-->
        <input name="_method" type="hidden" value="POST">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="titolo">Titolo del libro:</label>
            <input type="text" class="form-control" name="titolo" value={{$book->titolo}} />
        </div>
        <div class="form-group">
            <label for="autore">Autore:</label>
            <input type="text" class="form-control" name="autore" value={{$book->autore}} />
        </div>
        <div class="form-group">
            <label for="genere">Genere:</label>
            <textarea cols="5" rows="5" class="form-control" name="genere">{{$book->genere}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
</div>
@endsection