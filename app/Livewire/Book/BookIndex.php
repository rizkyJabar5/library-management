<?php

namespace App\Livewire\Book;

use Livewire\Component;
use App\Models\Books;

class BookIndex extends Component{

    public function addBook(){
        session()->flash('message', 'addbook!' );
    }

    public function render()
    {
        $books = Books::all();

        return view('livewire.book.book-index', [
            'books' => $books,
        ]);
    }
}
