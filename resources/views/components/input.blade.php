<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}"
        class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" {{ $attributes }}>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
