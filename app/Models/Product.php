<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        "category_id",
        "name",
        "price",
        "description",
    ];

    public array $translatable = ["name", "description"];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function stocks():HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
