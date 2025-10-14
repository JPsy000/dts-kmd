<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = 'document_type';

    protected $fillable = [
        'document_type',
        'added_by',
    ];

    public function documents()
    {
        return $this->hasOne(Documents::class, 'doctype_id', 'id');
    }
}
