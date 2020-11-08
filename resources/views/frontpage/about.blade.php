@section('about')
    <section class="aboutPodoroz">
        <div class="center-block aboutTextbox">
            <h1>НАША ПОДОРОЖ</h1><br><br><br>
            <p>{{ strip_tags($closestArrival->description)}}</p>
        </div>
    </section>
@show