@extends('management.list')

@section('list-approval')
@if(isset($list_approval))
@foreach($list_approval as $approval)
<div class="col-lg-3 col-sm-6">
    <div class="accomodation_item text-center">
        <div class="hotel_img">
            <img src="{{ asset('image/room1.jpg') }}" alt="">
            <a href="{{ url('/management/detail/'. $approval['id']) }}" class="btn theme_btn button_hover">Approve</a>
        </div>
        <a href="#"><h4 class="sec_h4">{{ $approval['nama_kamar'] }}</h4></a>
        <h5>$250<small>/night</small></h5>
    </div>
</div>
@endforeach
@endif
@endsection
