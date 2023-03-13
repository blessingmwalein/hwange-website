<?php

namespace App\Orchid\Screens\Brand;

use App\Models\Brand;
use App\Orchid\Layouts\Brand\BrandEditLayout;
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
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BrandEditScreen extends Screen
{
    public $brand;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Brand $brand): iterable
    {
        return [
            'brand'  => $brand,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->brand->exists ? 'Edit Brand' : 'Create Brand';
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
                ->confirm(__('Are you sure you want to remove this brand.'))
                ->method('remove')
                ->canSee($this->brand->exists),

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
            Layout::block(BrandEditLayout::class)
                ->title(__('Brand Information'))
                ->description(__('Update brand Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->brand->exists)
                        ->method('save')
                ),
        ];
    }

    public function save(Brand $brand, Request $request)
    {
        $request->validate([
            'brand.name' => [
                'required'
            ],
        ]);

        // dd($request);

        $file = $request->file('brand.icon');

        $url = $file->store('brands', ['disk' => 'public']);

        $brand
            ->fill([
                'name' => $request->input('brand.name'),
                'icon' => $url,
            ])
            ->save();


        Toast::info(__('Brand was saved.'));

        return redirect()->route('brands');
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Brand $brand)
    {
        $brand->delete();

        Toast::info(__('Brand was removed'));

        return redirect()->route('brands');
    }
}
