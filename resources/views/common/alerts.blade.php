@if (session()->has('success_message'))

<div class="alert alert--success">
    {{ session()->get('success_message') }}
</div>

@endif

@if ($errors->count())

    @foreach ($errors->all() as $error)

        <div class="alert alert--error">
            {{ $error }}
        </div>

    @endforeach

@endif