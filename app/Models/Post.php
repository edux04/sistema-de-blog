<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function url()
    {
        return url("/articulos/{$this->id}-" . Str::slug($this->title));
    }
    public function publicUrl()
    {
        return url("/{$this->category->name}/{$this->id}-" . Str::slug($this->title));
    }


    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
}