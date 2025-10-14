<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocTrack extends Model
{
    protected $table = 'doc_track';

    protected $fillable = [
        'dms_no',
        'date_received',
        'date_released',
        'remarks',
        'from',
        'encoded_by',
        'to',
        'received_by',
        'status'
    ];

    public function scopeSearch($query, ?string $term)
    {
        if (! $term) return $query;

        // make spaces flexible: "anna mar" matches "anna maria"
        $like = '%' . str_replace(' ', '%', $term) . '%';

        return $query->where(function ($q) use ($like) {
            $q->where('dms_no', 'like', $like);
        });
    }

    public function DocTrack()
    {
        return $this->hasOne(Documents::class, 'dms_no', 'dms_no');
    }

    // To view the from column in the incoming documents
    public function IncomingOffice()
    {
        return $this->belongsTo(Offices::class, 'from', 'id');
    }


    public function IncomingOfficeTo()
    {
        return $this->belongsTo(Offices::class, 'to', 'id');
    }

    public function IncomingOfficeafterReceive()
    {
        return $this->belongsTo(Offices::class, 'afterReceive', 'id');
    }

    public function IncomingOfficeafterForward()
    {
        return $this->belongsTo(Offices::class, 'afterForward', 'id');
    }
}
