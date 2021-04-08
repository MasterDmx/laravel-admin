<input type="text" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ $value ?? '' }}" id="{{ $id }}">

@if (!empty($help))
    <span class="help-block">{{ $help }}</span>
@endif
