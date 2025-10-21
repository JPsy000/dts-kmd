<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'office_id',
        'position_id',
        'profile_picture',
        'status',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function office()
    {
        return $this->hasOne(Offices::class, 'added_by', 'id');
    }

    public function officeRel()
    {
        return $this->belongsTo(Offices::class, 'office_id', 'id');
    }

    public function positionToUsers()
    {
        return $this->belongsTo(Positions::class, 'position_id', 'id');
    }

    public function doc_track()
    {
        return $this->hasOne(DocTrack::class, 'received_by', 'id');
    }

    public function doc_track1()
    {
        return $this->hasOne(DocTrack::class, 'encoded_by', 'id');
    }
}
