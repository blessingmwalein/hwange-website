<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Models\User;
use App\Orchid\Layouts\Order\OrderListLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class OrderListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders' => Order::defaultSort('created_at', 'desc')
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
        return 'Order';
    }

    public function description(): ?string
    {
        return 'All orders';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            Link::make(__('Create New Order'))
                ->icon('plus')
                ->route('orders.create'),
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
            OrderListLayout::class
        ];
    }
    public function asyncGetBrand(Order $order): iterable
    {
        return [
            'order' => $order,
        ];
    }

    public function save(Order $order, Request $request)
    {
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        $order =  Order::findOrFail($request->get('id'));

        $order->items()->delete();

        $order->delete();

        Toast::info(__('Order was removed'));
    }
}
