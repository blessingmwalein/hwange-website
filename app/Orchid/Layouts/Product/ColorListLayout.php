<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Product;

use App\Models\Color;
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

class ColorListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'colors';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
           
            TD::make('name', 'Name')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Color $color) => Str::limit($color->name, 200)),
            

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Color $color) => $color->updated_at->toDateTimeString()),
            TD::make('created_at', __('Created At'))
                ->sort()
                ->filter(DateTimer::make('open')
                ->title('Created Date')
                ->allowInput())

                ->render(fn (Color $color) => $color->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Color $color) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('colors.edit', $color->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Are you sure you want to delete this color.'))
                            ->method('remove', [
                                'id' => $color->id,
                            ]),
                    ])),
        ];
    }
}
