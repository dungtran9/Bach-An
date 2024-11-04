<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard</a>
        <div class="sb-sidenav-menu-heading">Interface</div>
        <a class="nav-link collapsed" href="{{route('customer.index')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Customers
        </a>

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
           aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
            Products
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav"><a href="{{route('product.add')}}" class="nav-link">Add
                    Product</a><a href="{{route('product.index')}}" class="nav-link">List</a></nav>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false"
           aria-controls="collapsePages">
            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
            Bills
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePages" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a href="{{ route('bills.index') }}" class="nav-link">List</a>
        </div>

        <div class="collapse" id="collapsePages" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                     data-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html"></a><a
                            class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot
                        </a></nav>
                </div>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                     data-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a
                            class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500
                        </a></nav>
                </div>
            </nav>
        </div>
    </div>
</div>
