<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locations extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'description',
        'child_of',
        'latitude',
        'longitude',
        'map_urls',
    ];

    protected $casts = [
        'map_urls' => 'json',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function parent()
    {
        return $this->belongsTo(Locations::class, 'child_of');
    }

    public function children()
    {
        return $this->hasMany(Locations::class, 'child_of');
    }


}
