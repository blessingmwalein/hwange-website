<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Layouts\Selection;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Orchid\Filters\RoleFilter;


class CategoryFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            RoleFilter::class,
        ];
    }
}
