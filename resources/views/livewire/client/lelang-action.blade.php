<div>
    @foreach ($data as $item)
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @elseif(session()->has('gagal'))
        <div class="alert alert-danger" role="alert">
            {{ session('gagal') }}
        </div>
    @endif
    @php
        $day = strtotime($item->end) - strtotime(date('Y-m-d'));
        $day = $day / 86400;
    @endphp
        <div class="card border-none">
            <img src="{{ asset('/storage/lelang/'.$item->image) }}" class="img-fluid">
                <div class="container">
                    <h5 class="text-center">{{ $item->name }}</h5>
                    <div class="row">
                        <div class="col text-left">
                            <span>Rp. {{ number_format($high->harga) }}</span>
                        </div>
                        <div class="col text-right">
                            <span>{{ $day }} Hari lagi</span>
                        </div>
                    </div>
                    @if ($status_lelang)
                        <form class="mt-3" wire:submit.prevent="lelangStore">
                            <div class="form-group">
                                <label>Nominal Lelang</label>
                                <input type="text" class="form-control" wire:model="lelang">
                            </div>
                            <button class="btn bg-blue text-white mb-3" type="submit" style="width: 100%;"><b>Tawar Sekarang</b></button>
                        </form>
                        <button wire:click="showLelang()" class="btn btn-secondary mb-3" style="width: 100%"><span class="text-white"><b>Batal</b></span></button>
                    @else
                        <button wire:click="showLelang()" class="btn bg-blue mt-3 mb-3" style="width: 100%"><span class="text-white"><b>Tawar Sekarang</b></span></button>
                    @endif
            </div>
        </div>
        <div class="card pt-3 mt-4 border-none">
            <div class="container">
                <h5 class="text-center">Deskripsi</h5>
                <p class="mt-4">{{ $item->deskripsi }}</p>
            </div>
        </div>
        <div class="card pt-3 mt-4 border-none">
            <div class="container text-center">
                <h5 class="text-center">Penyelenggara Lelang</h5>
                <p class="mt-4"><i class="fas fa-user"></i> : {{ $item->user->username }}</p>
            </div>
        </div>
        @endforeach
</div>
