@slot('header')
    @component('mail::header', ['url' => 'https://btiestrategica.com.br' ])
        BTI Estratégica
    @endcomponent
@endslot
@component('mail::message')


        {{ $request->texto }}


@endcomponent
