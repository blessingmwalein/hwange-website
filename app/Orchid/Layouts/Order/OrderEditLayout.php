<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Category;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Product;
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
use Orchid\Platform\Models\User;


class OrderEditLayout extends Rows
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
 
            Select::make('order.user_id')
                ->fromModel(User::class, 'name', 'id')
                ->title('Client')
                ->empty('No select'),

            Input::make('order.total')
                ->type('number')
                ->required()
                ->title(__('Total'))
                ->placeholder(__('0')),

            Input::make('order.quantity')
                ->type('number')
                ->required()
                ->title(__('Quantity'))
                ->placeholder(__('0')),

            Select::make('order.currency_id')
                ->fromModel(Currency::class, 'name', 'id')
                ->title('Currency')
                ->empty('No select'),
            Select::make('order.color')
                ->fromModel(Color::class, 'name', 'name')
                ->title('Color')
                ->empty('No select'),

            Select::make('order.product_id')
                ->fromModel(Product::class, 'name', 'id')
                ->title('Product')
                ->empty('No select'),

            Select::make('order.status')
                ->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->title('Status')
                ->empty('No select'),


            TextArea::make('order.order_notes')
                ->required()
                ->title(__('Order Notes'))
                ->rows(3),
        ];
    }
}
