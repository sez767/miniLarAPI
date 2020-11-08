<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">ID</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
  <div>{{$person->id}}</div>
       
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('surname'), 'has-success': fields.surname && fields.surname.valid }">
    <label for="surname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Name</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>{{$person->name}}</div>
        <div v-if="errors.has('surname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('surname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone_number'), 'has-success': fields.phone_number && fields.phone_number.valid }">
    <label for="phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Surname</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>{{$person->surname}}</div>
        <div v-if="errors.has('phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gmail'), 'has-success': fields.gmail && fields.gmail.valid }">
    <label for="gmail" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Phone Number</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
       <div>{{$person->phone_number}}</div>
        <div v-if="errors.has('gmail')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gmail') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gmail'), 'has-success': fields.gmail && fields.gmail.valid }">
    <label for="gmail" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Gmail</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
       <div>{{$person->gmail}}</div>
        <div v-if="errors.has('gmail')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gmail') }}</div>
    </div>
</div>





