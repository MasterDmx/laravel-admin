<form action="{{ $action }}" method="{{ $getNativeMethod() }}">
    @csrf

    @if ($isExtendedMethod())
        @method($getExtendedMethod())
    @endif

    {{ $slot }}
</form>
