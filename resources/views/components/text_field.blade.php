<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ $label }}</label>

    <div class="col-md-6">
        <input id="{{ $name }}"
               type="{{ $type ?? 'text' }}"
               class="form-control {{ $class ?? '' }}
                @error($name) is-invalid @enderror"
               name="{{ $name }}"
               value="{{ $value ?? old($name) }}"
               {{ $required ? 'required' : '' }}
        >

        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
