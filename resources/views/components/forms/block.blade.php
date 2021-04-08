<div class="form-group row {{ $alignCenter ? 'align-items-center' : '' }}">
    <label for="{{ $for }}" class="{{ $getLabelCol() }} col-form-label">{{ $title }}</label>
    <div class="{{ $getContentCol() }}">
        {{ $slot }}
    </div>
</div>
