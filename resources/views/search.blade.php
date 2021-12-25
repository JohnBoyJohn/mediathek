@push('scripts')
    <script src="{{ mix('js/search.js') }}" defer></script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('search') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="app" class="wrapper">
                    <app 
                        routes="{{ json_encode(config('app.routes')) }}"
                        lang="{{ json_encode(__('app')) }}"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
