<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice For Plan Paid</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .invoice-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            position: relative; /* Added to make the container a reference point for absolute positioning */
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .invoice-header div {
            width: 48%;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .invoice-table th {
            background-color: #f4f4f4;
        }
        .invoice-footer {
            margin-top: 20px;
            text-align: center;
        }
        .note {
            font-size: 0.9em;
            color: #666;
        }

        .paid-stamp {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-15deg);
            font-size: 3em;
            color: red;
            border: 5px solid red;
            padding: 10px;
            border-radius: 10px;
            opacity: 0.7;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <h2>Focus TourTz</h2>
                <p>HighLand Villa, Mikocheni<br>
                Unguja, Zanzibar<br>
                +255 752 937 709</p>
            </div>
            <div style="text-align: right;">
                <h3>Invoice {{ $invoice->invoice_number }}</h3>
                <p>Date Issued: {{ $invoice->invoice_date }}</p>
            </div>
        </div>

        <div class="invoice-details">
            <table width="100%">
                <tr>
                    <td><strong>Invoice To:</strong><br>
                      {{ $planbooking->user->first_name }} {{ $planbooking->user->last_name }} <br>
                      {{ $planbooking->user->email }}<br>
                      {{ $planbooking->user->city }}<br>
                      {{ $planbooking->user->nationality }}<br>
                    </td>
                    <td></td>
                    <td><strong>Bill To:</strong><br>
                        Focus TourTz<br>
                        Total Due: {{ number_format($invoice->amount, 2) }}<br>
                        Account Name: Focus TourTz<br>
                        Country: Tanzania<br>
                        Account Number: 255 752 937 709<br>
                        Name: Focus TourTz<br>
                    </td>
                    <td><strong>Information</strong><br>
                    Start: {{ $planbooking->start_at }}<br>
                    End: {{ $planbooking->end_at }}<br>
                    No. of People: {{ $planbooking->numberOfPeople }}<br>
                    </td>
                </tr>
            </table>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Plan Title</th>
                    <th>Categories</th>
                    <th>Additional</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @if($planbooking->plan)
                <tr>
                    <td class="text-nowrap">{{ $planbooking->plan->title }}</td>
                    <td class="text-nowrap">
                        @foreach($planbooking->plan->info as $info)
                        {{ $info }} <br>
                        @endforeach
                    </td>
                    <td>
                        @php
                            $activities = json_decode($planbooking->activities, true);
                        @endphp
                        @if(is_array($activities))
                            @foreach($activities as $activity)
                                {{ $activity }} <br>
                            @endforeach
                        @else
                            No activities available
                        @endif
                    </td>
                    <td>{{ number_format($invoice->amount, 2) }}</td>
                </tr>
                @else
                <tr>
                    <td colspan="4">Plan details not available.</td>
                </tr>
                @endif
            </tbody>
        </table>

        <table width="100%">
            <tr>
                <td style="text-align: right;">
                    <p>Subtotal: <span id="subtotal">{{ number_format($invoice->amount, 2) }}</span></p>
                    <p>Tax: <span id="tax">{{ number_format(0, 2) }}</span></p>
                    <h3>Total: <span id="total">{{ number_format($invoice->amount, 2) }}</span></h3>
                </td>
            </tr>
        </table>

        <div class="invoice-footer">
            <p>Thank you,<br>Focus TourTz Team</p>
        </div>
        <div class="paid-stamp">
            PAID
        </div>
    </div>
</body>
</html>
