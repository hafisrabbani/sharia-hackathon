<div>
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @if ($status_create)
    <div class="card border-none">
        <div class="container">
            <button class="btn btn-secondary my-3" wire:click="cancelCreate()" style="width: 100%"><span class="text-white"><i class="fas fa-times"></i>&nbsp;&nbsp;Batal</span></button>
        </div>
    </div>

    <div class="card border-none mt-4 pt-3">
        <div class="container">
            <form wire:submit.prevent="createStore">
                <div class="form-group">
                    <label>Donasi Untuk : </label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi : </label>
                    <textarea rows="7" wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Selesai : </label>
                    <input type="date" wire:model="end" class="form-control @error('end') is-invalid @enderror">
                    @error('end')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" wire:model="image" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <span wire:loading wire:target="image" class="text-muted">Loading...</span>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Preview</p>
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
                        @endif
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
    @else
    <div class="card border-none">
        <div class="container">
            <button class="btn bg-blue my-3" wire:click="create()" style="width: 100%"><span class="text-white"><i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Donasi</span></button>
        </div>
    </div>
    <div class="card border-none mt-4 pt-3">
        <div class="container">
            @foreach ($data as $item)
            <a href="{{ route('client.donate.action',$item->id) }}">
                <div class="card mb-3 border-none shadow" style="max-width: 540px;">
                    <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="bg-img-card" style="background-image: url('{{ asset('storage/donation/'.$item->image) }}')">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-secondary">{{ $item->judul }}</h5>
                                <div class="row">
                                    <div class="col-12 text-truncate">
                                        <small class="text-secondary">
                                        {{ $item->user->name }}
                                        </small>
                                        <div class="progress mt-2" style="height: 10px">
                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">Rp 100.000</div>
                                            <div class="col-6">30 Hari lagi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a> 
            @endforeach
        </div>
    </div>
    @endif
</div>
