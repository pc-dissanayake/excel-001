<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected $plainPassword;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->plainPassword = Str::random(rand(12,36));
        $data['password'] = Hash::make($this->plainPassword);
        
        // Store the plain password temporarily
        $this->plainPassword = $this->plainPassword;

        return $data;
    }

    protected function afterCreate(): void
    {
        // Access the created user through $this->record
        $user = $this->record;

        // Send invitation notification
        $user->notify(new \App\Notifications\UserInvitationNotification($this->plainPassword));
    }
}