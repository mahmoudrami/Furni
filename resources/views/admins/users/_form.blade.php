<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" placeholder="Title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', @$item->title) }}">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea name="content" placeholder="Content" class="form-control @error('content') is-invalid @enderror">{{ old('content', @$item->content) }}</textarea>
    @error('content')
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
