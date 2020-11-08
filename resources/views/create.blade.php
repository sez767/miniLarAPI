@extends('layouts.app')

<title>Приєднатись до заїзду</title>

@section('content')
<div class="mainpage" style="background-image: url(../storage/{{$arrival->id}}/main_image_1.png);height:100vh;">

    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-8 mx-auto register">
                <div class="bg-light p-5 rounded">

                    <form method="POST" action="{{ url('/create/'.$arrival->id) }}">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                        <div style="text-align:center;" class="registerHeader">
                            <h3>Для реєстрації на заїзд {{$arrival->name}}
                            </h3>
                            <h3>заповніть будь-ласка анкету</h3>
                        </div>
                        <div class="contain" style="margin-top: 20px ;">
                            <div class="row margin">
                                <label class="col-form-label text-md-right col-md-2">Ім'я</label>
                                <input type="text" name="name" id="name" class="form-control col-md-8"
                                    placeholder="Введіть ім'я" />
                            </div>
                        </div>
                        <div class="contain" style="margin-top: 20px ;">
                            <div class="row margin">
                                <label class="col-form-label text-md-right col-md-2">Прізвище</label>
                                <input type="text" name="surname" id="surname" class="form-control col-md-8"
                                    placeholder="Введіть прізвище" />
                            </div>
                        </div>
                        <div class="contain" style="margin-top: 20px ;">
                            <div class="row margin">
                                <label class="col-form-label text-md-right col-md-2">Номер телефону</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control col-md-8"
                                    placeholder="+38" />
                            </div>
                        </div>
                        <div class="contain" style="margin-top: 20px ;">
                            <div class="row margin">
                                <label class="col-form-label text-md-right col-md-2">Електронна адреса</label>
                                <input type="text" name="gmail" id="gmail" class="form-control col-md-8"
                                    placeholder="Електронну адресу" />
                            </div>
                        </div>
                        
                        

                        <div style="text-align: center; margin-top: 40px ;">
                            <button type="submit" class="btn btn-primary" :disabled="submiting">
                                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                                Приєднатись
                            </button>
                            <div class="btn btn-danger" onclick="location.href='/';">
                                На Головну
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection