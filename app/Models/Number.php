<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Number extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var integer[]
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'maiden_name',
        'phone_number',
        'mobile_number',
        'birthday',
        'email',
        'occupation',
        'url',
        'other_names',
        'notes',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
