 <div class="profile-content bg-light">
     <header class="py-3 mb-3 border-bottom">
         <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
             <div class="col align-self-center">
                 <!-- Search-Form -->
                 <form class="js-focus-state">
                     <label class="sr-only" for="searchProduct">Search</label>
                     <div class="input-group">
                         <div class="input-group-append">
                             <!-- Select -->
                             <select wire:change="filterOrders($event.target.value)"
                                 class="form-control dropdown-select btn height-40 text-gray-60 font-weight-normal border-top border-bottom rounded-0 border-primary border-width-1 pl-0 pr-5 py-2"
                                 data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom rounded-0 border-primary border-width-1 pl-0 pr-5 py-2">
                                 <option value="all" selected>All</option>

                                 <option value="pending">Pending</option>
                                 <option value="paid">Paid</option>

                             </select>
                             <!-- End Select -->

                         </div>
                     </div>
                 </form>
                 <!-- End Search-Form -->
             </div>
         </div>
     </header>



     <table class="table table-striped">
         @if ($orders->count() > 0)
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Status</th>
                     <th scope="col">Total</th>
                     <th scope="col">Payment</th>
                     <th scope="col">Currency</th>
                     <th scope="col">Created At</th>
                     <th scope="col">Action</th>
                 </tr>
             </thead>
         @endif
         <tbody>

             @forelse ($orders as $order)
                 <tr>
                     <th scope="row">{{ $order->id }}</th>
                     <td>{{ $order->status }}</td>
                     <td>{{ $order->total }}</td>
                     <td>{{ $order->payment->name }}</td>
                     <td>{{ $order->currency->name }}</td>
                     <td>{{ $order->created_at->toDateTimeString() }}</td>
                     <td><a href="#" class="btn px-5 btn-sm btn-primary-dark transition-3d-hover"><i
                                 class="ec ec-eye mr-2 font-size-20"></i>View</a></td>
                 </tr>

             @empty
                 <div class="alert alert-warning" role="alert">
                     Opps! No orders found.
                 </div>
             @endforelse
         </tbody>
     </table>
 </div>
