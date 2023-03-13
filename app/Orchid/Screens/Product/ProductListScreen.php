<?php

namespace App\Orchid\Screens\Product;

use App\Models\Product;
use App\Models\User;
use App\Orchid\Layouts\Product\ProductListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;
use Termwind\Components\Dd;

class ProductListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'products' => Product::defaultSort('created_at', 'desc')
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
        return 'Product';
    }

    public function description(): ?string
    {
        return 'All products';
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
                ->route('products.create'),
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
            ProductListLayout::class,
            // Layout::modal('asyncEditUserModal', CategoryEditLayout::class)
            //     ->async('asyncGetCategory'),
        ];
    }
    public function asyncGetBrand(Product $product): iterable
    {
        return [
            'product' => $product,
        ];
    }

    public function save(Product $product, Request $request)
    {
        $request->validate([
            'product.name' => 'required',
            'product.quantity' => 'required',
            'product.isOnPromotion' => 'required',
            'product.category_id' => 'required',
            'product.banner_text' => 'required',
        ]);

        dd($request);

        $product
            ->fill([
                'name' => $request->get('product.name'),
                'quantity' => $request->get('product.quantity'),
                'isOnPromotion' => $request->get('product.isOnPromotion'),
                'category_id' => $request->get('product.category_id'),
                'banner_text' => $request->get('product.banner_text'),
                'description' => $request->get('product.description'),
            ])
            ->save();

            

        Toast::info(__('Product was saved.'));

        return redirect()->route('products');
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Product::findOrFail($request->get('id'))->delete();

        Toast::info(__('Product was removed'));
    }
}
