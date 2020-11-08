@section('momentsslider')
<section class="photos">
    <div class="container center" >
        <div class="center-block photosTitle" >
        <div><h1>ЯСКРАВІ МОМЕНТИ</h1><br> </div>
        <div class="image-caption"><h2>Фото минулих заїздів</h2></div>
        <br>
        </div>
        <div class="container ow">
        <div class="owl-carousel owl-theme owl-dot-inner slidertwo" >
            @foreach($tour->arrivals as $arrival)
                @foreach($arrival->images as $image)
                    @if($image->filename!="main_image_1.png" && $image->filename!="main_image_2.png")
                    <div class="sliderImg">
                        <img src="/storage/{{$image->arrival->id}}_photos/{{$image->filename}}"  title="{{$image->arrival->name}}" class="img-fluid" alt="111">
                    </div>
                    @endif
                @endforeach
            @endforeach
            @if($arrival->images->count()<3) 
            <div class="sliderImg">
                <img src="images/commingsoon.jpg"  title="{{$image->arrival->name}}" class="img-fluid" alt="111">
            </div>
            @endif
            
        </div>    
    </div>
    <svg  viewBox="0 0 500 150" preserveAspectRatio="none"">
    <path d="M-17.27,47.72 C218.06,158.94 259.82,-86.12 662.18,82.18 L500.00,0.00 L-0.00,0.00 Z" ></path></svg></div>
</section>
@show