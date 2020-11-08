@section('forgroup')
<section class="forgrgoup" style="background-image: url(../storage/{{$closestArrival->id}}/main_image_2.png);">
    <svg viewBox="0 0 500 150" preserveAspectRatio="none">
    <path d="M-4.30,74.30 C249.66,-22.16 257.56,-22.16 505.30,72.32 L500.00,0.00 L-0.00,0.00 Z"></path></svg>
    <div class="container" >
        <div class="center-block grpblock" >
            <h1>ДЛЯ ГРУПИ</h1>
            <ul class="c-list clearfix">
            @foreach($groupTakes as $key =>$tak)
                @if($key == 'Для групи') 
                    @foreach($tak as $tk)
                      <li class="c-item">{{$tk->value}}</li>
                    @endforeach    
                @endif 
            @endforeach    
            </ul>
        </div>
    </div>   
    <svg id="groupsvg" viewBox="0 0 500 150" preserveAspectRatio="none" >
    <path d="M-27.43,112.68 C140.18,236.70 362.52,-37.90 559.48,119.58 L500.00,149.60 L-0.00,149.60 Z" style="stroke: none; fill: #B8A1FF"></path></svg>
</section>
@show