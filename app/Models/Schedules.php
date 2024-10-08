<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedules extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'type',
        'id_belongs_to',
        'team_id_belongs_to',
        'schedule_id',
        'start_time',
        'end_time',
        'status', // 0=> undecided,1=>just created, 2=> scheduled, 3=>pending lecture confirmation, 5=>confirmed, 6=> postponed, 4=> cancelled, 7=> finished
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

   /* public function belongs()
    {
        // Assuming this might be a polymorphic relationship
        return $this->morphTo('id_belongs_to');
    }*/

    public function team()
    {
        return $this->belongsTo(Teams::class, 'team_id_belongs_to');
    }



    
    
    }
