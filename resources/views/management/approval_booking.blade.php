@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="comment-form">
                            <a href="{{ url('/management/list') }}" class="primary-btn button_hover">< Back</a>
                            <h4>Booking Approval</h4>
                            <form action="/management/approve" method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach($detail_approval as $approval)
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="hidden" class="form-control" id="booking_id" name="booking_id" value="{{ $approval->id }}">
                                    <input type="hidden" class="form-control" id="user_id" value="{{ $approval->user_id }}">
                                    <input type="hidden" class="form-control" id="kamar_id" value="{{ $approval->kamar_id }}">
                                    <input type="text" class="form-control" id="nama" value="{{ $approval->nama_user }}" readonly>
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" value="{{ $approval->email }}" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_klasifikasi" value="{{ $approval->nama_klasifikasi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_kamar" value="{{ $approval->nama_kamar }}" readonly>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                      <input type="text" class="form-control" id="tanggal_awal" value="{{ $approval->tanggal_awal }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                      <input type="text" class="form-control" id="tanggal_akhir" value="{{ $approval->tanggal_akhir }}" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group" style="text-align: left">
                                    <label for="comment-name">What should we do? </label><br>
                                  <input type="radio" id="status" name="status" value="APPROVED"> Approve</label><br>
                                  <label class="radio-inline">
                                  <input type="radio" id="status" name="status" value="REJECTED"> Reject</label><br>
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
