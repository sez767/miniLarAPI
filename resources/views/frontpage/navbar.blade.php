@section('navbar')
<nav class="full">
    <div clas="container" >
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm logo">
                <a href="/" ><img  src="/images/logo.png" alt="logo"></a>
            </div>
            <div class="col-sm-4 linkdiv" style="overflow-x: hidden" >
                <div class="owl-carousel sliderone" >
                @foreach($tours as $tr)
                    @if($tr->title!=$tour->title)
                    <div class="navButtons">
                        <a href="{{$tr->id}}">{{$tr->title}}</a>
                    </div>
                    @endif
                @endforeach
                    
                </div>
            </div>
            <div class="col-sm telephonDiv">
                <div class="row">
                   <div class="col-sm telNumber"><span>+38067 <b>431 74 24</b></span></div>
                   <div class="col-sm telNumber"><span>+38073 <b>209 97 43</b></span></div>     
                </div>
            </div>
            <div class="col-sm admin">

            </div>
          
        </div>
    </div>  
</nav>
<!-- mobile -->
<nav class="navbar navbar-dark bg-primary darken-4 mobile">

  <a class="navbar-brand ravlik" href="/" ><img src="/images/logo.png" alt="logo"></a>
      <div class="centerb" >
          <div class="col-sm mobtel"><span>+38067 <b>431 74 24</b></span></div>
          <div class="col-sm mobtel"><span>+38073 <b>209 97 43</b></span></div>     
      </div>
  <!-- Collapse button -->
  <button class="navbar-toggler velur" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
    aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse velur" id="navbarSupportedContent15">

    <!-- Links -->
    <ul class="navbar-nav mr-auto ">
      
    @foreach($tours as $tr)
        <li class="nav-item">
            <a href="{{$tr->id}}" class="navbutton text-center text-primary nav-link">{{$tr->title}}</a>
        </li>
    @endforeach
      
    </ul>
    <!-- Links -->
  </div>
 </nav>

@show
