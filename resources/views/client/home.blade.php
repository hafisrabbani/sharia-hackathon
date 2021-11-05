@extends('client.layout.layout')
@section('title')
    Home Page | Bid For Heaven
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card border-none">
                    <div class="card-body">
                        <div class="cc">
                            @foreach ($user as $item)
                                <h5 class="pt-4 text-white"><i class="fas fa-user-circle"></i> {{ $item->username }}</h5>
                                <small class="text-white">Saldo Anda</small>
                                <h3 class="text-center text-white">Rp. {{ number_format($item->saldo) }}</h3>
                                <div class="row text-white pt-3 pb-3">
                                    <div class="col text-center">
                                        <h3>
                                            <i class="fas fa-plus-circle"></i><br>
                                        </h3>
                                        <small>Topup</small>
                                    </div>
                                    <div class="col text-center">
                                        <h3>
                                            <i class="fas fa-history"></i><br>
                                        </h3>
                                        <small>Riwayat Donasi</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="card border-none mt-4">
                    <div class="card-body">
                        <h4>Donasi Populer</h4>
                        <div class="scroll">
                            <div class="row">
                                @foreach ($donasi as $item)  
                                @php
                                    $day = strtotime($item->end) - strtotime(date('Y-m-d'));
                                    $day = $day / 86400;
                                @endphp  
                                        <div class="col-8">
                                            <div class="card border-none shadow">
                                                <a href="{{ route('client.donate.action',$item->id) }}">
                                                    <div class="bg-img-card" style="background-image: url('{{ asset('/storage/donation/'.$item->image) }}')"></div>
                                                </a>
                                                <div class="card-body">
                                                    <p class="card-text"><b>{{ $item->judul }}</b></p>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <small>
                                                                @foreach ($total as $t)
                                                                    @if ($item->id === $t->id)
                                                                        Rp. {{ number_format($t->total) }}
                                                                    @endif
                                                                @endforeach
                                                            </small>
                                                        </div>
                                                        <div class="col text-right">
                                                            <small>{{ $day }} hari lagi</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-none mt-4">
                    <div class="card-body">
                        <h4>Lelang Populer</h4>
                        <div class="scroll">
                            <div class="row">
                                @foreach ($lelang as $item)
                                @php
                                    $day = strtotime($item->end) - strtotime(date('Y-m-d'));
                                    $day = $day / 86400;
                                @endphp
                                    <div class="col-8">
                                        <div class="card border-none shadow">
                                            <div class="bg-img-card" style="background-image: url('{{ asset('/storage/lelang/'.$item->image) }}')"></div>
                                            <div class="card-body">
                                                <p class="card-text"><b>{{ $item->name }}</b></p>
                                                <div class="row">
                                                    <div class="col text-left">
                                                        @if ($item->id == $high->bid_id)
                                                            <small>Saat ini : Rp. {{ number_format($high->harga) }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="col text-right">
                                                        <small>{{ $day }} hari lagi</small>
                                                    </div>
                                                </div>
                                                <div class="text-right mt-2">
                                                <a href="{{ route('client.lelang.action',$item->id) }}" class="btn btn-primary">Tawar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-none mt-4">
                    <div class="card-body">
                        <h4>Produk UMKM</h4>
                        <div class="scroll">
                            <div class="row">
                                @foreach ($pasar as $item)
                                    <div class="col-8">
                                        <div class="card border-none shadow">
                                            <div class="bg-img-card" style="background-image: url('{{ asset('storage/market/'.$item->image) }}')"></div>
                                            <div class="card-body">
                                                <p class="card-text"><b>{{ $item->nama }}</b></p>
                                                <div class="row">
                                                    <div class="col text-left">
                                                        <small>Rp. {{ number_format($item->harga) }}</small>
                                                    </div>
                                                    <div class="col text-right">
                                                        <a href="{{ $item->action }}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Beli</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5"></div>
                {{-- bottom nav --}}
                  <nav class="navbar-expand navbar navbar-light bg-light fixed-bottom">
                    <ul class="navbar-nav mx-auto" style="display: inline-flex !important">
                        <li class="nav-item active mx-4">
                          <a class="nav-link" href="{{ route('client.index') }}"><h3><i class="fas fa-home text-secondary"></i></h3></a>
                        </li>
                        <li class="nav-item active mx-4">
                          <a class="nav-link" href="{{ route('client.lelang') }}"><h3><i class="fas fa-gavel text-secondary"></i></h3></a>
                        </li>
                        <li class="nav-item active mx-4">
                          <a class="nav-link" href="{{ route('client.donate') }}"><h3><i class="fas fa-hand-holding-usd text-secondary"></i></h3></a>
                        </li>
                        <li class="nav-item active mx-4">
                          <a class="nav-link" href="#"><h3><i class="fas fa-user text-secondary"></i></h3></a>
                        </li>
                      </ul>
                  </nav>                  
                {{-- end bottom nav --}}
            </div>
        </div>
    </div>
    
@endsection