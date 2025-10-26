@include('manager.header')
@include('manager.navbar')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @if(session('message'))
                <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h6 class="title1">Manage Clients Deposits</h6>
            </div>
            <div class="mb-5">
                <div class="col-12">
                    <!--<small class="text-muted">If you can't see the image, try switching your uploaded location to another option from your admin settings page.</small>-->
                </div>
                <div class="col-12 card shadow p-4 bg-white">
                    <div class="table-responsive">
                        <table id="ShipTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposits as $dep)
                                    <tr>
                                        <th scope="row">{{ $dep->id }}</th>
                                        <td>{{ $dep->name }}</td>
                                        <td>{{ $dep->email }}</td>
                                        <td>${{ number_format($dep->amount, 2, '.', ',') }}</td>
                                        <td>{{ $dep->asset }}</td>
                                        <td>
                                            @if($dep->status === '0')
                                                <span class="badge bg-danger">Pending</span>
                                            @elseif($dep->status === '1')
                                                <span class="badge bg-success">Processed</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($dep->created_at)->format('D, M j, Y g:i A') }}</td>
                                        <td>
                                            <a href="{{ url('view-deposit/'.$dep->id) }}" class="btn btn-light btn-sm m-1" title="View payment screenshot">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('delete-deposit/'.$dep->id) }}" class="btn btn-danger btn-sm m-1">Delete</a>
                                            @if($dep->status === '0')
                                                <a class="btn btn-primary btn-sm" href="{{ url('process-deposit/'.$dep->id) }}">Process</a>
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
				