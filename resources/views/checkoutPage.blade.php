@extends('master')

@section('content')
    <div class="my-5">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" id="amount" class="form-control">
    </div>
    <div class="d-flex justify-content-center" id="paypal-button-container"></div>

@endsection

@push('js')
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD&intent=capture&enable-funding=venmo" data-sdk-integration-source="integrationbuilder"></script>
    <script src="{{asset('js/checkout.js')}}"></script>
@endpush