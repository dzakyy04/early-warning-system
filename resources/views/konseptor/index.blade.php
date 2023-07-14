@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Konseptor</h5>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-nowrap text-center align-middle" scope="col">No</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Nama Konseptor</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conceptors as $index => $conceptor)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $conceptor->nama }}</td>
                                <td class="text-nowrap text-center">
                                    <span class="badge bg-warning rounded mx-1">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span class="badge bg-danger rounded">
                                        <i class="bi bi-trash"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
