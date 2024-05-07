<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'gender',
        'umur',
        'tgl_lahir',
        'alamat',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
