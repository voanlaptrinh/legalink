<!DOCTYPE html>
<html>
<head>
    <title>Bank QR Code</title>
</head>
<body>

    <h2>Bank QR Code for Transfer</h2>

    <!-- Display the QR code -->
    <div>
       {!!$qrCode!!}
    </div>

    <p>Scan this QR code to make a transfer to the specified bank account with the details:</p>
    <ul>
        <li>Bank: ABC Bank</li>
        <li>Account Number: 1234567890</li>
        <li>Account Holder: John Doe</li>
        <li>Amount: 100,000 VND</li>
        <li>Content: Payment for invoice #12345</li>
    </ul>

</body>
</html>
