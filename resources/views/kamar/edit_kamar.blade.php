@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="comment-form">
                            <a href="{{ url('/admin/kamar/list') }}" class="primary-btn button_hover">< Back</a>
                            <h4>Edit Room</h4>
                            <form action="/admin/kamar/edit" method="POST" enctype="multipart/form-data">
                                @csrf

                                @foreach($detail_kamar as $kamar)
                                <div class="form-group form-inline">
                                    <input type="hidden" class="form-control" id="kamar_id" name="kamar_id" value="{{ $kamar['id'] }}">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                      Name :
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kamar['nama'] }}">
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 name">
                                      Room Classification :
                                      <div class="input-group">
                                        <select class="wide" name="klasifikasi_id">
                                            <option value="" selected disabled>-- Select Classification --</option>
                                            @foreach($list_klasifikasi as $klasifikasi)
                                               <option value="{{ $klasifikasi['id'] }}" {{ $klasifikasi['id'] == $kamar['klasifikasi_id'] ? "selected" : "" }}>{{ $klasifikasi['nama'] }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                  </div>
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
