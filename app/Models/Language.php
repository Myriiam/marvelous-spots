<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language',
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
    protected $table = 'languages';

    /**
     * Get the guide's infos who speak this language - relationship
     */
    public function guides()
    {
        return $this->belongsToMany(Guide::class);
        //OR return $this->belongsToMany('App\Models\Guide');
    }
}
