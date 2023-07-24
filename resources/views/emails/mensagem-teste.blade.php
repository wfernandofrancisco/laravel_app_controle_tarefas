@component('mail::message')
# Introdução

Corpo da mensagem

@component('mail::button', ['url' => ''])
texto do botao
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
