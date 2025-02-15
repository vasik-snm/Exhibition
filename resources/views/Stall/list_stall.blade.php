<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('public/images/crystalline ceramic.png') }}" type="image/png"/>
    <title>Stall List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    .ps-3 {
    padding-left: 1rem !important;
    margin-right: auto;
}
</style>
</head>

<body>

@extends('Admin.layouts.main')

@section('main-container')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="container-fluid">
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
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h1 class="text-left mb-4">Stall List</h1>
                        <div class="text-left mb-3">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a> <!-- Back button -->
                        </div>
                    </div>

                </div>

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Stall</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Stall List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="text-right1">
                            <a href="{{ route('adminStallAdd') }}" class="btn btn-success">Add New Product</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>User Name</th>
                                        <th>Store Name</th>
                                        <th>User Address</th>
                                        <th>User City</th>
                                        <th>User Zip Code</th>
                                        <th>User Phone Number</th>
                                        <th>User Whatsapp Number</th>
                                        <th>User Email</th>
                                        <th>User Collection</th>
                                        <th>User Instagram Id</th>
                                        <th>Stall Category</th>
                                        <th>Stall Type</th>
                                        <th>Food Stall Type</th>
                                        <th>Booking Date</th>
                                        <th>Extra Requirement</th>
                                        <th>Requirement Description</th>
                                        <th>Promo Code</th>
                                        <th>Promo Code Details</th>
                                        <th>Status</th>
                                        <th>Total Amount</th>
                                        <th>After Disc Amount</th>
                                        <th>Payment Receipt</th>
                                        <th>Extra Notes</th>
                                        <th>Logo Design</th>
                                        <th>Payment Mode</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Action</th> <!-- Add the Action Buttons -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($stallInfo as $stall)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $stall->user_name ?? 'N/A' }}</td>
                                            <td>{{ $stall->store_name ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_address ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_city ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_zip_code ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_phone ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_whatsapp ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_email ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_collection ?? 'N/A' }}</td>
                                            <td>{{ $stall->user_insta_id ?? 'N/A' }}</td>
                                            <td>{{ $stall->main_option ?? 'N/A' }}</td>
                                            <td>{{ $stall->stall_type ?? 'N/A' }}</td>
                                            <td>{{ $stall->food_option ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($stall->created_at)->format('d/m/Y') ?? 'N/A' }}</td>
                                            <td>{{ $stall->extra_requirement ?? 'N/A' }}</td>

                                            <td>
                                                @php
                                                    $words = explode(' ', $stall->extra_requirement_details ?? 'N/A');
                                                    $shortDescription = implode(' ', array_slice($words, 0, 10));
                                                @endphp
                                                <span id="desc-{{ $stall->id }}">{{ $shortDescription }}</span>
                                                @if (count($words) > 30)
                                                    <span id="more-{{ $stall->id }}" style="display:none;">{{ $stall->extra_requirement_details }}</span>
                                                    <a href="javascript:void(0);" id="toggle-{{ $stall->id }}" onclick="toggleDescription({{ $stall->id }})">See More</a>
                                                @endif
                                            </td>

                                            <td>{{ $stall->promo_code ?? 'N/A' }}</td>
                                            <td>{{ $stall->Promo_code_details ?? 'N/A' }}</td>

                                            <!-- Display current status -->
                                            <td>
                                                <span id="status-{{ $stall->id }}">
                                                    {{ $stall->status ?? 'Pending' }}
                                                </span>
                                            </td>

                                            <td>{{ $stall->total_amount ?? 'N/A' }}</td>
                                            <td>{{ $stall->final_amount ?? 'N/A' }}</td>

                                            <td style="text-align: center;">
                                                @if ($stall->payment_receipt)
                                                    <a href="{{ asset('images/' . $stall->payment_receipt) }}" target="_blank">
                                                        <i class="fas fa-eye" style="font-size: 20px; color: #007bff;"></i>
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>

                                            <td>
                                                <span id="extra-notes-{{ $stall->id }}">{{ $stall->extra_notes ?? 'N/A' }}</span>
                                                @if (empty($stall->extra_notes))
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addNotesModal" onclick="openModal({{ $stall->id }})" id="add-button-{{ $stall->id }}">
                                                        Add Notes
                                                    </button>
                                                @endif
                                            </td>



                                            <td>
                                                @if ($stall->logo_design)
                                                    <span class="badge badge-success">{{ ucfirst($stall->logo_design) }}</span>
                                                @else
                                                    <form method="POST" action="{{ route('update.logo.design', $stall->id) }}" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="logo_design" value="Yes">
                                                        <button type="submit" class="btn btn-success btn-sm">Yes</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('update.logo.design', $stall->id) }}" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="logo_design" value="No">
                                                        <button type="submit" class="btn btn-danger btn-sm">No</button>
                                                    </form>
                                                @endif
                                            </td>


                                            <td>
                                                @if ($stall->payment_mode)
                                                    <span class="badge badge-primary">{{ ucfirst($stall->payment_mode) }}</span>
                                                @else
                                                    <form method="POST" action="{{ route('update.payment.mode', $stall->id) }}" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="payment_mode" value="Cash">
                                                        <button type="submit" class="btn btn-info btn-sm">Cash</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('update.payment.mode', $stall->id) }}" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="payment_mode" value="UPI">
                                                        <button type="submit" class="btn btn-secondary btn-sm">UPI</button>
                                                    </form>
                                                @endif
                                            </td>

                                            <!-- Action buttons to update the status, hide if Approved -->
                                            <td>
                                                @if($stall->status != 'Approved')
                                                    <button class="btn btn-success btn-sm" onclick="updateStatus({{ $stall->id }}, 'Approved')">Approve</button>
                                                    <button class="btn btn-danger btn-sm" onclick="updateStatus({{ $stall->id }}, 'Rejected')">Reject</button>
                                                @else
                                                    <span>Action are Performed</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($stall->role == 1)
                                                    <span class="badge badge-primary">Admin</span>
                                                @else
                                                    <span class="badge badge-secondary">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('stallDelete', $stall->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                                </form>
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
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNotesModal" tabindex="-1" role="dialog" aria-labelledby="addNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="extraNotesForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addNotesModalLabel">Add Extra Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="stall_id" id="stallId">
                    <div class="form-group">
                        <label for="extraNotes">Extra Notes</label>
                        <textarea name="extra_notes" id="extraNotes" class="form-control" rows="4" placeholder="Enter notes..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Notes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        if ($('.alert-success').length > 0) {
            $('.alert-success').delay(3000).fadeOut('slow');
        }
        if ($('.alert-danger').length > 0) {
            $('.alert-danger').delay(3000).fadeOut('slow');
        }
    });

    function updatePaymentMode(stallId, mode) {
    $.ajax({
        url: `/update-payment-mode/${stallId}`, // Your route to handle this update
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            payment_mode: mode
        },
        success: function(response) {
            if (response.success) {
                // Update the table dynamically
                $(`#payment-mode-${stallId}`).html(`<span class="badge badge-primary">${mode}</span>`);
            } else {
                alert('Failed to update payment mode');
            }
        },
        error: function(error) {
            console.error('Error:', error);
            alert('An error occurred while updating payment mode');
        }
    });
}



    function updateStatus(stallId, status) {
    // Show confirmation dialog
    if (confirm("Are you sure you want to update the status?")) {
        // Make the AJAX request
        fetch("{{ url('/stall_status_update') }}/" + stallId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                status: status
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If the update is successful, reload the page immediately
                window.location.reload(); // This will reload the page immediately
            } else {
                alert('Status update failed!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}


function toggleDescription(id) {
    const shortDesc = document.getElementById(`desc-${id}`);
    const fullDesc = document.getElementById(`more-${id}`);
    const toggleLink = document.getElementById(`toggle-${id}`);

    if (fullDesc.style.display === 'none') {
        // Show full description
        fullDesc.style.display = 'inline';
        shortDesc.style.display = 'none';
        toggleLink.innerText = 'See Less';
    } else {
        // Show short description
        fullDesc.style.display = 'none';
        shortDesc.style.display = 'inline';
        toggleLink.innerText = 'See More';
    }

    // Optional: Reload the page to reset the state (not ideal for live environments)
    // location.reload();
}


function openModal(stallId) {
    document.getElementById('stallId').value = stallId;
    document.getElementById('extraNotes').value = '';
}

// Handle form submission
document.getElementById('extraNotesForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('{{ route("update.extra.notes") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Get stall ID and new notes
                const stallId = formData.get('stall_id');
                const newNotes = formData.get('extra_notes');

                // Update the table: show notes and hide "Add Notes" button
                const notesCell = document.getElementById('extra-notes-' + stallId);
                notesCell.innerText = newNotes;

                // Hide the "Add Notes" button
                const addButton = notesCell.nextElementSibling; // Button is the next sibling
                addButton.style.display = 'none';

                $('#addNotesModal').modal('hide'); // Hide the modal
                alert('Notes added successfully!');
            } else {
                alert('Failed to add notes.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
});






</script>
@endsection

