@include('manager.header')
@include('manager.navbar')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h6 class="title1">Manage Clients' Withdrawals</h6>
            </div>
            <div class="mb-5">
                <div class="col-12 card shadow p-4 bg-white">
                    <div class="table-responsive">
                        <table id="ShipTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Amount Requested</th>
                                    <th>Amount + Charges</th>
                                    <th>Payment Method</th>
                                    <th>Receiver's Email</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdrawals as $with)
                                    <tr>
                                        <th scope="row">{{ $with->id }}</th>
                                        <td>{{ $with->name }}</td>
                                        <td>${{ number_format($with->amount, 2, '.', ',') }}</td>
                                        <td>${{ number_format($with->amount * 0.20 + $with->amount, 2, '.', ',') }}</td>
                                        <td>{{ $with->method }}</td>
                                        <td>{{ $with->email }}</td>
                                        <td>
                                            @if($with->status === '0')
                                                <span class="badge bg-danger">Pending</span>
                                            @elseif($with->status === '1')
                                                <span class="badge bg-success">Processed</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($with->created_at)->format('D, M j, Y g:i A') }}</td>
                                        <td>
                                            <a href="{{ url('view-withdrawal/'.$with->id) }}" class="btn btn-info btn-sm m-1" title="View withdrawal details">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <a href="{{ url('delete-withdrawal/'.$with->id) }}" class="btn btn-danger btn-sm m-1">Delete</a>
                                            @if($with->status === '0')
                                                <a class="btn btn-primary btn-sm m-1" href="{{ url('process-withdrawal/'.$with->id) }}">Process</a>
                                            @endif
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
@include('manager.footer')