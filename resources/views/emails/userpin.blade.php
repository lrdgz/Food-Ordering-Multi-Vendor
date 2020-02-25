@component('mail::message')
# Password Recovery

This is your six digit number.

@component('mail::button', ['url' => ''])
{{ $pin }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
