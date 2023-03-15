<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Models\User;
use App\Orchid\Layouts\Category\CategoryEditLayout;
use App\Orchid\Layouts\Category\CategoryFiltersLayout;
use App\Orchid\Layouts\Category\CategoryListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class CategoryListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => Category::defaultSort('created_at', 'desc')
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
        return 'Category';
    }

    public function description(): ?string
    {
        return 'All categories';
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
                ->route('categories.create'),
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
            CategoryListLayout::class,
            // Layout::modal('asyncEditUserModal', CategoryEditLayout::class)
            //     ->async('asyncGetCategory'),
        ];
    }
    public function asyncGetCategory(Category $category): iterable
    {
        return [
            'category' => $category,
        ];
    }

    public function save(Category $category, Request $request)
    {
        $request->validate([
            'category.name' => [
                'required'
            ],
        ]);

        // dd($request->input('category.icon'));
        //upload image
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
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Category::findOrFail($request->get('id'))->delete();

        Toast::info(__('Category was removed'));
    }

    public static function perPage(): int
    {
        return 5;
    }
}
