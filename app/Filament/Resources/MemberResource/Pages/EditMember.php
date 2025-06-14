<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EditMember extends EditRecord
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        if (Auth::user()->role !== 'admin') {
            return [];
        }

        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function canEdit(): bool
    {
        $user = Auth::user();

        return $user->role === 'admin' || $this->record->id === $user->id;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', ['record' => $this->record->id]);
    }


    protected function afterSave(): void
    {
        Notification::make()
            ->title('Pengguna berhasil diedit!')
            ->success()
            ->send();
    }


    protected function getSavedNotification(): ?Notification
    {
        return null;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['password'])) {
            \Illuminate\Database\Eloquent\Model::withoutTouching(function () use ($data) {
                $this->record->forceFill([
                    'password' => bcrypt($data['password']),
                    'remember_token' => Str::random(60), // kunci agar tidak logout
                ])->saveQuietly();
            });

            unset($data['password']); // agar tidak disimpan dua kali
        }

        return $data;
    }
}
