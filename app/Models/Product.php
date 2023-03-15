<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Access\UserAccess;
use Orchid\Access\UserInterface;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Illuminate\Support\Str;


class Product extends Model
{
    use Notifiable, UserAccess, AsSource, Filterable, Chartable, HasFactory, Attachable;

    protected $guarded;

    //set slug field from name upon saving
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    protected $allowedFilters = [
        'id'         => Where::class,
        'name'       => Like::class,
        'quantity'   => Like::class,
        'description' => Like::class,
        'updated_at' => Like::class,
        'created_at' => Like::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'quantity',
        'description',
        'updated_at',
        'created_at',
    ];

   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }


    //get main price
    public function getMainPrice()
    {
        //check price with USD currency
        $price = $this->prices()->whereHas('currency', function ($query) {
            $query->where('code', 'USD');
        })->first();
        if ($price) {
            return $price;
        } else {
            return $this->prices()->first();
        }
    }
}
