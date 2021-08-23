<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteGuide extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'guide_id',
        'created_at',
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
    protected $table = 'favorite_guides';

    /**
     * Get the user of this/these like(s) - relationship 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        //OR return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the guide of this/these like(s) - relationship 
     */
    public function guide()
    {
        return $this->belongsTo(Guide::class);
        //OR return $this->belongsTo('App\Models\Guide');
    }
}
