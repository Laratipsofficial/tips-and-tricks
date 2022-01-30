@component('mail::message')

Hi {{ $user->name }},

Welcome to {{ config('app.name') }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
