<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'dms_no',
        'doctype_id',
        'case_no',
        'location',
        'investigator',
        'approver',
        'subject',
        'file_upload',
        'office',
        'encoded_by',
        'status',
    ];

    public function docType()
    {
        return $this->belongsTo(DocumentType::class, 'doctype_id', 'id');
    }

    public function DocTrack()
    {
        return $this->belongsTo(DocTrack::class, 'id', 'dms_no');
    }

    public function DocTracks()
    {
        return $this->hasOne(DocTrack::class, 'dms_no', 'id');
    }
}
