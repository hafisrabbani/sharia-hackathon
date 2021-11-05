@extends('client.layout.layout')
@section('title')
    Donation Page
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @livewire('client.donation-action',['idAct' => $id])
                <br><br><br><br>
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