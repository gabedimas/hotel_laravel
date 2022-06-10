@include('layouts.header')
        {{-- @include('layouts.breadcrumb') --}}

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">User Management</h2>
                    <a href="{{ url('/admin/user_management/add') }}"><h4 class="primary-btn button_hover">Add</h4></a>
                </div>
                <div class="row accomodation_two">
                    @yield('list-user')
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        @include('layouts.footer')
