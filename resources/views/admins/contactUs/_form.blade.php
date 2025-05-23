<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="first_name" placeholder="First Name"
        class="form-control @error('first_name') is-invalid @enderror"
        value="{{ old('first_name', @$item->first_name) }}">
    @error('first_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="last_name" placeholder="Last Name"
        class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', @$item->last_name) }}">
    @error('last_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="text" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', @$item->email) }}">
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Message</label>
    <textarea name="message" placeholder="Message" class="form-control @error('message') is-invalid @enderror">{{ old('message', @$item->message) }}</textarea>
    @error('message')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" id="image" onchange="showImg(event)"
        class="form-control @error('image') is-invalid @enderror">
    <label for="image"><img src="{{ old('image', @$item->image_path) }}" alt="" id="previwe"
            width="350px"></label>
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>




<button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
