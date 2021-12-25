@push('scripts')
    @if(Request::is('dashboard'))
        <script src="{{ mix('js/dashboard.js') }}" defer></script>
    @elseif(Request::is('search'))
        <script src="{{ mix('js/search.js') }}" defer></script>
    @endif
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="app" class="wrapper">
                    <app 
                        :routes="{{ json_encode(config('app.routes')) }}"
                        :lang="{{ json_encode(__('app')) }}"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
