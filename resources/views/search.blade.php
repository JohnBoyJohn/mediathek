@push('scripts')
    <script src="{{ mix('js/search.js') }}" defer></script>
@endpush

<x-app-layout>
    <div class="container">
        <div id="app" class="wrapper">
            <div class="row mt-4">
                @include('layouts.sidebar')

                <div class="col-9 border bg-light">
                    <!-- CONTENT -->
                    <app :lang="{{ json_encode(__('app')) }}" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
