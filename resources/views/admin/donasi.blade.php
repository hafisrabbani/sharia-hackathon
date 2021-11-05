@extends('admin.layout.main')
@section('title')
    verifikasi
@endsection
@section('page')
    Verifikasi Barang Lelang
@endsection
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Barang Lelang</h6>
    </div>
    <div class="card-body">
        @livewire('admin.donation')
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->


<script>
</script>
@endpush