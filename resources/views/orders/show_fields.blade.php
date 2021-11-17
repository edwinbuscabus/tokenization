<!-- Order Name Field -->
<div class="col-sm-12">
    {!! Form::label('order_name', 'Order Name:') !!}
    <p>{{ $order->order_name }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $order->address }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $order->product_id }}</p>
</div>

<!-- Quantity Order Field -->
<div class="col-sm-12">
    {!! Form::label('quantity_order', 'Quantity Order:') !!}
    <p>{{ $order->quantity_order }}</p>
</div>

