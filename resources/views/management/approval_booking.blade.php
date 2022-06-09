@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="comment-form">
                            <a href="{{ url('/management/list') }}" class="primary-btn button_hover">< Back</a>
                            <h4>Booking Approval</h4>
                            <form>
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="hidden" class="form-control" id="user_id" value="1">
                                    <input type="hidden" class="form-control" id="kamar_id" value="1">
                                    <input type="text" class="form-control" id="nama" value="Gabe Dimas" readonly>
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" value="Gabe Dimas" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_klasifikasi" value="Gabe Dimas" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_kamar" value="nama_kamar" readonly>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                      <input type="text" class="form-control" id="tanggal_awal" value="tanggal_awal" readonly>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                      <input type="text" class="form-control" id="tanggal_akhir" value="tanggal_akhir" readonly>
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="harga" value="Gabe Dimas" readonly>
                                </div>
                                <a href="#" class="primary-btn button_hover">Reject</a>
                                <a href="#" class="primary-btn button_hover">Approved</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--================Blog Area =================-->

        @include('layouts.footer')
