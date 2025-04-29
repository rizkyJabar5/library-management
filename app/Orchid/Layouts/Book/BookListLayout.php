<?php

namespace App\Orchid\Layouts\Book;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BookListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'books';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')
                ->sort()
                ->filter(TD::FILTER_NUMERIC),

            TD::make('title', 'Title')
                ->sort()
                ->filter(),

            TD::make('author', 'Author')
                ->sort()
                ->filter(),

            TD::make('published_at', 'Published At')
                ->sort()
                ->filter(TD::FILTER_DATE_RANGE),
        ];
    }
}
