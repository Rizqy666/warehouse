@extends('layouts.master')
@section('title', 'Log Activity')
@section('breadcrumb')
    <li class="breadcrumb-item active">Log Activity</li>
@endsection
@push('css')
    {{-- css --}}
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Log Activity</h3>
        </div>
        <div class="card-body">
            <h5>Total Logs: {{ $data->total() }}</h5>
            <table class="table table-bordered" id="logs-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Activity</th>
                        <th>Description</th>
                        <th>Logged At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->user->name ?? 'N/A' }}</td>
                            <td>{{ $log->activity }}</td>
                            <td>{{ $log->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->logged_at)->locale('id_ID')->isoFormat('H:mm, D MMM YYYY') ?? '-' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    {{-- javascript --}}
@endpush
