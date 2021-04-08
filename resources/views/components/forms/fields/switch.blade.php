<div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="field-{{ $name }}" name="{{ $name }}" value="{{ $value }}" {{ $checked ? 'checked' : '' }}>
    <label class="custom-control-label" for="field-{{ $name }}">{{ $label }}</label>
</div>
