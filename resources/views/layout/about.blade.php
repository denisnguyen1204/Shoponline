@extends('layout.basic')
@section('body')

<!-- Page Header -->
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

<!-- Main Content -->
<div class="container">
    <div class="row row-cols-4">
        @foreach($products as $key => $product)
        <div class="col">
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>--}}
            <div class="card" style="width: 15rem;">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->code }}</h5>
                        <p class="card-text">{{ number_format($product->price) }}</p>
                        <a href="{{ url("layout/detail/{$product->id}") }}" class="btn btn-primary">Detail</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="outer-container">
    <div class="inner-container">
        <div class="centered-content">
            {{ $products->links() }}
        </div>
    </div>
</div>
<hr>
@endsection
