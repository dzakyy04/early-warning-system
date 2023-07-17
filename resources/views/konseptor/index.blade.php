@extends('layouts.app')

@push('js')
    <script>
        $(document).ready(function() {
            // edit modal
            $(document).on('show.bs.modal', '#editConceptorModal', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const nama = button.data('nama');
                const noWhatsapp = button.data('no-whatsapp');
                const editModalTitle = $('#editModalTitle');
                const modal = $(this);
                const editForm = $('#editFormConceptor');

                modal.find('#nama').val(nama);
                modal.find('#no_whatsapp').val(noWhatsapp);
                editForm.attr('action', '{{ route('konseptor.update', ':id') }}'.replace(':id', id));

                editModalTitle.html(`Edit Konseptor ${nama}`);

            });

            // Delete Modal
            $(document).on('show.bs.modal', '#deleteConceptorModal', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const nama = button.data('nama');
                const modal = $(this);
                const deleteForm = $('#deleteFormConceptor');
                const deleteModalBody = $('#deleteModalBody');

                deleteForm.attr('action', '{{ route('konseptor.delete', ':id') }}'.replace(':id', id));
                deleteModalBody.html(
                    `Apakah anda yakin ingin menghapus <strong>${nama}</strong> sebagai konseptor`);

                modal.find('#nama').val(nama);
            });
        });
    </script>
@endpush

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Konseptor</h5>
                <span class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#conceptorModal">
                    <i class="bi bi-plus me-1"></i> Tambah Konseptor
                </span>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-nowrap text-center align-middle" scope="col">No</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Nama Konseptor</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Nomor Whatsapp</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conceptors as $index => $conceptor)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $conceptor->nama }}</td>
                                <td>{{ $conceptor->no_whatsapp }}</td>
                                <td class="text-nowrap text-center">
                                    <span class="badge bg-warning rounded pointer me-1" data-bs-toggle="modal"
                                        data-bs-target="#editConceptorModal" data-id="{{ $conceptor->id }}"
                                        data-nama="{{ $conceptor->nama }}" data-no-whatsapp="{{ $conceptor->no_whatsapp }}">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span class="badge bg-danger rounded pointer" data-bs-toggle="modal"
                                        data-bs-target="#deleteConceptorModal" data-id={{ $conceptor->id }}
                                        data-nama="{{ $conceptor->nama }}">
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
                        <h5 class="modal-title" id="conceptorModalLabel">Tambah Konseptor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('konseptor.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama" required>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp"
                                    placeholder="Masukkan no_whatsapp" required>
                                <label for="no_whatsapp">Nomor Whatsapp</label>
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
        <div class="modal fade" id="editConceptorModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form method="post" id="editFormConceptor">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama" required>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp"
                                    placeholders="Masukkan no_whatsapp" required>
                                <label for="no_whatsapp">Nomor Whatsapp</label>
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
        <div class="modal fade" id="deleteConceptorModal">
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
                        <form method="post" id="deleteFormConceptor">
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
