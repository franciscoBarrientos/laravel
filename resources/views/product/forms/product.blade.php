<div class="form-group">
    {!!Form::label('name','Nombre:')!!}
    {!!Form::text('name', null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('product_type_id','Tipo de producto:') !!}
    <select name="product_type_id" class="form-control">
        @foreach($productTypes as $productType)
        <option value="{{$productType->id}}">{{$productType->description}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('provider_id','Proveedor:') !!}
    <select name="provider_id" class="form-control">
        @foreach($providers as $provider)
        <option value="{{$provider->id}}">{{$provider->fancy_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!!Form::label('quantity','Cantidad:')!!}
    {!!Form::number('quantity', null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('price','Precio:')!!}
    {!!Form::number('price', null,['class'=>'form-control'])!!}
</div>