@extends('template.user')

@section('title')
    Shop
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category">
                        <h2 id="category-label">Categories</h2>
                        <ul class="list-group">
                            <li class="list-group-item {{ $id == null ? 'active' : '' }}"><a href="/shop"> All</a></li>
                            @foreach ($categories as $c)
                                <li class="list-group-item {{ $c->id == $id ? 'active' : '' }}"> <a href="/shop/category/{{ $c->id }}">{{ $c->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <h2 id="category-label" class="text-center mt-5">Search Product</h2>
                    <form action="/shop" class="form-inline ml-5">
                        <input type="text" class="form-control" name="search">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="item-list">
                        <h2>Our Products</h2>
                        <hr style="margin-bottom: 2em;">
                        <div class="row list-product">
                            @foreach ($products as $p)
                                <div class="col-lg-4 item mb-5">
                                    <a href="/shop/{{ $p->id }}">
                                        <img src="{{ $p->image }}" alt="nopic" height="180"
                                            width="180">
                                    </a>
                                    <p class="product-name mt-3 font-weight-bold"><a href="">{{ $p->name }}</a></p>
                                    <p class="product-price">Rp. {{ number_format($p->price) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center pt-4" >
                        {{$products->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endsection
