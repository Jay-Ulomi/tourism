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


            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


              <!-- Table Start -->
              <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Users</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($users as $index=> $user )

                                            <th scope="row">{{ $index+1 }}</th>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->nationality }}</td>
                                            <td>{{ $user->city }}</td>
                                            <td>Member</td>
                                            <td>
                                                <a href="" class="icon-link"><i class="fas fa-pencil-alt edit"></i></a>
                                                <a href="#" class="delete-link" data-user-id="{{ $user->id }}">
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
                if (confirm('Are you sure you want to delete this user?')) {
                    let userId = this.getAttribute('data-user-id');
                    deleteUser(userId);
                }
            });
        });

        function deleteUser(userId) {
            // Send a DELETE request using your preferred method (e.g., fetch, Axios)
            fetch(`/delete_user/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => {
                if (response.ok) {
                    // Handle success
                    console.log('User deleted successfully');


                    // Reload the page after a short delay to allow the flash message to be stored
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000); // Adjust the delay as needed
                } else {
                    // Handle errors
                    console.error('Failed to delete user');

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
