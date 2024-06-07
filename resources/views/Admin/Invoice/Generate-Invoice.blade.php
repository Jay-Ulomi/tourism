<!DOCTYPE html>
<html lang="en">
<base href="/public">

@include("Admin.css")
<style>
    /* .invoice-container {
        width: 100%;
        max-width: 800px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    } */
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
</style>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include("Admin.spinner")
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('Admin.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('Admin.navbar')
            <!-- Navbar End -->

            @include('Status.Status')
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Generate Invoice</h6>
                            <form action="{{ route('plan-invoice',['id'=>$planbooking->id]) }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="invoice-container">
                                    <div class="invoice-header">
                                        <div>
                                            <h2>Focus TourTz</h2>
                                            <p>HighLand Villa, Mikocheni<br>
                                            Unguja, Zanzibar<br>
                                            +255 752 937 709</p>
                                        </div>
                                        <div style="text-align: right;">
                                            <h3>Invoice </h3>
                                            <p>Date Issued:</p>
                                        </div>
                                    </div>

                                    <div class="invoice-details">
                                        <table width="100%">
                                            <tr>
                                                <td><strong>Invoice To:</strong><br>
                                                  {{$planbooking->user->first_name}} {{$planbooking->user->last_name}} <br>
                                                  {{$planbooking->user->email}}<br>
                                                  {{$planbooking->user->city}}<br>
                                                  {{$planbooking->user->nationality}}<br>
                                                </td>
                                                <td></td>
                                                <td><strong>Bill To:</strong><br>
                                                    Focus TourTz<br>
                                                    Total Due: {{ number_format($planbooking->totalPrice,2) }}<br>
                                                    Account Name: <br>
                                                    Country: Tanzania<br>
                                                    Account Number: 255 752 937 709<br>
                                                    Name:  Focus TourTz<br>
                                                </td>
                                                <td><strong>Information</strong><br>
                                                Star: {{$planbooking->start_at}}<br>
                                                End: {{$planbooking->end_at}}<br>
                                                No.Of people: {{$planbooking->numberOfPeople}}<br>
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
                                            <tr>
                                                <td class="text-nowrap">{{$planbooking->plan->title}}</td>
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

                                                <td><input type="number" name="totalPrice" id="totalPrice" value="{{$planbooking->totalPrice}}" oninput="calculateTotals()"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: right;">
                                                <p>Subtotal: <span id="subtotal">{{ number_format(0, 2) }}</span></p>
                                                <p>Tax: <span id="tax">{{ number_format(0, 2) }}</span></p>
                                                <h3>Total: <span id="total">{{ number_format(0, 2) }}</span></h3>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="invoice-footer">
                                        <p class="note">Note: Thank you!</p>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Send Invoice</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            @include("Admin.footer")
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include("Admin.script")
    <script>
        function calculateTotals() {
            const price = parseFloat(document.getElementById('totalPrice').value) || 0;
            const tax = price * 0.00; // Assuming 0% tax for simplicity
            const subtotal = price;
            const total = subtotal + tax;

            document.getElementById('subtotal').innerText = subtotal.toFixed(2);
            document.getElementById('tax').innerText = tax.toFixed(2);
            document.getElementById('total').innerText = total.toFixed(2);
        }
    </script>
</body>
</html>
