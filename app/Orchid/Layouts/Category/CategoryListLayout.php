<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Illuminate\Support\Str;
use Orchid\Screen\Fields\DateTimer;

class CategoryListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'categories';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', __('ID'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Category $category) => // Please use view('path')
                "<img src='/storage/{$category->icon}'
                                              alt='sample'
                                              class='mw-100 d-block img-fluid rounded-1' width='50'>
                                            <span class='small text-muted mt-1 mb-0'># {$category->id}</span>"),

            TD::make('name', 'Name')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Category $category) => Str::limit($category->name, 200)),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Category $category) => $category->updated_at->toDateTimeString()),
            TD::make('created_at', __('Created At'))
                ->sort()
                ->filter(DateTimer::make('open')
                ->title('Created Date')
                ->allowInput())

                ->render(fn (Category $category) => $category->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Category $category) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('categories.edit', $category->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Are you sure you want to delete this category.'))
                            ->method('remove', [
                                'id' => $category->id,
                            ]),
                    ])),
        ];
    }
}
