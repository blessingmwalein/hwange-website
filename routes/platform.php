<?php

declare(strict_types=1);

use App\Orchid\Screens\Brand\BrandEditScreen;
use App\Orchid\Screens\Brand\BrandListScreen;
use App\Orchid\Screens\BrandScreen;
use App\Orchid\Screens\Category\CategoryEditScreen;
use App\Orchid\Screens\Category\CategoryListScreen;
use App\Orchid\Screens\CategoryScreen;
use App\Orchid\Screens\DashboardScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\Order\OrderEditSCreen;
use App\Orchid\Screens\Order\OrderListScreen;
use App\Orchid\Screens\Order\OrderSingleScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Product\ColorEditScreen;
use App\Orchid\Screens\Product\ColorListScreen;
use App\Orchid\Screens\Product\CurrencyEditScreen;
use App\Orchid\Screens\Product\CurrencyListScreen;
use App\Orchid\Screens\Product\ProductEditScreen;
use App\Orchid\Screens\Product\ProductListScreen;
use App\Orchid\Screens\Product\SingleProductScreen;
use App\Orchid\Screens\Product\SpecificationEditScreen;
use App\Orchid\Screens\Product\SpecificationListScreen;
use App\Orchid\Screens\ProductScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\SettingsScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', DashboardScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example screen'));

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');


Route::screen('dashboard', DashboardScreen::class, 'dashboard')
    ->name('platform.dashboard');


Route::screen('categories', CategoryListScreen::class)
    ->name('categories')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Categories'), route('categories')));

Route::screen('categories/{category}/edit', CategoryEditScreen::class)
    ->name('categories.edit')
    ->breadcrumbs(fn (Trail $trail, $category) => $trail
        ->parent('categories')
        ->push($category->name, route('categories.edit', $category)));

Route::screen('categories/create', CategoryEditScreen::class)
    ->name('categories.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('categories')
        ->push(__('Create'), route('categories.create')));

Route::screen('products', ProductListScreen::class)
    ->name('products')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('products'), route('products')));

Route::screen('products/{product}/edit', ProductEditScreen::class)
    ->name('products.edit')
    ->breadcrumbs(fn (Trail $trail, $product) => $trail
        ->parent('products')
        ->push($product->name, route('products.edit', $product)));

Route::screen('products/{product}/show', SingleProductScreen::class)
    ->name('products.show')
    ->breadcrumbs(fn (Trail $trail, $product) => $trail
        ->parent('products')
        ->push($product->name, route('products.show', $product)));

Route::screen('products/create', ProductEditScreen::class)
    ->name('products.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('products')
        ->push(__('Create'), route('products.create')));


Route::screen('brands', BrandListScreen::class)
    ->name('brands')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('brands'), route('brands')));

Route::screen('brands/{brand}/edit', BrandEditScreen::class)
    ->name('brands.edit')
    ->breadcrumbs(fn (Trail $trail, $brand) => $trail
        ->parent('brands')
        ->push($brand->name, route('brands.edit', $brand)));

Route::screen('brands/create', BrandEditScreen::class)
    ->name('brands.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('brands')
        ->push(__('Create'), route('brands.create')));


Route::screen('colors', ColorListScreen::class)
    ->name('colors')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('colors'), route('colors')));

Route::screen('colors/{color}/edit', ColorEditScreen::class)
    ->name('colors.edit')
    ->breadcrumbs(fn (Trail $trail, $color) => $trail
        ->parent('colors')
        ->push($color->name, route('colors.edit', $color)));

Route::screen('colors/create', ColorEditScreen::class)
    ->name('colors.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('colors')
        ->push(__('Create'), route('colors.create')));

Route::screen('specifications', SpecificationListScreen::class)
    ->name('specifications')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('specifications'), route('specifications')));

Route::screen('specifications/{specification}/edit', SpecificationEditScreen::class)
    ->name('specifications.edit')
    ->breadcrumbs(fn (Trail $trail, $specification) => $trail
        ->parent('specifications')
        ->push($specification->name, route('specifications.edit', $specification)));

Route::screen('specifications/create', SpecificationEditScreen::class)
    ->name('specifications.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('specifications')
        ->push(__('Create'), route('specifications.create')));

//currency
Route::screen('currencies', CurrencyListScreen::class)
    ->name('currencies')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('currencies'), route('currencies')));

Route::screen('currencies/{currency}/edit', CurrencyEditScreen::class)
    ->name('currencies.edit')
    ->breadcrumbs(fn (Trail $trail, $currency) => $trail
        ->parent('currencies')
        ->push($currency->name, route('currencies.edit', $currency)));

Route::screen('currencies/create', CurrencyEditScreen::class)
    ->name('currencies.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('currencies')
        ->push(__('Create'), route('currencies.create')));


Route::screen('orders', OrderListScreen::class)
    ->name('orders')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('orders'), route('orders')));

Route::screen('orders/{order}/edit', OrderEditSCreen::class)
    ->name('orders.edit')
    ->breadcrumbs(fn (Trail $trail, $order) => $trail
        ->parent('orders')
        ->push($order->id, route('orders.edit', $order)));

Route::screen('orders/create', OrderEditSCreen::class)
    ->name('orders.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('orders')
        ->push(__('Create'), route('orders.create')));

Route::screen('orders/{order}/show', OrderSingleScreen::class)
    ->name('orders.show')
    ->breadcrumbs(fn (Trail $trail, $order) => $trail
        ->parent('orders')
        ->push($order->id, route('orders.show', $order)));


Route::screen('settings', SettingsScreen::class)
    ->name('settings')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('settings'), route('settings')));
