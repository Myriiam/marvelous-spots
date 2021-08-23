<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'description',
        'phone_place',
        'website_place',
        'address', 
        'status',
        'map',
        'created_at',
        'updated_at',
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
    protected $table = 'articles';

    /**
     * Get the user of the article(s) - relationship 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        //OR return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the picture(s) of the article - relationship 
     */
    public function pictures()
    {
        return $this->hasMany(Picture::class);
        //OR return $this->hasMany('App\Models\Picture');
    }

    /**
     * Get the category/categories of the article - relationship 
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
        //OR return $this->belongsToMany('App\Models\Category');
    }
    
    /**
     * Get the comment(s) of the article - relationship 
     */
    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
        //OR return $this->hasMany('App\Models\ArticleComment');
    }

    /**
     * Get the like(s) of the article - relationship 
     */
    public function favorites()
    {
        return $this->hasMany(ArticleFavorite::class);
        //OR return $this->hasMany('App\Models\ArticleFavorite');
    }
}
