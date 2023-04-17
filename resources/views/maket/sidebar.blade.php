<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

{{--                <a class="nav-link" href="{{route('tasks.index')}}">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>--}}
{{--                    Tasks--}}
{{--                </a>--}}

                <a class="nav-link" href="{{route('users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Users
                </a>

                <a class="nav-link" href="{{route('customers.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Customers
                </a>

                <a class="nav-link" href="{{route('debts.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Debts
                </a>

                <a class="nav-link" href="{{route('payments.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Payments
                </a>

                <a class="nav-link" href="{{route('roles.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Roles
                </a>

            </div>
        </div>
{{--        <div class="sb-sidenav-footer">--}}
{{--            <div class="small">Logged in as:</div>--}}
{{--            Start Bootstrap--}}
{{--        </div>--}}
    </nav>
</div>
