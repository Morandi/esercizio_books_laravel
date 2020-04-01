<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['titolo', 'autore', 'genere'];

    public function saveBook($data){
        $this->titolo = $data['titolo'];
        $this->autore = $data['autore'];
        $this->genere = $data['genere'];
        $this->save();
        return 1;
    }

    public function updateBook($data){
        $book = $this->find($data['id']);
        $book->titolo = $data['titolo'];
        $book->autore = $data['autore'];
        $book->autore = $data['genere'];
        $book->save();
        return 1;
    }
}
