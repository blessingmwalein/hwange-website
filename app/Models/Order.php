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
use Orchid\Support\Facades\Dashboard;

class Order extends Model
{
    use Notifiable, UserAccess, AsSource, Filterable, Chartable, HasFactory, Attachable;


    protected $guarded;

    protected $allowedFilters = [
        'id'         => Where::class,
        'status'       => Like::class,
        'order_notes'       => Like::class,
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
        'status',
        'updated_at',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function currency()
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }
}
