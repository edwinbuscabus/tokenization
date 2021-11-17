@extends('layouts.app')

@section('content')

<table cellpadding="10">
        <tr>
            <td valign="top" width="30%">
            <img src="{{asset('images\Product\Chilli Cheese Crispy Chicken.png')}}" width="100%" height="100%">
            </td>
        <td valign="top">
        <h3>Chilli Cheese Crispy Chicken</h3>
        Our Chilli Cheese Lover Crispy Chicken, topped with Jalapenos,
        Onions,Lettuce and Chilli Cheese Sauce.
        <br>
        <h5>P150.00</h5>
        </td>
        </tr>
    </table>

    <table cellpadding="10">
        <tr>
            <td valign="top" width="30%">
            <img src="{{asset('images\Product\Chili Cheese Lover.jpg')}}" width="100%" height="100%">
            </td>
        <td valign="top">
        <h3>Chili Cheese Lover</h3>
        Made with three savoury flame grilled 100% Irish Beef burgers,
        topped with Jalapenos, Onions, Lettuce and Chilli Cheese Sauce.
        <br>
        <h5>P200.00</h5>

        </td>
        </tr>
    </table>

    <table cellpadding="10">
        <tr>
            <td valign="top" width="30%">
            <img src="{{asset('images\Product\Chilli Cheese Lover.png')}}" width="100%" height="100%">
            </td>
        <td valign="top">
        <h3>Cheese Lover Bacon</h3>  
        Made with two savoury flame grilled 100% Irish Beef burgers,
        topped with Jalapenos, Onions, Lettuce and Chilli Cheese Sauce.
        <br>
        <h5>P150.00</h5>

        </td>
        </tr>
    </table>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('products.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('products.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

