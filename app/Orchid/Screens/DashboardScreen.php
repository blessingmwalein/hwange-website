<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use App\Orchid\Layouts\Examples\ChartBarExample;
use App\Orchid\Layouts\Examples\ChartLineExample;
use Carbon\Carbon;
use Termwind\Components\Dd;

class DashboardScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public const TEXT_EXAMPLE = 'Lorem ipsum at sed ad fusce faucibus primis, potenti inceptos ad taciti nisi tristique
    urna etiam, primis ut lacus habitasse malesuada ut. Lectus aptent malesuada mattis ut etiam fusce nec sed viverra,
    semper mattis viverra malesuada quam metus vulputate torquent magna, lobortis nec nostra nibh sollicitudin
    erat in luctus.';

    public function query(): iterable
    {
        //get paid orders total for that month 
        $paidOrders = Order::where('status', 'paid')->whereMonth('created_at', Carbon::now()->month)->sum('total');

       
        //get pending orders total for that month
        $pendingOrders = Order::where('status', 'pending')->whereMonth('created_at', Carbon::now()->month)->sum('total');

        //get % increase or decrease in paid orders from previous month
        $paidOrdersPercentage = Order::where('status', 'paid')->whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('total');

        //get % increase or decrease in pending orders from previous month
        $pendingOrdersPercentage = Order::where('status', 'pending')->whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('total');
      

        //get total paid orders
        $totalPaidOrders = Order::where('status', 'paid')->sum('total');

        //get new clients for that month
        $newClients = User::whereMonth('created_at', Carbon::now()->month)->count();

        //get perce
        //get monthly sales totals 12 months in array pluck the total column  map the array to get the month name
        $monthlySales = Order::where('status', 'paid')->whereYear('created_at', Carbon::now()->year)->get()->map(function ($total) {
            return [
                'total' => $total->total,
                'month' => Carbon::parse($total->created_at)->format('M'),
            ];
        });
        $monthlyOrders = Order::where('status', 'pending')->whereYear('created_at', Carbon::now()->year)->get()->map(function ($total) {
            return [
                'total' => $total->total,
                'month' => Carbon::parse($total->created_at)->format('M'),
            ];
        });

        //get most sold products for last 12 months
        $mostSoldProducts = OrderItems::whereYear('created_at', Carbon::now()->year)->get()->map(function ($order_item) {
            return [
                'total' => $order_item->quantity * $order_item->product->getMainPrice()->price,
                'name' => $order_item->product->name,
            ];
        });
        $mostSoldProductsMon = OrderItems::whereYear('created_at', Carbon::now()->year)->get()->pluck('product.name')->map(function ($name) {
            //return first word of product name
            return explode(' ', $name)[0];
        });
        


        $monthNames = collect(range(1, 12))->map(function ($month) {
            return Carbon::now()->subMonths(12 - $month)->format('M');
        });


        $sales = [];
        foreach ($monthNames as $month) {
            $sales[] = $monthlySales->where('month', $month)->sum('total');
        }
        // dd($sales);
        $orders = [];
        foreach ($monthNames as $month) {
            $orders[] = $monthlyOrders->where('month', $month)->sum('total');
        }

        $soldProducts =[];
        foreach ($mostSoldProductsMon as $name) {
            $soldProducts[] = $mostSoldProducts->where('name', $name)->sum('total');
        }

        
       //get 
        return [
            'charts'  => [
                [
                    'name'   => 'Sales',
                    'values' => $sales,
                    'labels' => $monthNames,
                ],
                [
                    'name'   => 'Orders',
                    'values' => $orders,
                    'labels' => $monthNames,
                ],
             
            ],

            'metrics' => [
                'paid_orders'    => ['value' => number_format($paidOrders), 'diff' => $paidOrdersPercentage],
                'pending_orders' => ['value' => number_format($pendingOrders), 'diff' => $pendingOrdersPercentage],
                'orders'   =>  number_format($totalPaidOrders),
                'clients'    =>$newClients,
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Dashboard';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
           
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
            Layout::metrics([
                'This Month Paid Orders($)'    => 'metrics.paid_orders',
                'This Month Pending Orders($)' => 'metrics.pending_orders',
                'Total Earnings($)' => 'metrics.orders',
                'This Month New Clients' => 'metrics.clients',
            ]),

            Layout::columns([
                ChartLineExample::make('charts', 'Monthly Sales & Orders')
                    ->description('Line chart to show monthly salesand orders'),
            ]),

        ];
    }
}
