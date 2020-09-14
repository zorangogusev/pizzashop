@extends ('front.layouts.master')
@section ('title','Home Page')
@section ('content')
    <style>
        .div-image {
            max-width: 100%;
            width: 200px;
            height: 200px;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: cover;
            border: 4px solid #fff;
            outline: 1px solid #DDd;
            margin: 15px auto 0 auto;
        }
    </style>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Items</h2>
                        @foreach ($products as $product)
                            @if ($product->category->status == 1)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{ url('/product-detail', $product->id) }}"><div class="div-image" style="background-image:url('/getFrontImage?path=/public/images/products/&image={{ $product->image }}');"></div></a>
                                                <p>{{ $product->name }}</p>
                                                <p>{{ $product->description }}</p>

                                                <div class="row index-page-row-for-price">
                                                    <div class="col-sm-6">
                                                        <select class="form-control index-page-product-size">
                                                            @foreach ($product->attributes as $attribute)
                                                                <option value="{{ $attribute->price }}"
                                                                        data-size="{{ $attribute->size }}"
                                                                        data-id="{{ $product->id }}">
                                                                    {{ $attribute->size }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 test">
                                                        <i class="fa fa-euro-sign"></i>
                                                        @php $count = 0 @endphp
                                                        @foreach ($product->attributes as $attribute)
                                                            <span class="font-size-16px @if($count == 0) index-page-active-price @endif" data-price="{{ $attribute->price }}">{{ $attribute->price }}</span>
                                                            @php $count++ @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <a href="{{ url('/product-detail',$product->id) }}" class="btn btn-default add-to-cart margin-top-25px">Add to Card</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
