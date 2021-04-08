<textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id ?? '' }}" rows="{{ $rows ?? 5 }}">{{ $value ?? '' }}</textarea>

@if (!empty($help))
    <span class="help-block">{{ $help }}</span>
@endif
