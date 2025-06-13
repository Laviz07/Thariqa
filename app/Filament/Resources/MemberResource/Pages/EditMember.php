<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check() && Auth::id() === $this->record->id) {
            return $this->getResource()::getUrl('edit', ['record' => $this->record->id]);
        }

        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title('Pengguna berhasil diedit!')
            ->success()
            ->send();

        $isEditingOwnAccount = Auth::check() && Auth::id() === $this->record->id;
        $isChangingPassword = filled($this->data['password'] ?? null);

        if ($isEditingOwnAccount && $isChangingPassword) {
            Auth::loginUsingId($this->record->id);
            session()->regenerate(); // penting agar sesi Livewire tidak rusak
        }
    }


    protected function getSavedNotification(): ?Notification
    {
        return null;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // supaya password tidak diubah kalau kosong
        }
        return $data;
    }
}
