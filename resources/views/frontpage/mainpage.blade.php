@section('mainpage')
<section class="mainpage" id="app" 
    @if($closestArrival->name!=null)
     style="background-image: url(../storage/{{$closestArrival->id}}/main_image_1.png);"
    @else
     style="height: 100vh"
    @endif
    >
    <div class="main container-fluid center-block">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="nameblock center-block">
                    <h1>{{$tour->title}}</h1>
                    @if($closestArrival->name!=null)
                        <h1>{{$closestArrival->name}}</h1>
                        <p class="arrivalTime">{{ \Carbon\Carbon::parse($closestArrival->begin)->format('d.m')}}
                        - {{ \Carbon\Carbon::parse($closestArrival->end)->format('d.m Y')}}p.</p>
                      
                        <a href="{{ url('/create/'.$closestArrival->id) }}" class="btn btnAdd" >Приєднатись</a>
                    @else
                    <h1>Вибачте</h1>
                        <p class="arrivalTime">нажаль нові заїзди відсутні</p>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
            @if($closestArrival->name!=null)
                <div class="float-block">
                        <a class="linkbottom" href="https://www.facebook.com/sharer/sharer.php?u=https://relax.intita.com/{{$tour->id}}" target="_blank" onclick="return Share.me(this);">
                        <img src="/images/facebook.png" width="40" height="40"alt="" ></a>
                        <a class="linkbottom" target="_blank" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=[TITLE]&url=https://relax.intita.com/{{$tour->id}}" target="_blank" onclick="return Share.me(this);">
                        <img src="/images/twitter.png" width="40" height="40"alt="" ></a>
                        <a class="linkbottom" href="https://www.linkedin.com/cws/share?url=https://relax.intita.com/{{$tour->id}}" target="_blank" onclick="return Share.me(this);">
                        <img src="/images/linkedin.png" width="40" height="40"alt="" ></a>
                </div>
            @endif    
            </div>
        </div>
    </div>
    @if($closestArrival->name!=null)
        <svg viewBox="0 0 500 150" preserveAspectRatio="none">
        <path d="M-27.43,112.68 C140.18,236.70 362.52,-37.90 559.48,119.58 L500.00,149.60 L-0.00,149.60 Z" style="stroke: none;"></path></svg>
    @endif
</section>
@show