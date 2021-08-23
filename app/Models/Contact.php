<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'status',
        'date',
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
    protected $table = 'contacts';

     /**
     * Get the user who send/receive the messages - relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id', 'receiver_id');
        //OR return $this->belongsTo('App\Models\User');
    }
}
