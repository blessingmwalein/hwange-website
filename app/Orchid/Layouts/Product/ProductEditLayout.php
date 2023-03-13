<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Specifications;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
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
                ->value(1)
                ->title('Is On Promotion')
                ->help('Put the product on promotion'),

            Select::make('product.category_id')
                ->fromModel(Category::class, 'name', 'id')
                ->empty('No select'),

            Relation::make('product.colors.')
                ->fromModel(Color::class, 'name', 'id')
                ->multiple()
                ->title('Product Colors'),



            Relation::make('product.specifications.')
                ->fromModel(Specifications::class, 'name', 'id')
                ->multiple()
                ->title('Product Specifications'),



            Matrix::make('product.prices.')
                ->title('Product Prices')
                ->columns([
                    'Currency',
                    'Price',
                ]),

            Input::make('product.images')
                ->type('file')
                ->title('Product Images')
                ->multiple()
                ->horizontal(),
            TextArea::make('product.description')
                ->required()
                ->title(__('Description'))
                ->rows(3),

            TextArea::make('product.banner_text')
                ->required()
                ->title(__('Baner Text'))
                ->rows(3)
        ];
    }
}
