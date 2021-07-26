<!DOCTYPE html>
<html lang="en">

<body>

<p>Dear {{ $customer['name'] }}</p>
<p>Thank you for registering in Ask Me POS, here is your Registered Email:{{ $customer['email'] }} & Phone number: {{ $customer['phone'] }}.
    Please activate your account by
    clicking on this link below.
</p>
<p>
    <a href="{{ route('customer.verifyEmail', [$customer->email_verification_token]) }}">
        Verify my account
    </a>
</p>

<p>Thanks</p>

</body>

</html>
