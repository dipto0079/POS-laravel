<!DOCTYPE html>
<html lang="en">

<body>

<p>Dear {{ $restaurantUser['name'] }}</p>
<p>Thank you for registering in Ask Me POS, here is your Restaurant ID: {!! getRestaurantId($restaurantUser['restaurant_id']) !!}. Please keep your
    Restaurant
    ID safe because you and your
    employees will be required to provide this along with his/her email and password. Please activate your account by
    clicking on this link below.</p>
<p><a href="{{ route('restaurant.verifyEmail', [$restaurantUser->email_verification_token]) }}">
        Verify my account
    </a></p>

<p>Thanks</p>

</body>

</html>
