<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    protected $table = 'offices';

    protected $fillable = [
        'office_name',
        'added_by',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function positionsRel()
    {
        return $this->hasOne(Positions::class, 'office_id', 'id');
    }

    public function usersRel()
    {
        return $this->hasOne(User::class, 'office_id', 'id');
    }

    public function officeRel()
    {
        return $this->hasOne(User::class, 'office_id', 'id');
    }
    
    // To view the from column in the incoming documents
    public function IncomingOffice()
    {
        return $this->hasOne(DocTrack::class, 'from', 'id');
    }

    public function IncomingOfficeTo()
    {
        return $this->hasOne(DocTrack::class, 'to', 'id');
    }

}
