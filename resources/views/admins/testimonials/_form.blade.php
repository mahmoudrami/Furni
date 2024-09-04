<div class="mb-3">
    <label>User</label>
    <select name="user_id" class="form-control">
        <option>Choose</option>
        @foreach ($users as $user)
            <option value="{{ @$user->id }}" @selected(@$user->id == @$item->id)>{{ $user->name }}</option>
        @endforeach
    </select>
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




<button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
