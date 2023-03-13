<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CurrencyEditLayout extends Rows
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
            Input::make('currency.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('currency.code')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Code'))
                ->placeholder(__('Code')),

            Input::make('currency.symbol')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Symbol'))
                ->placeholder(__('$')),
        ];
    }
}
