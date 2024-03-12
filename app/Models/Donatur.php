<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Donatur extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != '' ? asset('/storage/donaturs/' . $value) : 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100',
        );
    }
}
