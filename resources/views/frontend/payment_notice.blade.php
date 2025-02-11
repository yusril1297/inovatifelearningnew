<!DOCTYPE html>
<html>

<head>
    <title>Payment Notice</title>
</head>

<body>
    <h1>Payment Pending</h1>
    <p>Your payment for the course is pending. Please complete your payment to access the course.</p>
    <a href="{{ route('frontend.checkout', ['enrollmentId' => $enrollment->id]) }}">Complete Payment</a>
</body>

</html>
