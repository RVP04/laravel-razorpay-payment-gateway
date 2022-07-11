@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Payment Status</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($status)
                            <div class="alert alert-success" role="alert">
                                Payment Success
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                Payment Failed
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
