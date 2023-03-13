<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Product;

use App\Models\Product;
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

class ProductListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'products';

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
            ->render(fn (Product $product) => // Please use view('path')
            "<img src='/storage/{$product->images[0]->image}'
                                          alt='sample'
                                          class='mw-100 d-block img-fluid rounded-1' width='50'>
                                        <span class='small text-muted mt-1 mb-0'># {$product->id}</span>"),
            TD::make('name', 'Name')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Product $product) => Str::limit($product->name, 200)),

            TD::make('quantity', 'Quantity')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Product $product) => Str::limit($product->name, 200)),

            TD::make('price', 'Price')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Product $product) =>$product->getMainPrice()->currency->name . Str::limit($product->getMainPrice()->price, 200)),

            TD::make('isOnPromotion', 'On Promotion')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Product $product) => Str::limit($product->name, 200)),
            

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Product $product) => $product->updated_at->toDateTimeString()),

            TD::make('created_at', __('Created At'))
                ->sort()
                ->filter(DateTimer::make('open')
                ->title('Created Date')
                ->allowInput())

                ->render(fn (Product $product) => $product->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Product $product) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('products.edit', $product->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Are you sure you want to delete this product.'))
                            ->method('remove', [
                                'id' => $product->id,
                            ]),
                    ])),
        ];
    }
}
