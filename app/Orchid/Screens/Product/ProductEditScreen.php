<?php

namespace App\Orchid\Screens\Product;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use App\Models\ProductSpecification;
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
use Termwind\Components\Dd;

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
            'product.category_id' => 'required',
            'product.description' => 'required',
        ]);

        $newProduct = $product
            ->fill([
                'name' => $request->input('product.name'),
                'quantity' => $request->input('product.quantity'),
                'isOnPromotion' => $request->input('product.isOnPromotion'),
                'category_id' => $request->input('product.category_id'),
                'brand_id' => $request->input('product.brand_id'),
                'banner_text' => $request->input('product.banner_text'),
                'description' => $request->input('product.description'),
            ])
            ->save();

        if ($request->input('product.colors') != null) {
            $colors = $request->input('product.colors');
            foreach ($colors as $key => $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color
                ]);
            }
        }

        if ($request->input('product.specifications') != null) {
            $specifications = $request->input('product.specifications');
            foreach ($specifications as $key => $specification) {
                ProductSpecification::create([
                    'product_id' => $product->id,
                    'specification_id' => $specification
                ]);
            }
        }

        for($i = 0; $i < 4; $i++){
            if ($request->input('product.Currency'.$i) != null) {
                ProductPrice::create([
                    'product_id' => $product->id,
                    'currency_id' => $request->input('product.Currency'.$i),
                    'price' => $request->input('product.Price'.$i),
                ]);
            }

        }
     

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $file->store('products',  ['disk' => 'public']),
                    'is_main' => '0',
                ]);
            }
        }

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
