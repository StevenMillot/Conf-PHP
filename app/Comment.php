<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'email',
        'message',
        'post_id',
        'status'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function scopePublished($query, $post_id=null)
    {
        if(is_null($post_id))
            return $query->where('status', '=', 'publish');
        return $query->whereRaw('status=? AND post_id=?', ['publish', (int)$post_id])->orderBy('created_at', 'ASC');
    }
}
