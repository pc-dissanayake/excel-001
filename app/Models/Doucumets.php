<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doucumets extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'public_access',
        'type',
        'title',
        'category_owned_by',  //event,academics,module,course,team,lesson, etc.
        'id_belongs_to',
        'team_id_belongs_to',
        'start_time',
        'end_time',
        'color',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id_belongs_to');
    }

    // You might want to add a polymorphic relationship for 'id_belongs_to'
    



}
