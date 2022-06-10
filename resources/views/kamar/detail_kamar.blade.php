@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        @if(Auth::user() != null && Auth::user()->role == 'admin')
                            <div class="comment-form">
                                <a href="{{ url('/admin/kamar/list') }}" class="primary-btn button_hover">< Back</a>
                                <h4>Add Room</h4>
                                <form action="/admin/kamar/submit" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group form-inline">
                                    <div class="form-group col-lg-12 col-md-12 name">
                                        Name :
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Suite Room">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group col-lg-12 col-md-12 name">
                                        <span> Room Classification : </span>
                                        <div class="input-group">
                                        <select class="wide" name="klasifikasi_id">
                                            <option value="" selected disabled>-- Select Classification --</option>
                                            @foreach($list_klasifikasi as $klasifikasi)
                                                <option value="{{ $klasifikasi['id'] }}">{{ $klasifikasi['nama'] }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
                            </div>
                        @else
                            @if(isset($detail_booking))
                                @foreach($detail_booking as $booking)
                                <div class="comment-form">
                                    <a href="{{ url('/accomodation') }}" class="primary-btn button_hover">< Back</a>
                                    <h4>Book Room</h4>
                                    <form action="/booking/submit" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group form-inline">
                                            <div class="form-group col-lg-12 col-md-12 name">
                                                Name :
                                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" class="form-control" id="kamar_id" name="kamar_id" value="{{ $booking->id }}">
                                                <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" value="{{ $booking->nama }}" readonly>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group col-lg-12 col-md-12 name">
                                                <span> Room Classification : </span>
                                                <div class="input-group">
                                                <select class="wide" name="klasifikasi_id" disabled>
                                                    @foreach($list_klasifikasi as $klasifikasi)
                                                        @if($klasifikasi['id'] == $booking->klasifikasi_id )
                                                            <option value="{{ $klasifikasi['id'] }} selected">{{ $klasifikasi['nama'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 name">
                                                <div class='input-group date' id='datetimepicker11'>
                                                    <input type='text' class="form-control" placeholder="Arrival Date" name="tanggal_awal"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 name">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' class="form-control" placeholder="Departure Date" name="tanggal_akhir"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Book this room">
                                    </form>
                                </div>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </section>
        <!--================Blog Area =================-->

        @include('layouts.footer')
