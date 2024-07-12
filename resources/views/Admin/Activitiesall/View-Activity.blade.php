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

            @include('Status.Status')

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">All Activities</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Activity Images</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $index => $activity)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>
                                                    @if ($activity->image1)
                                                    <img src="{{ asset('storage/' . $activity->image1) }}" alt="{{ $activity->title }}" style="max-width: 150px; max-height: 40px;">
                                                @else
                                                    No Image
                                                @endif

                                                </td>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->description }}</td>
                                                <td>
                                                    <a href="{{ route('activities.edit', $activity->id) }}" class="icon-link"><i class="fas fa-pencil-alt edit"></i></a>
                                                    <a href="#" class="delete-link" data-activity-id="{{ $activity->id }}">
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
                    if (confirm('Are you sure you want to delete this Activity?')) {
                        let activityId = this.getAttribute('data-activity-id');
                        deleteActivity(activityId);
                    }
                });
            });

            function deleteActivity(activityId) {
                fetch(`{{ url('activities') }}/${activityId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Handle success, e.g., remove the deleted activity row from the UI
                        console.log('Activity deleted successfully');
                        window.location.href = window.location.href;
                    } else {
                        // Handle errors
                        console.error('Failed to delete activity');
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
