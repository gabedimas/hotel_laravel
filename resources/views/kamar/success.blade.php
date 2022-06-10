@include('layouts.header')

<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Your booking has been successfully submited</h2>
            <p>Please wait for the approval from room manager. Thank you.</p>
            <a href="{{ url('/accomodation') }}" class="primary-btn button_hover">< Back</a>
        </div>
    </div>
</section>

@include('layouts.footer')
