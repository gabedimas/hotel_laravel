@include('layouts.header')
        {{-- @include('layouts.breadcrumb') --}}

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Room Management</h2>
                    <a href="{{ url('/admin/kamar/add') }}"><h4 class="primary-btn button_hover">Add</h4></a>
                </div>
                <div class="row accomodation_two">
                    @yield('list-kamar')
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        @include('layouts.footer')
