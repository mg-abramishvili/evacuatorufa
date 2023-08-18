@component('mail::message')
# Новая заявка с сайта evacuatorufa.ru

{{ $text }}
<br><br>

Имя:<br>{{ $name }}
<br><br>

Телефон:<br>{{ $tel }}
<br><br>
----------

@endcomponent