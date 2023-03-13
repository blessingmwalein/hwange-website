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

class Color extends Model
{
    use Notifiable, UserAccess, AsSource, Filterable, Chartable, HasFactory, Attachable;

    protected $guarded;

    protected $allowedFilters = [
        'id'         => Where::class,
        'name'       => Like::class,
        'code' => Like::class,
        'symbol' => Like::class,
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
        'code',
        'symbol',
        'updated_at',
        'created_at',
    ];
}
