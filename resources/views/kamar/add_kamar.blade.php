@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
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
                    </div>
                </div>

            </div>
        </section>
        <!--================Blog Area =================-->

        @include('layouts.footer')
