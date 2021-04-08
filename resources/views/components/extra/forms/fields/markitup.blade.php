<div class="form-bbcode">
    <textarea class="js--markitup-editor @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id ?? '' }}" rows="{{ $rows ?? 5 }}">{{ $value ?? '' }}</textarea>
</div>

@if (!empty($help))
    <span class="help-block">{{ $help }}</span>
@endif
