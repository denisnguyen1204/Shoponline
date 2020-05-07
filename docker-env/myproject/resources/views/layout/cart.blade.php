@extends('layout.basic')
@section('body')
    <header class="masthead" style="background-image: url('{{ asset('images/post-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Man must explore, and this is exploration at its greatest</h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="{{ url('about') }}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            @foreach($cartItems as $keyId => $item)
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                        <img class="img-responsive" src="{{ asset('images/' . $item['item']->image) }}" alt="prewiew" width="120" height="80">
                    </div>
                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                        <h4 class="product-name"><strong>{{ $item['item']->code }}</strong></h4>
                        <h4>
                            <small>{{ $item['item']->size }}</small>
                        </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                            <h6><strong>{{ number_format($item['item']->price) }} <span class="text-muted">x</span></strong></h6>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <form id="updateQty">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="number" max="99" min="1" value="{{ $item['qty'] }}" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <form action="{{ route('delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="{{$item['item']->id}}">
                                <button class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true" ></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- END PRODUCT -->
            <div class="pull-right">
                <form id="updateQty" >
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('percent') }}" method="post">
                            {{ csrf_field() }}
                            <input type="string" class="form-control" name="voucher_code">
                            <button class="btn btn-info">Use Voucher</button>
                        </form>
                    </div>
                </div>
            </div>
            <form action="{{ route('order') }}" method="post">
                @csrf
                <div class="control-group">
                    <h2>Where do you want to delivery?</h2>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="string" class="form-control" value="{{ $customer->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" value="{{ $customer->email }}" disabled>
                    </div>
                    <div class="control-group">
                        <label>Receiver Phone</label>
                        <input type="number" class="form-control" name="customer_phone" value="{{ $customer->phone_number }}">
                    </div>
                    <div class="control-group">
                        <label>Receiver Address</label>
                        <input type="text" class="form-control" name="customer_address" value="{{ $customer->address }}">
                    </div>
                </div>
                <div class="pull-right" style="margin: 10px">
                    <button class="btn btn-success pull-right">Checkout</button>
                    <div class="pull-right" style="margin: 5px">
                        Total price: {{number_format($totalPrice)}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
