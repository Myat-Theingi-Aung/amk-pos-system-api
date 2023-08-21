<?php

namespace App\Models;

use App\Models\Product;
use App\Models\CategoryType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category_type_id'
    ];

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
