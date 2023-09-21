<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Business extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['business_name', 'contact_email'];

    public function people(): HasMany
    {
        return $this->hasMany(Person::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'businesses_categories');
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'taskable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
