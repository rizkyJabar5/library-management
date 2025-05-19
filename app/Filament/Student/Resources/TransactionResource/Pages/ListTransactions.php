<?php

namespace App\Filament\Student\Resources\TransactionResource\Pages;

use App\Enums\BorrowedStatus;
use App\Filament\Student\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->modifyQueryUsing(fn($query) => $query->where('user_id', auth()->id())),
            'Borrowed' => Tab::make()
                ->modifyQueryUsing(fn($query) => $query->where('user_id', auth()->id())
                    ->whereStatus(BorrowedStatus::Borrowed)),
            'Returned' => Tab::make()
                ->modifyQueryUsing(fn($query) => $query->where('user_id', auth()->id())
                    ->whereStatus(BorrowedStatus::Returned)),
            'Delayed' => Tab::make()
                ->modifyQueryUsing(fn($query) => $query->where('user_id', auth()->id())
                    ->whereStatus(BorrowedStatus::Delayed)),
        ];
    }
}
