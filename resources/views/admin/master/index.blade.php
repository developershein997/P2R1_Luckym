@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Master List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Master List</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.master.create') }}" class="btn btn-success " style="width: 100px;"><i
                            class="fas fa-plus text-white  mr-2"></i>Create</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="mytable" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <th>#</th>
                                <th>MasterName</th>
                                <th>MasterId</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Balance</th>
                                {{-- <th>Total Winlose Amt</th> --}}
                                <th>Action</th>
                                <th>Transfer</th>
                            </thead>
                            <tbody>
                                {{-- kzt --}}
                                @if (isset($users))
                                @if (count($users) > 0)
                                @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <span class="d-block">{{ $user->name }}</span>
                                    </td>
                                    <td>
                                        <span class="d-block">{{ $user->user_name }}</span>
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <small
                                            class="badge bg-gradient-{{ $user->status == 1 ? 'success' : 'danger' }}">{{ $user->status == 1 ? 'active' : 'inactive' }}</small>

                                    </td>
                                    <td class="text-bold">{{ number_format($user->balanceFloat) }}</td>

                                        {{-- // $poneWintAmt = $user->children->flatMap->children->flatMap->poneWinePlayer->sum('win_lose_amt');
                                        // $result = $user->children->flatMap->children->flatMap->results->sum('net_win');
                                        // $betNResults = $user->children->flatMap->children->flatMap->results->sum('betNResults');

                                        // $totalAmt = $poneWintAmt + $result + $betNResults; --}}

                                    {{-- <td class="{{ $user->win_lose >= 0 ? 'text-success text-bold' : 'text-danger text-bold'}}">{{number_format($user->win_lose)}}</td> --}}

                                    <td>
                                        @if ($user->status == 1)
                                        <a onclick="event.preventDefault(); document.getElementById('banUser-{{ $user->id }}').submit();"
                                            class="me-2" href="#" data-bs-toggle="tooltip"
                                            data-bs-original-title="Active Player">
                                            <i class="fas fa-user-check text-success"
                                                style="font-size: 20px;"></i>
                                        </a>
                                        @else
                                        <a onclick="event.preventDefault(); document.getElementById('banUser-{{ $user->id }}').submit();"
                                            class="me-2" href="#" data-bs-toggle="tooltip"
                                            data-bs-original-title="InActive Player">
                                            <i class="fas fa-user-slash text-danger"
                                                style="font-size: 20px;"></i>
                                        </a>
                                        @endif
                                        <form class="d-none" id="banUser-{{ $user->id }}"
                                            action="{{ route('admin.master.ban', $user->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                        </form>

                                        <a class="me-1"
                                            href="{{ route('admin.master.getChangePassword', $user->id) }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="Change Password">
                                            <i class="fas fa-lock text-info" style="font-size: 20px;"></i>
                                        </a>
                                        <a class="me-1" href="{{ route('admin.master.edit', $user->id) }}"
                                            data-bs-toggle="tooltip" data-bs-original-title="Edit Agent">
                                            <i class="fas fa-edit text-info" style="font-size: 20px;"></i>
                                        </a>
                                        {{-- <form class="d-inline" action="{{ route('admin.master.destroy', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn transparent-btn" data-bs-toggle="tooltip"
                                                data-bs-original-title="Delete Banner">
                                                <i class="fa fa-trash  text-danger" style="font-size: 20px;"></i>
                                            </button>
                                        </form> --}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.master.getCashIn', $user->id) }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="Deposit To Agent"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-plus text-white mr-1"></i>Deposit
                                        </a>
                                        <a href="{{ route('admin.master.getCashOut', $user->id) }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="WithDraw To Agent"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-minus text-white mr-1"></i>
                                            Withdrawl
                                        </a>
                                        <a href="{{ route('admin.logs', $user->id) }}"
                                            data-bs-toggle="tooltip" data-bs-original-title="Agent logs"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-right-left text-white mr-1"></i>
                                            Logs
                                        </a>
                                        <a href="{{ route('admin.transfer-logs.index') }}"
                                            data-bs-toggle="tooltip" data-bs-original-title="Reports"
                                            class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-money-bill-transfer"></i>
                                            Transfer Logs
                                        </a>



                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td col-span=8>
                                        There was no Masters.
                                    </td>
                                </tr>
                                @endif
                                @endif
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-2">
                            {{$users->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="modal fade" id="credentialsModal" tabindex="-1" role="dialog" aria-labelledby="credentialsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="credentialsModalLabel">Your Credentials</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Username:</strong> <span id="modal-username"></span></p>
                            <p><strong>Password:</strong> <span id="modal-password"></span></p>
                            <p><strong>Amount:</strong> <span id="modal-amount"></span></p>
                            <p><strong>URL:</strong> <span id="modal-url"></span></p>
                            <button class="btn btn-success" onclick="copyToClipboard()">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.transparent-btn').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
<script>
    var successMessage = @json(session('successMessage'));
    var username = @json(session('username'));
    var password = @json(session('password'));
    var amount = @json(session('amount'));

    @if(session() -> has('successMessage'))
    toastr.success(successMessage +
        `
    <div>
        <button class="btn btn-primary btn-sm" data-toggle="modal"
            data-username="${username}"
            data-password="${password}"
            data-amount="${amount}"
            onclick="copyToClipboard(this)">Copy</button>
    </div>`, {
            allowHtml: true
        });
    @endif

    function copyToClipboard(button) {
        var username = $(button).data('username');
        var password = $(button).data('password');
        var amount = $(button).data('amount');

        var textToCopy = "Username: " + username + "\nPassword: " + password + "\nAmount: " + amount;

        navigator.clipboard.writeText(textToCopy).then(function() {
            toastr.success("Credentials copied to clipboard!");
        }).catch(function(err) {
            toastr.error("Failed to copy text: " + err);
        });
    }
</script>


@endsection
