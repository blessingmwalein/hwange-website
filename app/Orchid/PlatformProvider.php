<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Dashboard')
                ->icon('grid')
                ->route('platform.dashboard')
                ->title('Navigation'),
            Menu::make('Category')
                ->icon('database')
                ->list([
                    Menu::make('All')->route('categories')->icon('list'),
                    Menu::make('Create')->route('categories.create')->icon('plus'),
                ]),


            Menu::make('Products')
                ->icon('handbag')
                ->list([
                    Menu::make('All')->route('products')->icon('list'),
                    Menu::make('Create')->route('products.create')->icon('plus'),
                ]),
            Menu::make('Brands')
                ->icon('bag')
                ->list([
                    Menu::make('All')->route('brands')->icon('list'),
                    Menu::make('Create')->route('brands.create')->icon('plus'),
                ]),

          
            // Menu::make('Cards')
            //     ->icon('grid')
            //     ->route('platform.example.cards')
            //     ->divider(),


            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
