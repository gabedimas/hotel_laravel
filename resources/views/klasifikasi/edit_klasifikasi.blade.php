@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="comment-form">
                            <a href="{{ url('/admin/klasifikasi/list') }}" class="primary-btn button_hover">< Back</a>
                            <h4>Edit Room Classification</h4>
                            <form action="/admin/klasifikasi/edit" method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach($detail_klasifikasi as $klasifikasi)
                                <input type="hidden" class="form-control" id="klasifikasi_id" name="klasifikasi_id" value="{{ $klasifikasi['id']}}">
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                      Name :
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $klasifikasi['nama']}}">
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 name">
                                      Room Capacity :
                                    <input type="number" class="form-control" id="jumlah_kapasitas" name="jumlah_kapasitas" value="{{ $klasifikasi['jumlah_kapasitas'] }}">
                                  </div>
                                </div>
                                <div class="form-group" style="text-align: left">
                                    Price :
                                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $klasifikasi['harga'] }}">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--================Blog Area =================-->

        @include('layouts.footer')
