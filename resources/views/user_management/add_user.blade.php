@include('layouts.header')

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="comment-form">
                            <a href="{{ url('/admin/user_management/list') }}" class="primary-btn button_hover">< Back</a>
                            <h4>Add User</h4>
                            <form action="/admin/user_management/submit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                        Name :
                                      <input type="text" class="form-control" id="nama" name="nama" placeholder="John Appleseed">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                        Email :
                                      <input type="email" class="form-control" id="email" name="email" placeholder="john.appleseed@gmail.com">
                                    </div>
                                  </div>
                                  <div class="form-group" style="text-align: left">
                                      Password :
                                      <input type="password" class="form-control" id="password" name="password">

                                      <label for="comment-name">Privilege Type : </label><br>
                                    <input type="radio" id="role" name="role" value="admin"> Admin</label><br>
                                    <label class="radio-inline">
                                    <input type="radio" id="role" name="role" value="manager"> Manager</label><br>
                                    <label class="radio-inline">
                                    <input type="radio" id="role" name="role" value="user"> User</label><br>
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
