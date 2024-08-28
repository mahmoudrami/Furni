<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" placeholder="Name"
    class="form-control @error('name') is-invalid @enderror" value="{{ old('name', @$item->name) }}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" placeholder="Price"
    class="form-control @error('price') is-invalid @enderror" value="{{ old('price', @$item->price) }}">
    @error('price')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Quantity</label>
    <input type="number" name="quantity" placeholder="Quantity"
    class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', @$item->quantity) }}">
    @error('quantity')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" id="image"  onchange="showImg(event)"
    class="form-control @error('image') is-invalid @enderror">
    <label for="image"><img src="{{ @$item->image_path }}" alt="" id="previwe" width="350px"></label>
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<button class="btn btn-success"><i class="fas fa-save"></i> Save</button>



