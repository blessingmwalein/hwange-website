<?php

namespace App\Orchid\Screens\Product;

use App\Models\Currency;
use App\Models\User;
use App\Orchid\Layouts\Product\ColorListLayout;
use App\Orchid\Layouts\Product\CurrencyListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class CurrencyListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'currencies' => Currency::defaultSort('created_at', 'desc')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Currency';
    }

    public function description(): ?string
    {
        return 'All currencies';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            Link::make(__('Add'))
                ->icon('plus')
                ->route('currencies.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            // CategoryFiltersLayout::class,
            CurrencyListLayout::class,
            // Layout::modal('asyncEditUserModal', CategoryEditLayout::class)
            //     ->async('asyncGetCategory'),
        ];
    }
    public function asyncGetCurrency(Currency $currency): iterable
    {
        return [
            'currency' => $currency,
        ];
    }

    public function save(Currency $currency, Request $request)
    {
        $request->validate([
            'currency.name' => [
                'required'
            ],
        ]);

 

        $currency
            ->fill([
                'name' => $request->input('currency.name')
            ])
            ->save();


        Toast::info(__('Currency was saved.'));

        return redirect()->route('currencies');
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Currency::findOrFail($request->get('id'))->delete();

        Toast::info(__('Currency was removed'));
    }

}
