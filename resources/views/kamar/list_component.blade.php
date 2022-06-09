@extends('kamar.list')

@section('list-kamar')
@if(isset($list_kamar))
@foreach($list_kamar as $kamar)
<div class="col-lg-3 col-sm-6">
    <div class="accomodation_item">
        <div class="hotel_img">
            <img src="{{ asset('image/room1.jpg') }}" alt="">
            <a href="{{ url('/admin/kamar/detail/' . $kamar['id']) }}" class="btn theme_btn button_hover" style="float: left; margin-bottom: 50px">Edit</a>
            <a href="{{ url('/admin/kamar/delete/' . $kamar['id']) }}" class="btn theme_btn button_hover">Delete</a>
        </div>
        <a href="{{ url('/admin/kamar/detail/' . $kamar['id']) }}"><h4 class="sec_h4">{{ $kamar['nama'] }}</h4></a>
        {{-- <h5>Rp {{ number_format($klasifikasi['harga'], 0) }}<small> | Qty : {{ $kamar['jumlah_kapasitas'] }}</small></h5> --}}
    </div>
</div>
@endforeach
@endif
@endsection
