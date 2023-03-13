<?php

namespace App\Orchid\Screens\Product;

use App\Models\Specifications;
use App\Orchid\Layouts\Product\SpecificationEditLayout;
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


class SpecificationEditScreen extends Screen
{
    public $specification;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Specifications $specification): iterable
    {
        return [
            'specification'  => $specification,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->specification->exists ? 'Edit Specifications' : 'Create Specifications';
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
                ->confirm(__('Are you sure you want to remove this specification.'))
                ->method('remove')
                ->canSee($this->specification->exists),

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
            Layout::block(SpecificationEditLayout::class)
                ->title(__('Specifications Information'))
                ->description(__('Update specification Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(ColorAlias::DEFAULT())
                        ->icon('check')
                        ->canSee($this->specification->exists)
                        ->method('save')
                ),
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
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Specifications $specification)
    {
        $specification->delete();

        Toast::info(__('Specifications was removed'));

        return redirect()->route('specifications');
    }
}
