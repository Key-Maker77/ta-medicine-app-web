@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tabib Non Aktif</h6>
        </div>
        <div class="card-header py-3">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Id Tabib</th>
                            <th scope="col">Nama Tabib</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nomor Sertifikasi</th>
                            <th scope="col">Keahlian</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($nonaktif))
                        @foreach ($nonaktif as $data)
                        <tr>
                            <td scope="row">{{ $data -> id }}</td>
                            <td>{{ $data -> nama_tabib }}</td>
                            <td>{{ $data -> tanggal_lahir }}</td>
                            <td>{{ $data -> jenis_kelamin }}</td>
                            <td>
                                <img style="width: 100px; height: 100px;" src="{{ url('images/' . $data->gambar) }}" />
                            </td>
                            <td>{{ $data -> nomor_sertifikasi }}</td>
                            <td>{{ $data -> keahlian }}</td>
                            <td>{{ $data -> nomor_hp }}</td>
                            <td>
                                @if ($data->status == 0)
                                Aktif
                                @elseif ($data->status == 1)
                                Non Aktif
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#confirmAktifModal{{ $data->id }}">
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>

                            <!-- Modal konfirmasi mengaktifkan kembali tabib -->
                            <div class="modal fade" id="confirmAktifModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmAktifModalLabel{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmAktifModalLabel{{ $data->id }}">Konfirmasi Aktifkan Kembali Tabib</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin mengaktifkan kembali tabib ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-success" href="{{ route('tabibaktif', $data->id) }}">Ya, Aktifkan Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                        </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection