<?php

namespace App\Orchid\Screens\Product;

use App\Models\Color;
use App\Models\User;
use App\Orchid\Layouts\Product\ColorListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class ColorListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'colors' => Color::defaultSort('created_at', 'desc')
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
        return 'Color';
    }

    public function description(): ?string
    {
        return 'All colors';
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
                ->route('colors.create'),
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
            ColorListLayout::class,
            // Layout::modal('asyncEditUserModal', CategoryEditLayout::class)
            //     ->async('asyncGetCategory'),
        ];
    }
    public function asyncGetBrand(Color $color): iterable
    {
        return [
            'color' => $color,
        ];
    }

    public function save(Color $color, Request $request)
    {
        $request->validate([
            'color.name' => [
                'required'
            ],
        ]);

 

        $color
            ->fill([
                'name' => $request->input('color.name')
            ])
            ->save();


        Toast::info(__('Color was saved.'));

        return redirect()->route('colors');
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Color::findOrFail($request->get('id'))->delete();

        Toast::info(__('Color was removed'));
    }

}
