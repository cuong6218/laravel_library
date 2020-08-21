<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('dashboard.index')}}"><strong>Welcome, {{\Illuminate\Support\Facades\Session::get('userLogin')->name}}</strong></a>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Languages
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{url('admin/dashboard/en/change-language')}}">En</a>
            <a class="dropdown-item" href="{{url('admin/dashboard/vi/change-language')}}">Vi</a>
        </div>
    </div>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{route('auth.logout')}}">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Admin</span>
                        <a class="d-flex align-items-center text-muted">
                            <span data-feather="gitlab"></span>
                        </a>
                    </h6>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard.index')}}">
                            <span data-feather="home"></span>
                            @lang('messages.dashboard') <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('grades.index')}}">
                            <span data-feather="layers"></span>
                            @lang('messages.grades')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('students.index')}}">
                            <span data-feather="users"></span>
                            @lang('messages.students')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cards.index')}}">
                            <span data-feather="credit-card"></span>
                            @lang('messages.cards')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books.index')}}">
                            <span data-feather="book-open"></span>
                            @lang('messages.books')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('types.index')}}">
                            <span data-feather="slack"></span>
                            @lang('messages.types')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">
                            <span data-feather="user"></span>
                            @lang('messages.users')
                        </a>
                    </li>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>User Interface</span>
                        <a class="d-flex align-items-center text-muted" >
                            <span data-feather="monitor"></span>
                        </a>
                    </h6>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('shop.index')}}">
                            <span data-feather="tv"></span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
