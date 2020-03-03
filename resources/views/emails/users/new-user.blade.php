@component('mail::message')
# Email Verification

Please verify your email here.

@component('mail::button', ['url' => route('email-verify', ['token' => $token])])
VERIFY EMAIL
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
