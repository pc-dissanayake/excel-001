<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lessons extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'module_id',
        'title',
        'description',
        'location_id',
        'academic_id',
    ];

  

    public function module()
    {
        return $this->belongsTo(Modules::class);
    }

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedules::class, 'schedule_id');
    }

    

    public function academic()
    {
        return $this->belongsTo(Academics::class, 'academic_id');
    }}
