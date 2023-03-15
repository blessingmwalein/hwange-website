<?php

namespace App\Orchid\Screens\Product;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Color;
use App\Models\Specifications;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use App\Models\ProductSpecification;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Modal;
use Orchid\Support\Facades\Toast;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class SingleProductScreen extends Screen
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
        return $this->product->name;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            ModalToggle::make('Upload Images')
                ->modal('uploadImageModal')
                ->method('uploadImages')
                ->icon('cloud-upload'),
            ModalToggle::make('Price')
                ->modal('addPriceModal')
                ->method('addPrice')
                ->icon('plus'),
            ModalToggle::make('Color')
                ->modal('addColorModal')
                ->method('addColors')
                ->icon('plus'),
            ModalToggle::make('Specification')
                ->modal('addSpecificationModal')
                ->method('addSpecifications')
                ->icon('plus'),

            ModalToggle::make('Edit')
                ->modal('exampleModal')
                ->method('editProduct')
                ->icon('pencil')
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
            Layout::tabs([
                'Product Information' => Layout::legend('product', [
                    Sight::make('id')->popover('Identifier, a symbol which uniquely identifies an object or record'),
                    Sight::make('name'),
                    Sight::make('quantity'),
                    Sight::make('description'),
                    Sight::make('banner_text'),
                    Sight::make('created_at', 'Created'),
                    Sight::make('updated_at', 'Updated'),
                ]),
                'Images' => Layout::table('product.images', [
                    TD::make('id', __('ID'))
                        ->sort()
                        ->cantHide()
                        ->filter(Input::make())
                        ->render(
                            function (ProductImage $image) {
                                return "<img src='/storage/{$image->image}'
                alt='sample'
                class='mw-100 d-block img-fluid rounded-1' width='50'>";
                            }
                        ),
                    TD::make('created_at', __('Created At'))
                        ->sort()

                        ->render(fn (ProductImage $image) => $image->updated_at->toDateTimeString()),

                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (ProductImage $image) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this image.'))
                                    ->method('removeImage', [
                                        'id' => $image->id,
                                    ]),
                            ])),
                ]),
                'Specifications' => Layout::table('product.specifications', [
                    TD::make('name', 'Name')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (ProductSpecification $spec) => Str::limit($spec->specification->name, 200)),

                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (ProductSpecification $spec) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this specification.'))
                                    ->method('removeSpecification', [
                                        'id' => $spec->id,
                                    ]),
                            ])),
                ]),
                'Colors' => Layout::table('product.colors', [
                    TD::make('name', 'Name')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (ProductColor $color) => Str::limit($color->color->name, 200)),

                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (ProductColor $color) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this color.'))
                                    ->method('removeColor', [
                                        'id' => $color->id,
                                    ]),
                            ])),
                ]),
                'Prices' => Layout::table('product.prices', [
                    TD::make('currency', 'Currency')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (ProductPrice $price) => Str::limit($price->currency->name, 200)),
                    TD::make('price', 'Price')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (ProductPrice $price) => $price->currency->code . Str::limit($price->price, 200)),

                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (ProductPrice $price) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                ModalToggle::make('Edit')
                                    ->modal('editPriceModal')
                                    ->icon('pencil')
                                    ->method('editPrice')
                                    ->asyncParameters(
                                        [
                                            'price' => $price->id,
                                        ]
                                    ),
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this price.'))
                                    ->method('removePrice', [
                                        'id' => $price->id,
                                    ]),
                            ])),
                ]),
            ]),
            Layout::modal('exampleModal', [
                Layout::rows([
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
                        ->value(false)
                        ->sendTrueOrFalse()
                        ->title('Is On Promotion'),

                    Select::make('product.category_id')
                        ->fromModel(Category::class, 'name', 'id')
                        ->empty('No select'),
                    // Select::make('product.colors.')
                    //     ->fromModel(Color::class, 'name', 'id')
                    //     ->multiple()
                    //     ->title('Product Colors'),

                    // Select::make('product.specifications.')
                    //     ->fromModel(Specifications::class, 'name', 'id')
                    //     ->multiple()
                    //     ->title('Product Specifications'),
                    TextArea::make('product.description')
                        ->required()
                        ->title(__('Description'))
                        ->rows(3),

                    TextArea::make('product.banner_text')
                        ->title(__('Baner Text'))
                        ->rows(3)

                ]),
            ])->title('Edit Product'),
            Layout::modal('uploadImageModal', [
                Layout::rows([
                    Input::make('images')
                        ->type('file')
                        ->title('Product Images')
                        ->multiple()
                        ->horizontal(),
                ]),
            ])->title('Upload Images'),

            Layout::modal('addPriceModal', [
                Layout::rows([
                    Group::make([
                        Select::make('currency_id')
                            ->fromModel(Currency::class, 'name', 'id')
                            ->title('Currency 1')
                            ->empty('No select'),

                        Input::make('price')
                            ->type('number')
                            ->title('Price 1')
                            ->placeholder(__('000'))
                    ]),

                ]),
            ])->title('Add Price'),

            Layout::modal('editPriceModal', [
                Layout::rows([
                    Group::make([
                        Select::make('price.currency_id')
                            ->fromModel(Currency::class, 'name', 'id')
                            ->title('Currency')
                            ->empty('No select'),

                        Input::make('price.price')
                            ->type('number')
                            ->title('Price')
                            ->placeholder(__('000'))
                    ]),
                ]),
            ])->title('Edit Price')
                ->async('asyncGetData'),

            Layout::modal('addColorModal', [
                Layout::rows([
                    Select::make('colors.')
                        ->fromModel(Color::class, 'name', 'id')
                        ->multiple()
                        ->title('Product Colors'),
                ]),

            ])->title('Add Color'),
            Layout::modal('addSpecificationModal', [
                Layout::rows([
                    Select::make('specifications.')
                        ->fromModel(Specifications::class, 'name', 'id')
                        ->multiple()
                        ->title('Product Specifications'),
                ]),
            ])->title('Add Specification'),
        ];
    }

    public function editProduct(Product $product, Request $request)
    {
        $product->update([
            'name' => $request->input('product.name'),
            'quantity' => $request->input('product.quantity'),
            'isOnPromotion' => $request->input('product.isOnPromotion'),
            'category_id' => $request->input('product.category_id'),
            'description' => $request->input('product.description'),
            'banner_text' => $request->input('product.banner_text'),
        ]);

        $product->colors()->delete();
        $product->specifications()->delete();

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
        Toast::info(__('Product was updated'));
    }
    public function uploadImages(Product $product, Request $request)
    {
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
        Toast::info(__('Images was uploaded'));
    }
    public function addColors(Product $product, Request $request)
    {

        //check if color already exists

        if ($request->input('colors') != null) {
            $colors = $request->input('colors');

            foreach ($colors as $key => $color_id) {
                $color = ProductColor::where('product_id', $product->id)
                    ->where('color_id', $color_id)
                    ->first();
                if ($color == null) {
                    ProductColor::create([
                        'product_id' => $product->id,
                        'color_id' => $color_id
                    ]);
                }
            }
        }

        Toast::info(__('Colors was uploaded'));
    }
    public function addPrice(Product $product, Request $request)
    {

        $request->validate([
            'currency_id' => 'required',
            'price' => 'required',
        ]);

        $checkPrice = ProductPrice::where('product_id', $product->id)
            ->where('currency_id', $request->input('currency_id'))
            ->first();
        if ($checkPrice == null) {
            ProductPrice::create([
                'product_id' => $product->id,
                'currency_id' => $request->input('currency_id'),
                'price' => $request->input('price'),
            ]);
            Toast::info(__('Price was created'));
        } else {
            $checkPrice->update([
                'price' => $request->input('price'),
            ]);
            Toast::info(__('Price was updated'));
        }
    }
    public function addSpecifications(Product $product, Request $request)
    {

        //check if color already exists
        if ($request->input('specifications') != null) {
            $specifications = $request->input('specifications');
            foreach ($specifications as $key => $specification_id) {
                $specification = ProductSpecification::where('product_id', $product->id)
                    ->where('specification_id', $specification_id)
                    ->first();
                if ($specification == null) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'specification_id' => $specification_id
                    ]);
                }
            }
        }

        Toast::info(__('Specifications was uploaded'));
    }

    // public function removeProduct(Request $request)
    // {
    //     $product = Product::find($request->get('id'));
    //     $image->delete();
    //     Toast::info(__('Image was deleted'));
    // }

    public function removeColor(Request $request)
    {
        $color = ProductColor::find($request->get('id'));
        $color->delete();
        Toast::info(__('Color was deleted'));
    }

    public function editPrice(Request $request, ProductPrice $price)
    {
        $foundPrice = ProductPrice::find($request->get('price'));

        // dd($foundPrice);
        $foundPrice->update([
            'price' => $request->input('price.price'),
            'currency_id' => $request->input('price.currency_id'),
        ]);
        Toast::info(__('Price was updated'));
    }

    public function removePrice(Request $request)
    {
        $price = ProductPrice::find($request->get('id'));
        $price->delete();
        Toast::info(__('Price was deleted'));
    }

    public function removeSpecification(Request $request)
    {
        $spec = ProductSpecification::find($request->get('id'));
        $spec->delete();
        Toast::info(__('Specification was deleted'));
    }

    public function removeImage(Request $request)
    {
        $productImage = ProductImage::find($request->get('id'));
        $productImage->delete();
        Toast::info(__('Image was deleted'));
    }

    public function asyncGetData(ProductPrice $productPrice): array
    {
        return [
            'price' => $productPrice,
        ];
    }
}
