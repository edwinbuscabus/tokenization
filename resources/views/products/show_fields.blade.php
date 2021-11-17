<!-- Product Name Field -->
<div class="col-sm-12">
    {!! Form::label('product_name', 'Product Name:') !!}
    <p>{{ $product->product_name }}</p>
</div>

<!-- Brandname Field -->
<div class="col-sm-12">
    {!! Form::label('brandname', 'Brandname:') !!}
    <p>{{ $product->brandname }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Pricing Field -->
<div class="col-sm-12">
    {!! Form::label('pricing', 'Pricing:') !!}
    <p>{{ $product->pricing }}</p>
</div>

<!-- Stock Field -->
<div class="col-sm-12">
    {!! Form::label('stock', 'Stock:') !!}
    <p>{{ $product->stock }}</p>
</div>

