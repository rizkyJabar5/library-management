<?php

namespace App\Filament\Student\Resources;

use App\Enums\BorrowedStatus;
use App\Filament\Student\Resources\TransactionResource\Pages;
use App\Http\Traits\NavigationCount;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TransactionResource extends Resource
{
    use NavigationCount;

    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Books & Transactions';

    protected static ?string $recordTitleAttribute = 'user.name';

    protected static ?int $globalSearchResultLimit = 20;

    /**
     * @param Transaction $record
     * @return array
     */
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Borrower' => $record->user->name,
            'Book Borrowed' => $record->book->title,
            'Status' => $record->status,
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('book.title')
                    ->sortable()
                    ->searchable()
                    ->label('Borrowed Book'),
                TextColumn::make('borrowed_date')
                    ->date('d M, Y'),
                TextColumn::make('returned_date')
                    ->date('d M, Y'),
                TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make('book.title')
                    ->modal()
                    ->modalContent(fn(Transaction $trx) => view('filament.student.pages.transaction.view', [
                        'transaction' => $trx,
                    ]))
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
        ];
    }
}
