<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'motivation',
        'travel_definition',
        'offering',
        //'living_time',
        'status',
        'price',
        'pause',
        'created_at',
        'since_when',
    ];

      /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'guides';

    /**
     * Get the user's infos who is a guide - relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        //OR return $this->belongsTo('App\Models\User');
    }

     /**
     * Get the booking of the guide (his offer from) - relationship
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
        //OR return $this->hasMany('App\Models\Booking');
    }

     /**
     * Get the category(ies) of the guide - relationship 
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
        //OR return $this->belongsToMany('App\Models\Category');
    }

    /**
     * Get the favorites(likes) of the guide - relationship
     */
    public function likes()
    {
        return $this->hasMany(FavoriteGuide::class);
        //OR return $this->hasMany('App\Models\FavoriteGuide');
    }

    /**
     * Get the language(s) of the guide - relationship 
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class);
        //OR return $this->belongsToMany('App\Models\Language');
    }
}
