<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'email',
        'name',
        'school_id_number',
        'contact_number',
        'age',
        'birthdate',
        'status',
        'gender',
        'school_branch',
        'interests',
        'address',
        'avatar_photo'
    ];
    public function user_name()
    {
        return $this->belongsTo(User::class, 'email');
    }
}
