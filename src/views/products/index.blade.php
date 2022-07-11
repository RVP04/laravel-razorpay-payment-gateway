@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-3 mb-2">
                                    <div class="card" style="width: auto;">
                                        <img src="https://picsum.photos/200/300" class="card-img-top"
                                            alt="{{ $product->name }}" width="200" height="300">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make
                                                up the bulk of the card's content.</p>
                                            <center> <a href="{{ route('payment-process-page', $product->id) }}"
                                                    class="btn btn-primary">Pay
                                                    {{ number_format($product->price, 2, '.', ',') }}</a> </center>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
