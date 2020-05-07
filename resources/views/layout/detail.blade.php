@extends('layout.basic')
@section('body')
    <!-- Page Content -->
    <header class="masthead" style="background-image: url('{{ asset('images/about-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>About Me</h1>
                        <span class="subheading">This is what I do.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <!-- Portfolio Item Heading -->
        <h1 class="my-4">{{ $product->branch }}</h1>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="{{ asset('images/' . $product->image) }}" alt="">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">{{ $product->code }}</h3>
                <h3 class="my-3">Product Details</h3>
                <ul>
                    <h4>Prize(VND):</h4>
                    <h4>{{ number_format($product->price) }}</h4>
                    <h6>Status:</h6>
                    <li>{{ $product->status }}</li>
                    <h6>Size:</h6>
                    <li>{{ $product->size }}</li>
                    <form action="{{ route('add') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button class="btn btn-info" >Add to cart</button>
                    </form>
                </ul>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 class="my-4">Related Products</h3>

        <div class="row">
            @foreach($products as $key => $product)
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ url("layout/detail/{$product->id}") }}">
                    <img class="img-fluid" src="{{ asset('images/' . $product->image) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>

        <!-- /.row -->
    </div>
@endsection
