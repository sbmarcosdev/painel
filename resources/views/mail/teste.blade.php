@slot('header')
    @component('mail::header', ['url' => 'https://btiestrategica.com.br' ])
        BTI Estratégica
    @endcomponent
@endslot
@component('mail::message')
<html>
    <body>
        <p>Olá {{ $user->name }}!</p>
        <p></p>
        <p>Esse é apenas um e-mail de teste, para exemplificar o funcionamento do envio de e-mails no Laravel.</p>
        @component('mail::button',['url'=>'https://btiestrategica.com.br'])
            Acesse nosso Site
        @endcomponent
        <p></p>
        <p>Att, <br>
        BTI Estratégica</p>
    </body>
</html>
@endcomponent
