<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Orchid\Layouts\Category\CategoryEditLayout;
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

class CategoryEditScreen extends Screen
{
    public $category;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Category $category): iterable
    {
        return [
            'category'  => $category,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'Edit Category' : 'Create Category';
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
                ->confirm(__('Are you sure you want to remove this category.'))
                ->method('remove')
                ->canSee($this->category->exists),

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
            Layout::block(CategoryEditLayout::class)
                ->title(__('Category Information'))
                ->description(__('Update category Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->category->exists)
                        ->method('save')
                ),
        ];
    }

    public function save(Category $category, Request $request)
    {
        $request->validate([
            'category.name' => [
                'required'
            ],
        ]);

        // dd($request);

        $file = $request->file('category.icon');

        $url = $file->store('categories', ['disk' => 'public']);

        $category
            ->fill([
                'name' => $request->input('category.name'),
                'icon' => $url,
            ])
            ->save();


        Toast::info(__('Category was saved.'));

        return redirect()->route('categories');
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Category $category)
    {
        $category->delete();

        Toast::info(__('Category was removed'));

        return redirect()->route('categories');
    }
}
