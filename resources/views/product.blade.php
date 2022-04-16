@extends('layouts.app')
@section('title') Keychron K2 @endsection
@section('content')
<!-- Main Section-->
<section class="mt-0">
    <!-- Page Content Goes Here -->

    <!-- Breadcrumbs-->
    <div class="bg-dark py-6">
    <div class="container-fluid">
        <nav class="m-0" aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item breadcrumb-light">
            <a href="{{ route('welcome') }}">Home</a>
            </li>
            <li class="breadcrumb-item breadcrumb-light">
            <a href="{{ route('product.index') }}">All Product</a>
            </li>
            <li class="breadcrumb-item breadcrumb-light">
            <a href="{{ route('product.index',['category' => $product->product_categories]) }}">{{ $product->product_categories }}</a>
            </li>
            <li
            class="breadcrumb-item breadcrumb-light active"
            aria-current="page"
            >
            {{ $product->product_name_short }}
            </li>
        </ol>
        </nav>
    </div>
    </div>
    <!-- / Breadcrumbs-->

    <div class="container-fluid mt-5">
    <!-- Product Top Section-->
    <div class="row g-9" data-sticky-container>
        <!-- Product Images-->
        <div class="col-12 col-md-6 col-xl-7">
        <div class="row g-3" data-aos="fade-right">
            @foreach ($product->images as $images)
                <div class="col-12">
                    <picture>
                        <img
                        class="img-fluid"
                        data-zoomable
                        src="{{ asset('assets/images/products/'.$images->product_images_name) }}"
                        alt=" "
                        />
                    </picture>
                </div>
            @endforeach
        </div>
        </div>
        <!-- /Product Images-->

        <!-- Product Information-->
        <div class="col-12 col-md-6 col-lg-5">
        <div class="sticky-top top-5">
            <div class="pb-3" data-aos="fade-in">
            <div class="d-flex align-items-center mb-3">
                <p
                class="small fw-bolder text-uppercase tracking-wider text-muted m-0 me-4"
                >
                {{ $product->brand->product_brand_name }}
                </p>
                {{-- <div
                class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer"
                data-pixr-scrollto
                data-target=".reviews"
                >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 80%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div>
                <small class="text-muted d-inline-block ms-2 fs-bolder"
                    >(105 reviews)</small
                >
                </div> --}}
            </div>

            <form action="{{ route('cart.store') }}" method="post">
            <h1 class="mb-1 fs-2 fw-bold">
                {{ $product->product_name_long; }}
            </h1>
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-4 m-0 product-base-price" data-baseprice="{{ $product->product_base_price; }}">RM{{ $product->product_base_price; }}</p>
            </div>
            @forelse ( $product->option as $option)
                <!-- Backlight -->
                <div class="border-top mt-4 mb-3 product-option">
                    <small class="text-uppercase pt-4 d-block fw-bolder">
                    <span class="text-muted">{{ $option->product_option_name }}</span> :
                    <span
                        class="selected-option fw-bold"
                        data-pixr-product-option="{{ $option->product_option_name }}"
                        data-addprice="0"
                        >Not Selected</span
                    >
                    </small>
                    <div
                    class="mt-4 d-flex justify-content-start flex-wrap align-items-start"
                    >
                    @forelse ( $option->list as $list)
                    <div class="form-check-option form-check-rounded">
                        <input
                        type="radio"
                        name="product-option-{{ $option->product_option_name }}"
                        value="{{ $list->product_option_list_name }}"
                        id="option-{{ $option->product_option_name }}-{{ $list->id }}"
                        data-price="{{ $list->product_option_list_additional_price }}"
                        data-option="{{ $option->product_option_name }}"
                        required/>
                        <label for="option-{{ $option->product_option_name }}-{{ $list->id }}">
                        <small>{{ $list->product_option_list_name }}</small>
                        </label>
                    </div>
                    @empty

                    @endforelse
                    </div>
                </div>
                <!-- Backlight -->
            @empty

            @endforelse
                <input type="hidden" name="product_id" value="{{ $product->product_id }}"/>
                <input type="hidden" name="quantity" value="1"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button
                    class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow"
                >
                    Add To Cart
                </button>
            </form>

            <!-- Product Highlights-->
            <div class="my-5">
                <div class="row">
                <div class="col-12 col-md-4">
                    <div class="text-center px-2">
                    <i class="ri-24-hours-line ri-2x"></i>
                    <small class="d-block mt-1">Next-day Delivery</small>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-center px-2">
                    <i class="ri-secure-payment-line ri-2x"></i>
                    <small class="d-block mt-1">Secure Checkout</small>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-center px-2">
                    <i class="ri-service-line ri-2x"></i>
                    <small class="d-block mt-1">Free Returns</small>
                    </div>
                </div>
                </div>
            </div>
            <!-- / Product Highlights-->

            <!-- Product Accordion -->
            <div class="accordion" id="accordionProduct">
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                    >
                    Product About
                    </button>
                </h2>
                <div
                    id="collapseOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingOne"
                    data-bs-parent="#accordionProduct"
                >
                    <div class="accordion-body">
                    <p class="m-0">
                        {{ $product->product_description }}
                    </p>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                    >
                    Details
                    </button>
                </h2>
                <div
                    id="collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingTwo"
                    data-bs-parent="#accordionProduct"
                >
                    <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($product->details as $details)
                            <li
                            class="list-group-item d-flex border-0 row g-0 px-0"
                            >
                            <span class="col-4 fw-bolder">{{ $details->product_details_header }}</span>
                            <span class="col-7 offset-1">{{ $details->product_details_content }}</span>
                            </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                    >
                    Delivery & Returns
                    </button>
                </h2>
                <div
                    id="collapseThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingThree"
                    data-bs-parent="#accordionProduct"
                >
                    <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                        <li
                        class="list-group-item d-flex border-0 row g-0 px-0"
                        >
                        <span class="col-4 fw-bolder">Delivery</span>
                        <span class="col-7 offset-1"
                            >Standard delivery free for orders over $99. Next
                            day delivery $9.99</span
                        >
                        </li>
                        <li
                        class="list-group-item d-flex border-0 row g-0 px-0"
                        >
                        <span class="col-4 fw-bolder">Returns</span>
                        <span class="col-7 offset-1"
                            >30 day return period. See our
                            <a class="text-link-border" href="#"
                            >terms & conditions.</a
                            ></span
                        >
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <!-- / Product Accordion-->
            </div>
        </div>
        </div>
        <!-- / Product Information-->
    </div>
    <!-- / Product Top Section-->

    <div class="row g-0">
        <!-- Related Products-->
        <div class="col-12" data-aos="fade-up">
        <h3 class="fs-4 fw-bolder mt-7 mb-4">You May Also Like</h3>
        <!-- Swiper Latest -->
        <div
            class="swiper-container"
            data-swiper
            data-options='{
                    "spaceBetween": 10,
                    "loop": true,
                    "autoplay": {
                        "delay": 5000,
                        "disableOnInteraction": false
                    },
                    "navigation": {
                        "nextEl": ".swiper-next",
                        "prevEl": ".swiper-prev"
                    },
                    "breakpoints": {
                        "600": {
                        "slidesPerView": 2
                        },
                        "1024": {
                        "slidesPerView": 3
                        },
                        "1400": {
                        "slidesPerView": 4
                        }
                    }
                    }'
        >
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <!-- Card Product-->
                <div
                class="card border border-transparent position-relative overflow-hidden h-100 transparent"
                >
                <div class="card-img position-relative">
                    <div class="card-badges">
                    <span class="badge badge-card"
                        ><span
                        class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"
                        ></span>
                        Sale</span
                    >
                    </div>
                    <span
                    class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"
                    ><i class="ri-heart-line"></i
                    ></span>
                    <picture
                    class="position-relative overflow-hidden d-block bg-light"
                    >
                    <img
                        class="w-100 img-fluid position-relative z-index-10"
                        title=""
                        src="{{ asset('assets/images/products/product-1.webp') }}"
                        alt=""
                    />
                    </picture>
                    <div
                    class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2"
                    >
                    <button class="btn btn-quick-add">
                        <i class="ri-add-line me-2"></i> Quick Add
                    </button>
                    </div>
                </div>
                <div class="card-body px-0">
                    <a
                    class="text-decoration-none link-cover"
                    href="./product"
                    >Keychron K2 Wireless</a
                    >
                    <small class="text-muted d-block"
                    >3 versions, 3 switches</small
                    >
                    <p class="mt-2 mb-0 small">
                    <s class="text-muted">$89.90</s>
                    <span class="text-danger">$69.00</span>
                    </p>
                </div>
                </div>
                <!--/ Card Product-->
            </div>
            </div>

            <!-- Add Arrows -->
            <div
            class="swiper-prev top-50 start-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 start-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover"
            >
            <i class="ri-arrow-left-s-line ri-lg"></i>
            </div>
            <div
            class="swiper-next top-50 end-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 end-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover"
            >
            <i class="ri-arrow-right-s-line ri-lg"></i>
            </div>
        </div>
        <!-- / Swiper Latest-->
        </div>
        <!-- / Related Products-->
{{--
        <!-- Reviews-->
        <div class="col-12" data-aos="fade-up">
        <h3 class="fs-4 fw-bolder mt-7 mb-4 reviews">Reviews</h3>

        <!-- Review Summary-->
        <div
            class="bg-light p-5 justify-content-between d-flex flex-column flex-lg-row"
        >
            <div class="d-flex flex-column align-items-center mb-4 mb-lg-0">
            <div
                class="bg-dark text-white f-w-24 f-h-24 d-flex rounded-circle align-items-center justify-content-center fs-2 fw-bold mb-3"
            >
                4.3
            </div>
            <!-- Review Stars Medium-->
            <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 88%">
                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                </div>
                <div class="stars">
                <i
                    class="ri-star-fill ri-2x mr-1 text-muted opacity-25"
                ></i>
                <i
                    class="ri-star-fill ri-2x mr-1 text-muted opacity-25"
                ></i>
                <i
                    class="ri-star-fill ri-2x mr-1 text-muted opacity-25"
                ></i>
                <i
                    class="ri-star-fill ri-2x mr-1 text-muted opacity-25"
                ></i>
                <i
                    class="ri-star-fill ri-2x mr-1 text-muted opacity-25"
                ></i>
                </div>
            </div>
            </div>
            <div class="d-flex flex-grow-1 flex-column ms-lg-8">
            <div
                class="d-flex align-items-center justify-content-start mb-2"
            >
                <div class="f-w-20">
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 100%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div>
                </div>
                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                <div
                    class="progress-bar bg-dark"
                    role="progressbar"
                    style="width: 80%"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
                </div>
                <span class="fw-bold small d-block f-w-4 text-end">55</span>
            </div>
            <div
                class="d-flex align-items-center justify-content-start mb-2"
            >
                <div class="f-w-20">
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 80%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div>
                </div>
                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                <div
                    class="progress-bar bg-dark"
                    role="progressbar"
                    style="width: 60%"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
                </div>
                <span class="fw-bold small d-block f-w-4 text-end">32</span>
            </div>
            <div
                class="d-flex align-items-center justify-content-start mb-2"
            >
                <div class="f-w-20">
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 60%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div>
                </div>
                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                <div
                    class="progress-bar bg-dark"
                    role="progressbar"
                    style="width: 30%"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
                </div>
                <span class="fw-bold small d-block f-w-4 text-end">15</span>
            </div>
            <div
                class="d-flex align-items-center justify-content-start mb-2"
            >
                <div class="f-w-20">
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 40%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div>
                </div>
                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                <div
                    class="progress-bar bg-dark"
                    role="progressbar"
                    style="width: 8%"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
                </div>
                <span class="fw-bold small d-block f-w-4 text-end">5</span>
            </div>
            <div
                class="d-flex align-items-center justify-content-start mb-2"
            >
                <div class="f-w-20">
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 20%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    </div>
                    <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    </div>
                </div>
                </div>
                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                <div
                    class="progress-bar bg-dark"
                    role="progressbar"
                    style="width: 5%"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
                </div>
                <span class="fw-bold small d-block f-w-4 text-end">1</span>
            </div>
            <p class="mt-3 mb-0 d-flex align-items-start">
                <i class="ri-chat-voice-line me-2"></i> 105 customers have
                reviewed this product
            </p>
            </div>
        </div>
        <!-- / Rewview Summary-->

        <!-- Reviews-->
        <div class="row g-6 g-md-8 g-lg-10 my-3">
            <div class="col-12 col-lg-6 col-xxl-4">
            <div
                class="d-flex justify-content-between align-items-center mb-3"
            >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 80%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                </div>
                <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                </div>
                </div>
                <div class="text-muted small">
                20th September 2020 by DaveD
                </div>
            </div>
            <p class="fw-bold mb-2">Lorem, ipsum.</p>
            <p class="fs-7">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim
                iste dolorum consequatur quis voluptate.
            </p>
            </div>
            <div class="col-12 col-lg-6 col-xxl-4">
            <div
                class="d-flex justify-content-between align-items-center mb-3"
            >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 40%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                </div>
                <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                </div>
                </div>
                <div class="text-muted small">
                18th September 2020 by Sandra K
                </div>
            </div>
            <p class="fw-bold mb-2">Lorem ipsum dolor sit.</p>
            <p class="fs-7">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            </div>
            <div class="col-12 col-lg-6 col-xxl-4">
            <div
                class="d-flex justify-content-between align-items-center mb-3"
            >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 90%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                </div>
                <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                </div>
                </div>
                <div class="text-muted small">
                16th September 2020 by MikeS
                </div>
            </div>
            <p class="fw-bold mb-2">Lorem ipsum dolor sit amet.</p>
            <p class="fs-7">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Praesentium id accusamus at deserunt quo veniam maiores minima
                ab totam sapiente!
            </p>
            </div>
            <div class="col-12 col-lg-6 col-xxl-4">
            <div
                class="d-flex justify-content-between align-items-center mb-3"
            >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 85%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                </div>
                <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                </div>
                </div>
                <div class="text-muted small">
                14th September 2020 by Frankie
                </div>
            </div>
            <p class="fw-bold mb-2">Lorem</p>
            <p class="fs-7">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Fugiat, ducimus ratione!
            </p>
            </div>
            <div class="col-12 col-lg-6 col-xxl-4">
            <div
                class="d-flex justify-content-between align-items-center mb-3"
            >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 70%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                </div>
                <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                </div>
                </div>
                <div class="text-muted small">
                20th September 2020 by Kevin
                </div>
            </div>
            <p class="fw-bold mb-2">Lorem, ipsum dolor.</p>
            <p class="fs-7">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo
                adipisci aspernatur vero saepe molestias dolorem neque.
            </p>
            </div>
            <div class="col-12 col-lg-6 col-xxl-4">
            <div
                class="d-flex justify-content-between align-items-center mb-3"
            >
                <!-- Review Stars Small-->
                <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: 20%">
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                    <i class="ri-star-fill text-dark mr-1"></i>
                </div>
                <div class="stars">
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                </div>
                </div>
                <div class="text-muted small">
                20th September 2020 by Holly
                </div>
            </div>
            <p class="fw-bold mb-2">
                Lorem ipsum dolor sit amet consectetur.
            </p>
            <p class="fs-7">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga
                odio iusto, deleniti ullam repudiandae eligendi placeat in
                minus, praesentium tenetur perferendis?
            </p>
            </div>
        </div>
        <!-- / Reviews-->

        <!-- Review Pagination-->
        <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
            <small class="text-muted">Showing 6 of 105 reviews</small>
            <div class="progress f-h-1 mt-3">
            <div
                class="progress-bar bg-dark"
                role="progressbar"
                style="width: 25%"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
            ></div>
            </div>
            <a
            href="#"
            class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2"
            >Load More</a
            >
        </div>
        <!-- / Review Pagination-->
        </div>
        <!-- / Reviews--> --}}
    </div>
    </div>

    <!-- /Page Content -->
</section>
<!-- / Main Section-->
@endsection
