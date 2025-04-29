<?php

namespace App\Orchid\Screens\Book;

use App\Models\Book;
use App\Orchid\Layouts\Book\BookListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class BookListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'books' => Book::with(
                'author',
                'publisher',
                'category')
                ->defaultSort('id', 'desc')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Book List';
    }

    public function description(): ?string
    {
        return 'List of books available in the library.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Create Book'))
                ->icon('bs.plus-circle')
                ->route('platform.book.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            BookListLayout::class
        ];
    }
}
