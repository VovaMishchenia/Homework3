<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected  $table='tag';
    public function posts()
    {

        return $this->belongsToMany(
            Post::class,
            'post_tag_map',
            'tag_id',
            'post_id');
    }

}
