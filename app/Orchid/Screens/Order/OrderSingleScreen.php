<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Models\OrderItems;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Modal;
use Orchid\Support\Facades\Toast;
use SebastianBergmann\CodeCoverage\Driver\Selector;


class OrderSingleScreen extends Screen
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
        return $this->order->id;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            ModalToggle::make('Update Status')
                ->modal('updateDateStatusModal')
                ->method('updateOrderStatus')
                ->icon('pencil'),

            Button::make(__('Cancel Order'))
                ->icon('close')
                ->confirm(__('Are you sure you want to cancel this order.'))
                ->method('cancel', [
                    'id' => $this->order->id,
                ]),
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
            Layout::tabs([
                'Order Information' => Layout::legend('order', [
                    Sight::make('id')->popover('Identifier, a symbol which uniquely identifies an object or record'),
                    Sight::make('total'),
                    Sight::make('status'),
                    Sight::make('Currency')->render(fn (Order $order) => $order->currency->name),
                    Sight::make('order_notes'),
                    Sight::make('created_at', 'Created'),
                    Sight::make('updated_at', 'Updated'),
                ]),
                'Order Items' => Layout::table('order.items', [
                    TD::make('id', __('ID'))
                        ->sort()
                        ->cantHide()
                        ->filter(Input::make())
                        ->render(
                            function (OrderItems $item) {
                                return "<img src='/storage/{$item->product->images[0]->image}'
                alt='sample'
                class='mw-100 d-block img-fluid rounded-1' width='50'>";
                            }
                        ),
                    TD::make('quantity', __('Quantity'))
                        ->sort()
                        ->render(fn (OrderItems $item) => $item->quantity),
                    TD::make('color', __('Color'))
                        ->sort()
                        ->render(fn (OrderItems $item) => $item->color),

                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (OrderItems $item) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this item.'))
                                    ->method('removeImage', [
                                        'id' => $item->id,
                                    ]),
                            ])),
                ]),

                'Customer Information' => Layout::legend('order.user', [
                    Sight::make('name'),
                    Sight::make('email'),
                    // Sight::make('Address')->render(fn (Order $order) => $order->customerDetails?->address),
                    // Sight::make('Phone Number')->render(fn (Order $order) => $order->customerDetails->phone_number),
                    // Sight::make('City')->render(fn (Order $order) => $order->customerDetails->city),
                    // Sight::make('Company')->render(fn (Order $order) => $order->customerDetails->company),
                    Sight::make('created_at', 'Created'),
                    Sight::make('updated_at', 'Updated'),
                ]),

            ]),
            Layout::modal('updateDateStatusModal', [
                Layout::rows([
                    Select::make('order.status')
                        ->options([
                            'pending' => 'Pending',
                            'processing' => 'Processing',
                            'completed' => 'Completed',
                            'cancelled' => 'Cancelled',
                        ])
                        ->title('Status')
                        ->empty('No select'),
                ]),
            ])->title('Edit Status'),

        ];
    }

    public function updateOrderStatus(Order $order, Request $request)
    {
        $order->update([
            'status' => $request->get('order')['status'],
        ]);
        Toast::info('Order status updated');
    }
    public function cancel(Order $order, Request $request)
    {
        $order->update([
            'status' => 'cancelled',
        ]);
        Toast::info('Order status cancelled');
    }
}
