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
            <img src="{{ asset('/storage/donation/'.$item->image) }}" class="img-fluid">
                <div class="container">
                    <h5 class="text-center">{{ $item->judul }}</h5>
                    <div class="progress" style="height: 15px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="{{ $day }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row">
                        <div class="col text-left">
                            <span>Rp. {{ number_format($total) }}</span>
                        </div>
                        <div class="col text-right">
                            <span>{{ $day }} Hari lagi</span>
                        </div>
                    </div>
                    @if ($donate_status)
                        <form class="mt-3" wire:submit.prevent="donasiStore">
                            <div class="form-group">
                                <label>Nominal Donasi</label>
                                <input type="text" class="form-control" wire:model="donasi">
                            </div>
                            <button class="btn bg-blue text-white mb-3" type="submit" style="width: 100%;"><b>Donasi Sekarang</b></button>
                        </form>
                        <button wire:click="cancelDonate()" class="btn btn-secondary mb-3" style="width: 100%"><span class="text-white"><b>Batal</b></span></button>
                    @else
                        <button wire:click="showDonate()" class="btn bg-blue mt-3 mb-3" style="width: 100%"><span class="text-white"><b>Donasi Sekarang</b></span></button>
                    @endif
            </div>
        </div>
        <div class="card pt-3 mt-4 border-none">
            <div class="container">
                <h5 class="text-center">Deskripsi</h5>
                <p class="mt-4">{{ $item->deskripsi }}</p>
            </div>
        </div>
        @endforeach
</div>
