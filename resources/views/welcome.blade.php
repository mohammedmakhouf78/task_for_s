@extends('master')

@section('content')
    <div class="products">
        <div>
            <canvas id="productsChart"></canvas>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{asset('js/home.js')}}"></script>
@endpush