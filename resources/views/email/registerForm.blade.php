@component('mail::message')
    <h4>Зарегистрирован новый пользователь {{ $user_name }}</h4>
    Имя: {{ $user_name }}
    Email: {{ $user_email }}
    Телефон: {{ $user_phone }}
    Регион: {{ $user_region }}
    Пароль: {{ $user_password }}
    Пароль: {{ $user_password }}
    Партнёр: {{ $user_partner }}
@endcomponent