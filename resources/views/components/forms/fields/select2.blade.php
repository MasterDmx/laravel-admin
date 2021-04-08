


<select
    {{ $attributes }}

    class="select2 form-control w-100 @if($search ?? false) js-hide-search @endif"

    name="{{ $name }}"
    id="{{ $id }}"

    @if(!empty($placholder)) placeholder="{{ $placeholder }}" @endif
    @if(!empty($multiple)) multiple="multiple" @endif
>

    @if(!empty($defaultOption))
        <option value="" disabled>{{ $defaultOption }}</option>
    @endif

    @if(!empty($placholder))
        <option></option>
    @endif

    {{ $slot }}

    @foreach ($getOptions() as $optionId => $optionName)
        <option value="{{ $optionId }}" {{ $isSelected($optionId) ? 'selected' : '' }}>{{ $optionName }}</option>
    @endforeach

</select>
