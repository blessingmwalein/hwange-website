<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Illuminate\Support\Str;

class OrderListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'orders';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('user', __('Client'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Order $order) => new Persona($order->user->presenter())),

            TD::make('email', 'Email')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Order $order) => Str::limit($order->user->email, 200)),
            TD::make('status', 'Status')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Order $order) => Str::limit($order->status, 200)),
            TD::make('total', 'Total')
                ->sort()
                ->filter(Input::make())
                ->render(fn (Order $order) =>$order->currency->code. Str::limit($order->total, 200)),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Order $order) => $order->updated_at->toDateTimeString()),
            TD::make('created_at', __('Created at'))
                ->sort()
                ->render(fn (Order $order) => $order->created_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Order $order) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('View'))
                            ->route('orders.show', $order->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $order->id,
                            ]),
                    ])),
        ];
    }
}
