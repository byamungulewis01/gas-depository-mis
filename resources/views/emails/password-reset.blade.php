<x-mail::message>
# Reset Your Password

Hello!

You are receiving this email because we received a password reset request for your account.

<x-mail::panel>
## Your Password Reset PIN is:

# {{ $resetPin }}

**This PIN will expire in 15 minutes.**
</x-mail::panel>

If you did not request a password reset, no further action is required.

<x-mail::button :url="url('/')">
Go to App
</x-mail::button>

Best regards,<br>
{{ config('app.name') }} Team

---

<small>If you're having trouble with the button, copy and paste this link into your browser:</small>

<small>{{ url('/') }}</small>
</x-mail::message>
