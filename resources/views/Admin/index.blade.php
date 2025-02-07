@extends('Admin.layouts.main')

@section('main-container')
    <!--start page wrapper -->
    <div class="page-wrapper">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            <div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-info">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Approved Stall</p>
                                        <h4 class="my-1 text-info">{{ $approve_stall_count }}</h4>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-danger">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Pending Stall</p>
                                        <h4 class="my-1 text-warning">{{ $pending_stall_count }}</h4>
                                        {{-- <p class="mb-0 font-13">+8.4% from last week</p> --}}
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                            class='bx bxs-group'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-warning">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Rejected Stall</p>
                                        <p class="my-1 text-danger">{{ $rejected_stall_count }}</p>
                                        {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                            class='bx bxs-wallet'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-success">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Stall Count</p>
                                        <h4 class="my-1 text-success">{{ $total_stall_count }}</h4>
                                        {{-- <p class="mb-0 font-13">-4.5% from last week</p> --}}
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                        <i class='bx bxs-bar-chart-alt-2'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--end row-->

            </div>

    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
      {{-- <footer class="footer">
        <div class="social-icons">
            <a href="https://www.facebook.com/cxrana" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/cxrana" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/ahrana/" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p class="footer-text">Designed by <i class="fas fa-heart"></i> SNM Techcraft Innovation</p>
    </footer> --}}
   </div>
</div>
    <script>
        $(document).ready(function() {
                    if ($('.alert-success').length > 0) {
                        $('.alert-success').delay(3000).fadeOut('slow');
                    }
                    if ($('.alert-danger').length > 0) {
                        $('.alert-danger').delay(3000).fadeOut('slow');
                    }
                });
    </script>

@endsection
