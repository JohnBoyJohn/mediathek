@push('scripts')
    <script src="{{ mix('js/dashboard.js') }}" defer></script>
@endpush

<x-app-layout>
    <div class="container">
        <div id="app" class="wrapper">
            <div class="row mt-4">
                @include('layouts.sidebar')

                <div class="col-9 border bg-light">
                    <!-- CONTENT -->
                    <app 
                        :movies="{{ json_encode($movies) }}"
                        :lang="{{ json_encode(__('app')) }}"
                        :invalid-api-string="{{ json_encode(config('app.invalidApiString')) }}"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
