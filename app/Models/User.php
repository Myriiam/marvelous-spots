<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'role',
        'email',
        'password',
        'birthdate',
        'gender',
        'country',
        'city',
        'picture',
        'about_me',
    ];

      /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users';

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

    /**
     * Get the guide's infos when a user is a guide (role) - relationship
     */
    public function guide()
    {
        return $this->hasOne(Guide::class);
        //OR return $this->hasOne('App\Models\Guide');
    }

    /**
     * Get the all the messages from/to the user - relationship
     */
    public function messages()
    {
        return $this->hasMany(Contact::class);
        //OR return $this->hasMany('App\Models\Contact');
    }

    /**
     * Get the booking(s) of the user (his demand to) - relationship
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
        //OR return $this->hasMany('App\Models\Booking');
    }

    /**
     * Get the artcile(s) of the user - relationship
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
        //OR return $this->hasMany('App\Models\Article');
    }
}
