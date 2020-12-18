<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected  $table='post';

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Tag::class,
            'post_tag_map',
            'post_id',
            'tag_id');
    }
}
