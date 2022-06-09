@extends('user_management.list')

@section('list-user')
@if(isset($list_user))
@foreach($list_user as $user)
<div class="col-lg-3 col-sm-6">
    <div class="accomodation_item">
        <div class="hotel_img">
            <img src="{{ asset('image/room1.jpg') }}" alt="">
            <a href="{{ url('/admin/user_management/detail/' . $user['id']) }}" class="btn theme_btn button_hover" style="float: left; margin-bottom: 50px">Edit</a>
            <a href="{{ url('/admin/user_management/delete/' . $user['id']) }}" class="btn theme_btn button_hover">Delete</a>
        </div>
        <a href="{{ url('/admin/user_management/detail/' . $user['id']) }}"><h4 class="sec_h4">{{ $user['nama'] }}</h4></a>
        <h5>{{ $user['role'] }}</h5>
    </div>
</div>
@endforeach
@endif
@endsection
