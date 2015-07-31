<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'date_start',
        'date_end',
        'url_site'
    ];

    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDateStartAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function getDateEndAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopePublished($query, $id=null)
    {
        if(is_null($id))
            return $query->where('status', '=', 'publish');

        return $query->whereRaw('status=? AND id=?', ['publish', (int)$id])->orderBy('date_start', 'DESC');
    }

    public function getComments()
    {
        $getComments = Comment::published($this->id)->get();
        return $getComments;
    }

    public function nbComments()
    {
        $nbComments = $this->getComments()->count();
        return $nbComments;
    }
}