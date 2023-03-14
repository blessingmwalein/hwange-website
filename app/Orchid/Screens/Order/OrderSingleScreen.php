<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;

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
                ->modal('addSpecificationModal')
                ->method('addSpecifications')
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
        return [];
    }
}
