<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Archivist extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['login', 'password', 'name'];
    protected $hidden = ['password', 'remember_token'];

    public function getAuthIdentifierName()
    {
        return 'login';
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
}
