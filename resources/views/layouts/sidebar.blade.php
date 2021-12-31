<div class="col-3 sidebar">
    <div class="d-flex flex-column align-items-sstart border bg-light">
        <ul class="nav nav-pills flex-column mb-auto align-items-start">
            <li class="nav-item col-12">
                <a href="{{ config('app.routes.home') }}" class="nav-link align-middle px-3">
                    <i class="fs-4 bi-table"></i>
                    <span class="ms-1 d-none d-sm-inline">
                        {{ __('app.sidebar.dashboard') }}
                    </span>
                </a>
            </li>
            <li class="nav-item col-12">
                <a href="{{ config('app.routes.search') }}" class="nav-link align-middle px-3">
                    <i class="bi bi-search"></i>
                    <span class="ms-1 d-none d-sm-inline">
                        {{ __('app.sidebar.search') }}
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>