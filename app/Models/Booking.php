<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
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
        'visit_start',
        'visit_end',
        'nb_person',
        'message',
        'booked_at', //created_at
        'total_price',
        'status_demand',
        'status_offer',
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
    protected $table = 'bookings';

    /**
     * Get the user's booking (when he book a guide) - relationship = demand to
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        //OR return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the guide's booking (when he receive an offer from an other user traveler or guide) - relationship = offer from
     */
    public function guide()
    {
        return $this->belongsTo(Guide::class);
        //OR return $this->belongsTo('App\Models\Guide');
    }
}
