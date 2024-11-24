<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .body {
            padding: 20px;
            font-size: 16px;
            color: #666666;
            line-height: 1.6;
        }
        .body a {
            color: #007bff;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #007bff;
            color: #ffffff;
            border-radius: 5px;
            display: inline-block;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #999999;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>
        <div class="body">
            <p>Hello!</p>
            <p>Your Order of ₦{{ number_format($total_price) }} has been placed!</p>
            <p><a href="{{ $url }}">View Order</a></p>
            <p>Thank you for your patronage!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} BerryShoes. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
