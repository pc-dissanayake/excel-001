<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMembers extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'team_id',
        'user_id',
    ];

    public function team()
    {
        return $this->belongsTo(Teams::class);
    }

    /**
     * Get the user associated with the team member.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
