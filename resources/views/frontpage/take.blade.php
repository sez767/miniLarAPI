@section('take')

<section class="takeWithYou">
    <svg viewBox="0 0 500 150" preserveAspectRatio="none">
    <path d="M-4.30,74.30 C249.66,-22.16 257.56,-22.16 505.30,72.32 L500.00,0.00 L-0.00,0.00 Z"></path></svg>
    <div class="takeWithYouTitle">
        <h1>ВЗЯТИ З СОБОЮ</h1>
        <h1>В ДОРОГУ</h1>
    </div>
    <div class='container-fluid' >
        <ul class="list">
            @foreach($groupTakes as $key =>$tak)
            @if($key!='Для групи') 
            <li class="list__item">
                <div class="card">
                    <img class="card-img-top" src="/images/list/{{$key}}.png" alt="list-img">
                    <h4 class="card-title" >{{$key}}</h4>
                    <div class="card-body">
                        <ul>
                            @foreach($tak as $tk)
                                <li>{{$tk->value}}</li>
                            @endforeach 
                        </ul>
                    </div>
                </div>
            </li>
            @endif 
            @endforeach 
               
        </ul>
    </div>    
</section>
@show
