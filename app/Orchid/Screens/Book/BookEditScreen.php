<?php

namespace App\Orchid\Screens\Book;

use App\Models\Book;
use Orchid\Screen\Screen;

class BookEditScreen extends Screen
{
    /**
     * Query data for the screen.
     *
     * @var Book
     */
    public $book;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Book $book): iterable
    {
        $book->load(['author']);

        return [
            'book' => $book,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->book->exists ? 'Edit Book' : 'Create Book';
    }

    public function description(): ?string
    {
        return 'Book details';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [];
    }
}
