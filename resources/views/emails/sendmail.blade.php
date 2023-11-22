<x-mail::message>
# Email Verification

Click the following link to verify your account:

[{{ $url }}]({{ $url }})

If you didn't request this link, you can safely ignore this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

