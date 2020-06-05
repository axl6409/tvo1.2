<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    protected $table = "posts";

    protected $hidden = ['password', 'remember_token'];

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'image', 'is_publish', 'deleted_at', 'published_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getUrlPath()
    {
        return Storage::disk('public')->url($this->image);
    }

    /**
     * Get excerpt from string
     *
     * @param String $str String to get an excerpt from
     * @param Integer $startPos Position int string to start excerpt from
     * @param Integer $maxLength Maximum length the excerpt may be
     * @return String excerpt
     */
    function getExcerpt($str, $startPos=0, $maxLength=100) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength-3);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= '...';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }
}
