<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Specifications;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\UTM;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductEditLayout extends Rows
{

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = '';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function fields(): iterable
    {
        $currencies = Currency::all();
        return [
            Input::make('product.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('product.quantity')
                ->type('number')
                ->required()
                ->title(__('Quantity'))
                ->placeholder(__('Quantity')),

            CheckBox::make('product.isOnPromotion')
                ->sendTrueOrFalse()
                ->title('Is On Promotion'),

            //can see if there is produt on edit

            Select::make('product.category_id')
                ->fromModel(Category::class, 'name', 'id')
                ->empty('No select'),

            Select::make('product.colors.')
                ->fromModel(Color::class, 'name', 'id')
                ->multiple()
                ->title('Product Colors'),

            Select::make('product.specifications.')
                ->fromModel(Specifications::class, 'name', 'id')
                ->multiple()
                ->title('Product Specifications'),


            // Matrix::make('product.prices.')
            //     ->title('Product Prices')
            //     ->columns([
            //         'Currency',
            //         'Price',
            //     ])->fields([
            //         "Currency" =>  Select::make('currency_id')
            //             ->fromModel(Currency::class, 'name', 'id')
            //             ->empty('No select'),
            //         "Price" =>  Input::make('price')
            //             ->type('number')
            //             ->placeholder(__('000')),
            //     ]),


            Group::make([
                Select::make('product.Currency1')
                    ->fromModel(Currency::class, 'name', 'id')
                    ->title('Currency 1')
                    ->empty('No select'),

                Input::make('product.Price1')
                    ->type('number')
                    ->title('Price 1')
                    ->placeholder(__('000'))
            ]),
            Group::make([
                Select::make('product.Currency2')
                    ->fromModel(Currency::class, 'name', 'id')
                    ->title('Currency 2')
                    ->empty('No select'),

                Input::make('product.Price2')
                    ->type('number')
                    ->title('Price 2')
                    ->placeholder(__('000'))
            ]),
            Group::make([
                Select::make('product.Currency3')
                    ->fromModel(Currency::class, 'name', 'id')
                    ->title('Currency 3')
                    ->empty('No select'),

                Input::make('product.Price3')
                    ->type('number')
                    ->title('Price 3')
                    ->placeholder(__('000'))
            ]),
            Group::make([
                Select::make('product.Currency4')
                    ->fromModel(Currency::class, 'name', 'id')
                    ->title('Currency 4')
                    ->empty('No select'),

                Input::make('product.Price4')
                    ->type('number')
                    ->title('Price 4')
                    ->placeholder(__('000'))
            ]),

            Input::make('images')
                ->type('file')
                ->title('Product Images')
                ->multiple()
                ->horizontal(),

            TextArea::make('product.description')
                ->required()
                ->title(__('Description'))
                ->rows(3),

            TextArea::make('product.banner_text')
                ->title(__('Baner Text'))
                ->rows(3)
        ];
    }
}
