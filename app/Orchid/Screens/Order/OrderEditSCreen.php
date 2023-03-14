<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Models\OrderItems;
use App\Orchid\Layouts\Order\OrderEditLayout;
use Orchid\Screen\Screen;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Access\Impersonation;
use Orchid\Attachment\File;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Color as ColorAlias;
use Termwind\Components\Dd;


class OrderEditSCreen extends Screen
{
    public $order;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Order $order): iterable
    {
        return [
            'order'  => $order,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->order->exists ? 'Edit Order' : 'Create Order';
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
                ->confirm(__('Are you sure you want to remove this order.'))
                ->method('remove')
                ->canSee($this->order->exists),

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
            Layout::block(OrderEditLayout::class)
                ->title(__('Order Information'))
                ->description(__('Update order Infomation.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(ColorAlias::DEFAULT())
                        ->icon('check')
                        ->canSee($this->order->exists)
                        ->method('save')
                ),

        ];
    }

    public function save(Order $order, Request $request)
    {
        $request->validate([
            'order.quantity' => 'required',
            'order.product_id' => 'required',
            'order.status' => 'required',
            'order.total' => 'required',
            'order.currency_id' => 'required',
            'order.user_id' => 'required',
            'order.color'=> 'required',
        ]);

        $newOrder = $order
            ->fill([
                'total' => $request->input('order.total'),
                'user_id' => $request->input('order.user_id'),
                'status' => $request->input('order.status'),
                'order_notes' => $request->input('order.order_notes'),
                'currency_id' => $request->input('order.currency_id'),
            ])
            ->save();

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $request->input('order.product_id'),
                'quantity' => $request->input('order.quantity'),
                'color' => $request->input('order.color'),
            ]);
        
        Toast::info(__('Order was saved.'));

        return redirect()->route('orders');
    }
}
