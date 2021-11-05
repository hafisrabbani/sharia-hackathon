<div>
    <div>
        {{-- The whole world belongs to you. --}}
        <div class="table-responsive">
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Batas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Batas</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->verifikasi === NULL)
                                    <span class="text-secondary">Belum Diverifikasi</span>
                                @elseif($item->verifikasi === 0)
                                    <span class="text-danger">Ditolak</span>
                                @else
                                    <span class="text-success">Diverifikasi</span>
                                @endif
                            </td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image{{ $item->id }}">
                                image
                              </button></td>
                            <td>{{ date('d-m-Y',strtotime($item->end)) }}</td>
                            <td>
                                <div class="text-center">
                                    @if ($item->status_verif === NULL)
                                    <button class="btn btn-success" wire:click="accept({{ $item->id }})"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-danger" wire:click="reject({{ $item->id }})"><i class="fas fa-times"></i></button>
                                    @else
                                    <span>Telah diverifikasi</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        {{-- modal image --}}
                        <div class="modal fade" id="image{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <img src="{{ asset('storage/lelang/'.$item->image) }}" class="img-thumbnail" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- end modal image --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
