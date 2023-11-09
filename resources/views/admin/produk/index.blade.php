@extends('admin.layout.appadmin')
@section('content')


<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
        DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{url('admin/produk/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Min Stok</th>
                        <th>Jenis Produk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Min Stok</th>
                        <th>Jenis Produk</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- @php $no=1 @endphp -->
                    @foreach ($produk as $pr)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pr->kode}}</td>
                        <td>{{$pr->nama}}</td>
                        <td>{{$pr->harga_beli}}</td>
                        <td>{{$pr->harga_jual}}</td>
                        <td>{{$pr->stok}}</td>
                        <td>{{$pr->min_stok}}</td>
                        <td>{{$pr->jenis}}</td>
                        <td>
                            <a href="{{url('admin/produk/show/'.$pr->id)}}" class="btn btn-sm btn-info"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{url('admin/produk/edit/'.$pr->id)}}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$pr->id}}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$pr->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$pr->nama}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Close</button>
                                           <a href="{{url('admin/produk/delete/'.$pr->id)}}" class="btn btn-danger">Save changes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>

@endsection