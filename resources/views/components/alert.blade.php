
{{-- Mensagem de sucesso na gravao do registro --}}
@if(session('success'))
    <p style="color:#082">{{ session('success') }}</p>
@endif

{{-- Mensagem de erro na gravao do registro --}}
@if(session('error'))
    <p style="color:#f00">{{ session('error') }}</p>
@endif

{{-- mensagem de validação do formulario --}}
@if ($errors->any())
    <span style="color: #f00">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </span>
@endif
