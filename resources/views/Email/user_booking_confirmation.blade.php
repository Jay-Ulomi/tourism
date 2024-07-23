<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Hotel Booking Confirmation</title>
    <style media="all" type="text/css">
          body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f6;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 0 auto !important;
            max-width: 600px;
            padding: 24px;
        }

        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 600px;
            padding: 0;
        }

        .main {
            background: #ffffff;
            border: 1px solid #eaebed;
            border-radius: 16px;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 24px;
        }

        .footer {
            clear: both;
            padding-top: 24px;
            text-align: center;
            width: 100%;
        }

        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #9a9ea6;
            font-size: 16px;
            text-align: center;
        }

        .btn a {
            background-color: #0867ec;
            border: solid 2px #0867ec;
            border-radius: 4px;
            box-sizing: border-box;
            color: #ffffff;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            margin: 0;
            padding: 12px 24px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-primary table td {
            background-color: #0867ec;
        }

        .btn-primary a {
            background-color: #0867ec;
            border-color: #0867ec;
            color: #ffffff;
        }

        @media only screen and (max-width: 640px) {
            .wrapper {
                padding: 8px !important;
            }

            .container {
                padding: 0 !important;
                padding-top: 8px !important;
                width: 100% !important;
            }

            .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            .btn a {
                font-size: 16px !important;
                max-width: 100% !important;
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="wrapper">
                                <h2>Hotel Booking Confirmation</h2>
                                <p>Dear {{ $user->last_name }},</p>
                                <p>Thank you for choosing our hotel. Your booking has been confirmed.</p>
                                <p>Booking Details:</p>
                                <ul>
                                    <li><strong>Hotel:</strong> {{ $hotel->hotel_name }}</li>
                                    <li><strong>Check-in Date:</strong> {{ $bookingDetails->pivot->check_in_date }}</li>
                                    <li><strong>Check-out Date:</strong> {{ $bookingDetails->pivot->check_out_date }}</li>
                                    <li><strong>Total Price:</strong> {{ number_format($hotel->price, 2) }} Tsh</li>
                                    <!-- Add more booking details as needed -->
                                </ul>
                                <p>We look forward to welcoming you. If you have any questions or need further assistance, feel free to contact us.</p>
                                <p>Safe travels!</p>
                                <p>
                                    Embark on a journey with us through diverse destinations, historical sites, and beyond, as we enrich your travels with adventure and history.
                                    Experience a world of wonder and discovery unlike any other. Meet new people and experience the beauty of this world.
                                </p>
                                <p>Contact Us at +255712676783 or +255 712 451 360 / nicksfrumence@gmail.com</p>
                            </td>


                        </tr>
                        <tr>
                            <td><a href="" target="_blank">Subscribe</a></td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>
</html>
