@include('layouts.header')
        {{-- @include('layouts.breadcrumb') --}}

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Booking Approval List</h2>
                    <p>Please approve this room immediately</p>
                </div>
                <div class="row accomodation_two">
                    @yield('list-approval')
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        @include('layouts.footer')
