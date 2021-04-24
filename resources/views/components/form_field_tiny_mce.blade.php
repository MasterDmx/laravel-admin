<textarea name="{{ $name }}" id="{{ $id ?? '' }}" class="tinymce @error($name) is-invalid @enderror">{{ $value ?? '' }}</textarea>

@if (!empty($help))
    <span class="help-block">{{ $help }}</span>
@endif
