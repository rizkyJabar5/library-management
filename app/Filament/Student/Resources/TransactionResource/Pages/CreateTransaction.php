<?php

namespace App\Filament\Student\Resources\TransactionResource\Pages;

use App\Filament\Student\Resources\TransactionResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormSchema(): array
    {
        return static::getResource()::form($this->form)->schema();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Borrowed Book')
            ->body('The user has been borrow book successfully.');
    }
//    protected function mutateFormDataBeforeCreate(array $data): array
//    {
//        // Get the user ID from the URL
//        if ($userId = request()->query('userId')) {
//            $user = User::find($userId);
//
//            // If the user exists, set the user_id in the form data
//            if ($user) {
//                $data['user_id'] = $user->name;
//            }
//        }
//
//        return $data;
//    }

    public static function disableCreateAnother(): void
    {
        parent::disableCreateAnother();
    }

    public function mount(): void
    {
        $userId = request()->query('userId');
        $user = User::find($userId);

        if (!$user) {
            // Handle the case where the project is not found
            return;
        }

        // Set the default value for the subject
        $this->form->fill([
            'user_id' => $user->name,
        ]);
    }
}
