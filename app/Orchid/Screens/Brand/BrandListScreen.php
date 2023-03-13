<?php

namespace App\Orchid\Screens\Brand;

use App\Models\Brand;
use App\Models\User;
use App\Orchid\Layouts\Brand\BrandListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class BrandListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'brands' => Brand::defaultSort('created_at', 'desc')
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
        return 'Brand';
    }

    public function description(): ?string
    {
        return 'All brands';
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
                ->route('brands.create'),
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
            BrandListLayout::class,
            // Layout::modal('asyncEditUserModal', CategoryEditLayout::class)
            //     ->async('asyncGetCategory'),
        ];
    }
    public function asyncGetBrand(Brand $brand): iterable
    {
        return [
            'brand' => $brand,
        ];
    }

    public function save(Brand $brand, Request $request)
    {
        $request->validate([
            'brand.name' => [
                'required'
            ],
        ]);

        $file = $request->file('barnd.icon');

        $url = $file->store('brands', ['disk' => 'public']);

        $brand
            ->fill([
                'name' => $request->input('brand.name'),
                'icon' =>$url,
            ])
            ->save();


        Toast::info(__('Brand was saved.'));

        return redirect()->route('brands');
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Brand::findOrFail($request->get('id'))->delete();

        Toast::info(__('Brand was removed'));
    }

}
