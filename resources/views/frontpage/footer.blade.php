@section('footer')
<section class="footer" style="background-image: url(../storage/{{$closestArrival->id}}/main_image_1.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="/" class="footerLogo"><img src="/images/logo.png" alt="logo"></a>
            </div>
            <div class="col-md-2 footerText">
                <span>+38067<b>4317424</b></span>
                <span>info@intita.com</span>
            </div>
            <div class="col-md-4">
                <button onclick="location.href='{{ url('/create/'.$closestArrival->id) }}'" class="btn btnAdd footerBottom" >Приєднатись</button>
            </div>
            <div class="col-md-4 footerLinks">
                <a class="linkbottom" target="_blank" href="https://www.facebook.com/pages/INTITA/320360351410183"><img src="/images/facebook-b.png" width="20" height="40"alt=""></a>
                <a class="linkbottom" target="_blank" href="https://twitter.com/INTITA_EDU"> <img src="/images/twitter-b.png" width="40" height="40" alt="" ></a>
                <a class="linkbottom" target="_blank" href="https://www.instagram.com/intitaedu/"><img src="/images/instagram-b.png" width="40" height="40"alt=""></a>
            </div>
        </div>
    </div>
</section>
@show