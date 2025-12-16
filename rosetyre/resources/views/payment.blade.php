<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Information - Rose Tyre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            padding: 50px 20px;
        }

        .billing-form {
            width: 450px;
            background-color: #fff;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .billing-form h3 {
            color: #d81e05;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .billing-form input {
            margin: 8px 0;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
            font-size: 16px;
            box-sizing: border-box;
        }

        .card-type {
            position: absolute;
            right: 12px;
            top: 12px;
            font-size: 14px;
            color: #666;
        }

        .pay-button {
            margin-top: 16px;
            padding: 14px;
            border-radius: 10px;
            background-color: #d81e05;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form class="billing-form" id="billingForm">
        <h3>Billing Information</h3>

        <div class="d-flex gap-2">
            <input type="text" id="firstName" placeholder="First Name" required>
            <input type="text" id="lastName" placeholder="Last Name" required>
        </div>

        <input type="text" id="street" placeholder="Street Address" required>
        <input type="text" id="city" placeholder="City" required>
        <input type="text" id="postcode" placeholder="Postcode" required>
        <input type="text" id="sortCode" placeholder="Sort Code (optional)">

        <h3>Payment Details</h3>

        <div style="position: relative;">
            <input type="text" id="cardNumber" placeholder="Card Number" required>
            <div class="card-type" id="cardType">Unknown</div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <input type="text" id="expiry" placeholder="MM/YY or MM/YYYY" required>
            <input type="text" id="cvv" placeholder="CVV" style="width: 100px;" required>
        </div>

        <div style="font-size: 14px; color: #777; margin-top: 10px;">
            Accepted: Visa, MasterCard, AmEx
        </div>

        <button type="button" class="pay-button" onclick="pay()">Pay</button>
    </form>

    <script>
        function detectCardType(num) {
            const n = num.replace(/\D/g, '');
            if (/^3[47]\d*$/.test(n)) return "AmEx";
            if (/^4\d*$/.test(n)) return "Visa";
            if (/^(5[1-5]\d*|2(22[1-9]|2[3-9]\d|[3-6]\d{2}|7([01]\d|20))\d*)$/.test(n)) return "MasterCard";
            return "Unknown";
        }

        const cardNumberInput = document.getElementById('cardNumber');
        const cardTypeDisplay = document.getElementById('cardType');

        cardNumberInput.addEventListener('input', () => {
            cardTypeDisplay.textContent = detectCardType(cardNumberInput.value);
        });

        function pay() {
            const firstName = document.getElementById('firstName').value.trim();
            const lastName = document.getElementById('lastName').value.trim();
            const street = document.getElementById('street').value.trim();
            const city = document.getElementById('city').value.trim();
            const postcode = document.getElementById('postcode').value.trim();
            const sortCode = document.getElementById('sortCode').value.trim();
            const cardNumber = document.getElementById('cardNumber').value.trim();
            const expiry = document.getElementById('expiry').value.trim();
            const cvv = document.getElementById('cvv').value.trim();
            const cardType = detectCardType(cardNumber);

            if (!firstName || !lastName || !street || !city || !postcode || !cardNumber || !expiry || !cvv) {
                alert("Please complete all required fields.");
                return;
            }

            alert(
                `Payment Info:\nName: ${firstName} ${lastName}\nAddress: ${street}, ${city}, ${postcode}\nSort Code: ${sortCode}\nCard Type: ${cardType}\nCard Number: **** **** **** ${cardNumber.slice(-4)}\nExpiry: ${expiry}`
            );
        }
    </script>
</body>
</html>
