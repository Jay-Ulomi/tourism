<!DOCTYPE html>
<html lang="en">

@include("Admin.css")

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->

        @include("Admin.spinner")
        <!-- Spinner End -->


        <!-- Sidebar Start -->

        @include('Admin.sidebar')
        <!-- Sidebar End -->

        @include('Status.Status')
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->

            @include('Admin.navbar')
            <!-- Navbar End -->


              <!-- Table Start -->
              <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">All Invoice</h6></h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> IV-No</th>
                                            <th scope="col">Date </th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($invoices as $index => $invoice)
                                                <th scope="row">{{ $index + 1 }}</th>

                                                <td>{{ $invoice->invoice_number }}</td>
                                                <td>{{ $invoice->invoice_date }}</td>
                                                <td>{{number_format($invoice->amount,2)}}</td>
                                                <td>{{$invoice->status}}</td>

                                                <td>
                                                    <a href="{{ route('invoice-paid', $invoice->id) }}" class="icon-link">
                                                        <i class="fas fa-check edit"></i>
                                                    </a>
                                                    <a href="#" class="delete-link" data-offer-id="{{ $invoice->id }}">
                                                        <i class="fas fa-trash-alt color"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <!-- Footer Start -->
            @include("Admin.footer")
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let deleteLinks = document.querySelectorAll('.delete-link');

            deleteLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Confirm deletion (optional)
                    if (confirm('Are you sure you want to delete this invoice?')) {
                        let offerId = this.getAttribute('data-offer-id');
                        deleteOffer(offerId);
                    }
                });
            });

            function deleteOffer(offerId) {
                // Send a DELETE request using your preferred method (e.g., fetch, Axios)
                fetch(`/delete-invoice/${offerId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {

                        console.log('Offer deleted successfully');
                        window.location.href = window.location.href;
                    } else {
                        // Handle errors
                        console.error('Failed to delete Offer');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>



    <!-- JavaScript Libraries -->
        @include("Admin.script")




</body>

</html>
