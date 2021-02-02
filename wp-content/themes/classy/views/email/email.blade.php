{{--Template name: Email Template--}}
@php
$data = [
    'key' => 'value'
]
@endphp
{!! \Helpers\General::getEmailHtml($data, ['en' => 'email.email-reset-password']) !!}