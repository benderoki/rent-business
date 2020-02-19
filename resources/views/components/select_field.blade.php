<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ $label }}</label>

    <div class="col-md-6">
        <select id="{{ $name }}"
                  class="form-control
                @error($name) is-invalid @enderror"
                  name="{{ $name }}"
            {{ $required ? 'required' : '' }}
        >
            @foreach($options as $option)
                <option {{ (($value ?? old($name)) == $option) ? 'selected' : '' }} value="{{ $option }}">
                    {{ __($options_labels)[$option] ?? $option }}
                </option>
            @endforeach
        </select>

        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
