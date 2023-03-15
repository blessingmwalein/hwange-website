<x-app-layout>

    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My
                                Account
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row profile">
                <div class="col-md-3 ">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                        <a href="/"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">

                            <img src="/assets/img/user.png" alt="logo" width="100" height="100">
                            <span class="fs-4">{{ $user->name }}</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="/account" class="nav-link " aria-current="page">
                                    <i class="font-size-22 ec ec-user"></i>
                                    Details
                                </a>
                            </li>
                            <li>
                                <a href="/orders" class="nav-link link-dark">
                                    <i class="font-size-22 ec ec-shopping-bag"></i>
                                    Orders
                                </a>
                            </li>

                            <li>
                                <a href="#" class="nav-link link-dark">

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <span class="link__icon ml-1">
                                                <span class="link__icon-inner"><img width="25"
                                                        src="/assets/img/power.png" /></span>
                                            </span>
                                        <button style="border:none; background-color:transparent"
                                            class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                            Logout
                                            
                                        </button>
                                    </form>


                                </a>
                            </li>

                        </ul>
                        <hr>

                    </div>
                </div>
                <div class="col-md-9">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
