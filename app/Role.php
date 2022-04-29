<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

    protected $fillable = [
        'role', 'desc'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
