@component('mail::message')
    <h4>Новое письмо от {{ $user_name }}</h4>
    Имя: {{ $user_name }}
    Email: {{ $user_email }}
    Telegram: {{ $user_telegram }}
@endcomponent