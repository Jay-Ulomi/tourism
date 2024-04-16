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
                            <h6 class="mb-4">All Historical Site</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Historical Site Image</th>
                                            <th scope="col">Historical Site Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($historicalsites as $index => $historicalsite)
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>
                                                    @if ($historicalsite->history_image)
                                                        <img src="{{ asset('storage/' . $historicalsite->history_image) }}" alt="Hotel Image" style="max-width: 150px; max-height: 40px;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>{{ $historicalsite->history_name }}</td>
                                                <td>{{ $historicalsite->price }}</td>
                                                <td>{{ $historicalsite->city }}</td>
                                                <td>{{ $historicalsite->description }}</td>
                                                <td>
                                                    <a href="{{ route('edit',$historicalsite->id) }}" class="icon-link"><i class="fas fa-pencil-alt edit"></i></a>
                                                    <a href="#" class="delete-link" data-historicalsite-id="{{ $historicalsite->id }}">
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
                    if (confirm('Are you sure you want to delete this Historical Site?')) {
                        let historicalsiteId = this.getAttribute('data-historicalsite-id');
                        deleteHistoricalSite(historicalsiteId);
                    }
                });
            });

            function deleteHistoricalSite(historicalsiteId) {
                // Send a DELETE request using your preferred method (e.g., fetch, Axios)
                fetch(`/delete_history/${historicalsiteId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Handle success, e.g., remove the deleted Historical Site row from the UI
                        console.log('Historical Site deleted successfully');
                        window.location.href = window.location.href;
                    } else {
                        // Handle errors
                        console.error('Failed to delete Historical Site');
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
