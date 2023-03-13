<?php

namespace App\Orchid\Screens\Product;

use App\Models\Color;
use App\Orchid\Layouts\Product\ColorEditLayout;
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


class ColorEditScreen extends Screen
{
    public $color;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Color $color): iterable
    {
        return [
            'color'  => $color,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->color->exists ? 'Edit Color' : 'Create Color';
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
                ->confirm(__('Are you sure you want to remove this color.'))
                ->method('remove')
                ->canSee($this->color->exists),

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
            Layout::block(ColorEditLayout::class)
                ->title(__('Color Information'))
                ->description(__('Update color Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(ColorAlias::DEFAULT())
                        ->icon('check')
                        ->canSee($this->color->exists)
                        ->method('save')
                ),
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
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Color $color)
    {
        $color->delete();

        Toast::info(__('Color was removed'));

        return redirect()->route('colors');
    }
}
