@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert border-danger bg-transparent text-danger" role="alert">
            <strong>Ошибка!</strong> {{ $error }}
        </div>
    @endforeach
@endif
