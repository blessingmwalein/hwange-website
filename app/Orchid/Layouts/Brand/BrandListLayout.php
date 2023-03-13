<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Brand;

use App\Models\Brand;
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

class BrandListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'brands';

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
                ->render(fn (Brand $brand) => // Please use view('path')
                "<img src='/storage/{$brand->icon}'
                                              alt='sample'
                                              class='mw-100 d-block img-fluid rounded-1' width='50'>
                                            <span class='small text-muted mt-1 mb-0'># {$brand->id}</span>"),

            TD::make('name', 'Name')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Brand $brand) => Str::limit($brand->name, 200)),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Brand $brand) => $brand->updated_at->toDateTimeString()),
            TD::make('created_at', __('Created At'))
                ->sort()
                ->filter(DateTimer::make('open')
                ->title('Created Date')
                ->allowInput())

                ->render(fn (Brand $brand) => $brand->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Brand $brand) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('categories.edit', $brand->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Are you sure you want to delete this brand.'))
                            ->method('remove', [
                                'id' => $brand->id,
                            ]),
                    ])),
        ];
    }
}
