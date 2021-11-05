<div>
    <div>
        {{-- The whole world belongs to you. --}}
        <div class="table-responsive">
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @if ($status_create === false && $status_edit === false)
                <span>
                    <button wire:click="createStatus()" class="btn btn-success"><i class="fas fa-plus"></i> Barang</button>
                </span>
            @elseif($status_create)
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" wire:model="name">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" rows="10" wire:model="deskripsi"></textarea>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" wire:model="harga">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" wire:model="image">
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" wire:model="action">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">SUBMIT</button>
                <button class="btn btn-secondary" type="button" wire:click="cancel()">Batal</button>
            </form>
            @endif
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Image</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Image</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id{{ $item->id }}">
                                    Image
                                </button>
                            </td>
                            <td>Rp. {{ number_format($item->harga) }}</td>
                            <td>
                                <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="id{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('/storage/market/'.$item->image) }}" alt="" class="img-thumbnail">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
