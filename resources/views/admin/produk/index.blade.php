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