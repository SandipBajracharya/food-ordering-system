<div class="form-group">
    <label for="product-name">Product name</label>
    <input type="text" class="form-control" id="product-name" name="name" placeholder="Enter product size" value="">
</div>
<div class="form-group">
    <label for="product_price">Product price</label>
    <input type="text" class="form-control" id="product_price" name="price" placeholder="Enter product size" value="">
</div>
<div class="form-group">
    <label for="size-id">Product status</label>
    <input type="checkbox" name="status" checked data-bootstrap-switch>
</div>
<div class="form-group">
    <label for="product_size">Product Size</label>
    <select name="size_id" id="product_size" class="form-control">
        <option value="">--select a size--</option>
        @if (!empty($sizes) && count($sizes) > 0)
            @foreach ($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
            @endforeach
        @endif
    </select>
</div>
