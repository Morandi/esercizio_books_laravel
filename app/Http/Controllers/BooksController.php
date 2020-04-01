<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    //

    public function create(){
        return view('user.create');
    }
    
    public function store(Request $request){
        $book = new Book();
        $data = $this->validate($request, [
            'titolo' => 'required',
            'autore' => 'required',
            'genere' => 'required'
        ]);
       
        $book->saveBook($data);
        return redirect('/home')->with('success', 'Inserito un nuovo libro! Attendere qualche istante');
    }

    public function index(){
        $books = Book::all();

        return response($books)->header('Access-Control-Allow-Origin', '*');
        // return response($books);
    }

    public function indexlaravel(){
        $books = Book::all();

        return view('user.index', compact('books'));
    }

    public function edit($id){
        $book = Book::where('id', $id)
                        ->first();
    }

    public function editlaravel($id){
        $book = Book::where('id', $id)
                        ->first();

        return view('user.edit', compact('book', 'id'));
    }

    public function update(Request $request, $id){
        $book = new Book();
        $data = $this->validate($request, [
            'titolo'=>'required',
            'autore'=>'required',
            'genere'=>'required'
        ]);

        $data['id'] = $id;
        $book->updateBook($data);
    }

    public function updatelaravel(Request $request, $id){
        $book = new Book();
        $data = $this->validate($request, [
            'titolo'=>'required',
            'autore'=>'required',
            'genere'=>'required'
        ]);

        $data['id'] = $id;
        $book->updateBook($data);

        // return redirect('/home')->with('success', 'Informazioni del libro aggiornate!!');
    }

    public function destroy($id){
        $book = Book::find($id);
        $book->delete();

        $books = Book::all();
        // return response($books);
        return response($books)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, DELETE, PUT');
        // return response($id)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, DELETE, PUT');
        // return response($id);
    }

    public function destroylaravel($id){
        $book = Book::find($id);
        $book->delete();

        return redirect('/home')->header('Access-Control-Allow-Origin', '*')->with('success', 'Libro eliminato!!');
    }
}
