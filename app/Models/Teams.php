<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'uuid',
        'team_name',
    ];

    /**
     * Get the members of the team.
     */
    public function members()
    {
        return $this->hasMany(TeamMembers::class,'team_id');
    }


}
