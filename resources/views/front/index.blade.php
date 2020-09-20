@extends ('front.layouts.master')
@section ('title','Home Page')
@section ('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="message-from-cart-action display-none"></div>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Products</h2>
                        @foreach ($products as $product)
                            @if ($product->category->status == 1)
                                <div class="col-sm-3">
                                    <div id="{{ strtolower($product->name) }}" class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
{{--                                                for showing pictures when deployed on heroku the function for loading picture after loading the page is commented  --}}
{{--                                                <a href="javascript:void(0)"><div class="div-image" style="background-image:url('/getFrontImage?path=/public/images/products/&image={{ $product->image }}');"></div></a>--}}
                                                <a href="javascript:void(0)"><div class="div-image" style="background-image:url('/images/products/{{ $product->image }}');"></div></a>
                                                <p>{{ $product->name }}</p>
                                                <p>{{ $product->description }}</p>

                                                <div class="row index-page-row-for-price">
                                                    <div class="col-sm-6">
                                                        <select class="form-control index-page-product-size">
                                                            @foreach ($product->attributes as $attribute)
                                                                <option value="{{ $attribute->price * $siteCurrency['ratio'] }}"
                                                                        data-product-size="{{ $attribute->size }}"
                                                                        data-product-id="{{ $product->id }}"
                                                                        data-product-name="{{ $product->name }}"
                                                                        data-product-code="{{ $product->code }}">
                                                                    {{ $attribute->size }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 test">
                                                        {!! $siteCurrency['sign'] !!}
                                                        @php $count = 0 @endphp
                                                        @foreach ($product->attributes as $attribute)
                                                            <span class="font-size-16px @if($count == 0) index-page-active-price @endif" data-price="{{ $attribute->price * $siteCurrency['ratio'] }}">{{ $attribute->price * $siteCurrency['ratio'] }}</span>
                                                            @php $count++ @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-default add-to-cart margin-top-25px">Add to Card</a>
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
