<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $table = 'positions';

    protected $fillable = ['office_id', 'position_name', 'status'];
    
    public function officeRel()
    {
        return $this->belongsTo(Offices::class, 'office_id', 'id');
    }
}
