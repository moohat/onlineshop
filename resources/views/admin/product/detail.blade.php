
@extends('index')

@section("contentheader_title")
    Detail Produk {{ ucfirst($product->product) }}
@endsection

@section('customcss')
    <link rel="stylesheet" href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/datatables/jquery.dataTables.min.css') }}">
@endsection

@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm"> <span class="fa fa-angle-left"></span> Kembali</a>
            </div>
            <br>
           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product->imageRelation as $data)
                        <tr>
                            <td style="text-align: center;">{{ $loop->index + 1 }}</td>
                            <td>
                                <img src="{{ asset('public/uploads/'.$data->image) }}" alt="{{ $data->image }}" height="250px">
                            </td>
                        </tr>
                        @empty
                        <tr> <td colspan="2" style="text-align:center"> Gambar tidak ada </td></tr>
                        @endforelse
                    </tbody>
                </table>
           </div>
        </div>
        <!-- /.box-body -->
    </div>
<!-- /.box -->
@endsection
@section('customscript')
    <script type="text/javascript" src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection