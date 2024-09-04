<div class="mb-3">
    <label>Code</label>
    <input type="text" name="code" value="{{ old('code', @$item->code) }}" placeholder="Code"
        class="form-control @error('code') is-invalid @enderror">
    @error('code')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="mb-3">
    <label>Percentage</label>
    <input type="number" name="percentage" value="{{ old('percentage', @$item->percentage) }}" placeholder="Percentage"
        class="form-control @error('percentage') is-invalid @enderror">
    @error('percentage')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>




<button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
