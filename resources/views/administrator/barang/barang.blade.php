 @extends('layouts.app')
 @section('title','Barang')
 @section('judul','Data Barang')
 @section('content')
 <div>
    <a href="" class="btn btn-primary" id="tambah" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Tambah Barang</a>
 </div>
                <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Qty</th>
                                        <th>Jenis</th>
                                        <th>BV</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $datas)
                                    @if($datas->users_id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $datas->nama_produk }}</td>
                                        <td class="text-bold-500">{{ $datas->qty }}</td>
                                        <td>{{ $datas->jenis }}</td>
                                        <td>{{ $datas->bv }}</td>
                                        <td>
                                            @foreach($datas->detail as $t)
                                               @currency($t->harga)
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="#" class="badge bg-primary Update" data-bs-toggle="modal" data-bs-target="#update" data-id="{{ $datas->id }}">Update</a>
                                            <a href="{{ route('barang.delete', $datas->id) }}" class="badge bg-danger Delete">Delete</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody> 
                            </table>
                        </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable"role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Tambah Data
                                </h5>
                            </div>
                        <div class="modal-body">
                            <div class="row">
                                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id">
                                            <input type="hidden" name="produk_id" id="produk_id">
                                            <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id}}">
                                            <label for="roundText">Nama Barang</label>
                                            <input type="text" name="nama_produk" id="nama_produk" class="form-control round" placeholder="Nama Barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="squareText">Qty</label>
                                            <input type="number" name="qty" id="qty" class="form-control square" placeholder="Qty" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="squareText">Jenis</label>
                                            <input type="text" name="jenis" id="jenis" class="form-control square"
                                                placeholder="Contoh : Makanan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="squareText">BV</label>
                                            <input type="number" name="bv" id="bv" class="form-control square"
                                                placeholder="Poin BV" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="squareText">Harga</label>
                                            <input type="text" name="harga" id="harga" class="form-control square" placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light-secondary"data-bs-dismiss="modal">Close
                                        </button>
                                    <button type="submit" name="submit" class="btn btn-primary btnUpdate">Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection