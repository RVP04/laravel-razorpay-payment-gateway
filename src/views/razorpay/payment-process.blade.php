@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Payment Page</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button id="razorpay-btn">Pay {{ $product->price }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form name="rzrpayform" action="{{ route('payment-status-page') }}" method="POST">
        @csrf
        <input type="hidden" name="rzp_pymnt_id" id="rzp_pymnt_id">
        <input type="hidden" name="rzp_signature" id="rzp_signature">
        <input type="hidden" name="rzp_order_id" id="rzp_order_id">
    </form>
@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = @json($data);
        options.handler = function(response) {
            document.getElementById('rzp_pymnt_id').value = response.razorpay_payment_id;
            document.getElementById('rzp_signature').value = response.razorpay_signature;
            document.getElementById('rzp_order_id').value = response.razorpay_order_id;
            document.rzrpayform.submit();
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
        document.getElementById('razorpay-btn').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
@endsection
