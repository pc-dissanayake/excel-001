<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;



class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected $plainPassword;

    protected function afterCreate(): void
    {
        $this->resource::afterCreate($this->record);
    }


    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
    
        $this->plainPassword = Str::random(12);

    
        $data['password'] = $this->plainPassword ;
     
        return $data;
    }




}