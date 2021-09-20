<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentGuide extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id',
        'comment',
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
    protected $table = 'comment_guides';


    /**
     * Get the booking of this/these comment(s) - relationship 
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
        //OR return $this->belongsTo('App\Models\Booking');
    }
}
