<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container w-100 d-inline">
        <div class="row">
            <div class="col-9">
                <h1>{{ __('app.pageTitle') }}</h1>
            </div>

            <div class="col-3 dropdown pe-0">
                <button class="btn btn-primary dropdown-toggle float-end"
                        type="button"
                        id="customerMenuButton"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                >
                    <i class="bi bi-person-circle"></i>
                </button>

                <ul class="dropdown-menu end-0 start-50" aria-labelledby="customerMenuButton">
                    <div class="p-2 border-bottom">{{ Auth::user()->name }}</div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a  :href="route('logout')"
                            class="dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
