@extends('layouts.app')

@push('js')
    <script>
        $(document).ready(function() {
            // edit modal
            $(document).on('show.bs.modal', '#editHolidayModal', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const nama = button.data('nama');
                const tanggal = button.data('tanggal');
                const editModalTitle = $('#editModalTitle');
                const modal = $(this);
                const editForm = $('#editFormHoliday');

                modal.find('#holiday_date').val(tanggal);
                modal.find('#holiday_name').val(nama);
                editForm.attr('action', '{{ route('hari-libur.update', ':id') }}'.replace(':id', id));

                editModalTitle.html(`Edit ${nama}`);
            });

            // Delete Modal
            $(document).on('show.bs.modal', '#deleteHolidayModal', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const nama = button.data('nama');
                const modal = $(this);
                const deleteForm = $('#deleteFormHoliday');
                const deleteModalBody = $('#deleteModalBody');

                deleteForm.attr('action', '{{ route('hari-libur.delete', ':id') }}'.replace(':id', id));
                deleteModalBody.html(`Apakah anda yakin ingin menghapus ${nama}`);

                modal.find('#nama').val(nama);

            });
        });
    </script>
@endpush

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Hari Libur</h5>
                <span class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#conceptorModal">
                    <i class="bi bi-plus me-1"></i> Tambah Hari Libur
                </span>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-nowrap text-center align-middle" scope="col">No</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Tanggal hari libur</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Nama hari libur</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($holidays as $index => $holiday)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $holiday->formatted_date }}
                                </td>
                                <td>{{ $holiday->holiday_name }}</td>
                                <td class="text-nowrap text-center">
                                    <span class="badge bg-warning rounded mx-1" data-bs-toggle="modal"
                                        data-bs-target="#editHolidayModal" data-id="{{ $holiday->id }}"
                                        data-tanggal="{{ $holiday->holiday_date }}"
                                        data-nama="{{ $holiday->holiday_name }}">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span class="badge bg-danger rounded" data-bs-toggle="modal"
                                        data-bs-target="#deleteHolidayModal" data-id={{ $holiday->id }}
                                        data-nama="{{ $holiday->holiday_name }}">
                                        <i class="bi bi-trash"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Tambah Data --}}
        <div class="modal fade" id="conceptorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="conceptorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="conceptorModalLabel">Tambah Hari Libur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('hari-libur.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="holiday_date" name="holiday_date"
                                    placeholder="Masukkan tanggal" required>
                                <label for="holiday_date">Tanggal</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="holiday_name" name="holiday_name"
                                    placeholder="Masukkan nama" required>
                                <label for="holiday_name">Nama hari libur</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Edit Data --}}
        <div class="modal fade" id="editHolidayModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="editModalTitle"></h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form method="post" id="editFormHoliday">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="holiday_date" name="holiday_date"
                                    placeholder="Masukkan tanggal" required>
                                <label for="holiday_date">Tanggal</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="holiday_name" name="holiday_name"
                                    placeholder="Masukkan nama" required>
                                <label for="holiday_name">Nama hari libur</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Hapus Data --}}
        <div class="modal fade" id="deleteHolidayModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body" id="deleteModalBody"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form method="post" id="deleteFormHoliday">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
