<?php

namespace App\Orchid\Screens\Product;

use App\Models\Specifications;
use App\Models\User;
use App\Orchid\Layouts\Product\ColorListLayout;
use App\Orchid\Layouts\Product\CurrencyListLayout;
use App\Orchid\Layouts\Product\SpecificationListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class SpecificationListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'specifications' => Specifications::defaultSort('created_at', 'desc')
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
        return 'Specifications';
    }

    public function description(): ?string
    {
        return 'All specifications';
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
                ->route('specifications.create'),
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
            SpecificationListLayout::class,
            // Layout::modal('asyncEditUserModal', CategoryEditLayout::class)
            //     ->async('asyncGetCategory'),
        ];
    }
    public function asyncGetCurrency(Specifications $specification): iterable
    {
        return [
            'specification' => $specification,
        ];
    }

    public function save(Specifications $specification, Request $request)
    {
        $request->validate([
            'specification.name' => [
                'required'
            ],
        ]);

 

        $specification
            ->fill([
                'name' => $request->input('specification.name')
            ])
            ->save();


        Toast::info(__('Specifications was saved.'));

        return redirect()->route('specifications');
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Specifications::findOrFail($request->get('id'))->delete();

        Toast::info(__('Specifications was removed'));
    }

}
