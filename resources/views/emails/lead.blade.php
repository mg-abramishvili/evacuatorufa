@component('mail::message')
# Новая заявка с сайта evacuatorufa.ru

Имя:<br>{{ $name }}
<br><br>

Телефон:<br>{{ $tel }}
<br><br>
{{ $text }}

@endcomponent