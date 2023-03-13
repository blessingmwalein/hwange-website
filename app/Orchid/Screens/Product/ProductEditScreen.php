<?php

namespace App\Orchid\Screens\Product;

use App\Models\Product;
use App\Orchid\Layouts\Product\ProductEditLayout;
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


class ProductEditScreen extends Screen
{
    public $product;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Product $product): iterable
    {
        return [
            'product'  => $product,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->product->exists ? 'Edit Product' : 'Create Product';
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
                ->confirm(__('Are you sure you want to remove this product.'))
                ->method('remove')
                ->canSee($this->product->exists),

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
            Layout::block(ProductEditLayout::class)
                ->title(__('Product Information'))
                ->description(__('Update product Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(ColorAlias::DEFAULT())
                        ->icon('check')
                        ->canSee($this->product->exists)
                        ->method('save')
                ),

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
            'product.description' => 'required',

        ]);

        dd($request->get('product'));
        $newProduct = $product
            ->fill([
                'name' => $request->get('product.name'),
                'quantity' => $request->get('product.quantity'),
                'isOnPromotion' => $request->get('product.isOnPromotion'),
                'category_id' => $request->get('product.category_id'),
                'banner_text' => $request->get('product.banner_text'),
                'description' => $request->get('product.description'),
            ])
            ->save();

        $product->colors()->sync($request->get('product.colors'));
        $product->specifications()->sync($request->get('product.specifications'));


        Toast::info(__('Product was saved.'));

        return redirect()->route('products');
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Product $product)
    {
        $product->delete();

        Toast::info(__('Product was removed'));

        return redirect()->route('products');
    }
}
