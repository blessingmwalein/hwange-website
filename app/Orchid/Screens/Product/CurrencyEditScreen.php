<?php

namespace App\Orchid\Screens\Product;

use App\Models\Currency;
use App\Orchid\Layouts\Product\CurrencyEditLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Access\Impersonation;
use Orchid\Attachment\File;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Color as ColorAlias;


class CurrencyEditScreen extends Screen
{
    public $currency;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Currency $currency): iterable
    {
        return [
            'currency'  => $currency,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->currency->exists ? 'Edit Currency' : 'Create Currency';
    }


    public function description(): ?string
    {
        return 'Details such as name, icon';
    }
    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Are you sure you want to remove this currency.'))
                ->method('remove')
                ->canSee($this->currency->exists),

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
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
            Layout::block(CurrencyEditLayout::class)
                ->title(__('Currency Information'))
                ->description(__('Update currency Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(ColorAlias::DEFAULT())
                        ->icon('check')
                        ->canSee($this->currency->exists)
                        ->method('save')
                ),
        ];
    }

    public function save(Currency $currency, Request $request)
    {
        $request->validate([
            'currency.name' => 'required',
            'currency.code' => 'required',
            'currency.symbol' => 'required'

        ]);


        $currency
            ->fill([
                'name' => $request->input('currency.name'),
                'code' => $request->input('currency.code'),
                'symbol' => $request->input('currency.symbol'),
            ])
            ->save();


        Toast::info(__('Currency was saved.'));

        return redirect()->route('currencies');
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Currency $currency)
    {
        $currency->delete();

        Toast::info(__('Currency was removed'));

        return redirect()->route('currencies');
    }
}
