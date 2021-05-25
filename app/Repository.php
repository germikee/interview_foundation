<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'owner',
        'avatar',
        'description',
        'url',
        'payload',
        'user_id',
    ];

    /**
     * Get user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
