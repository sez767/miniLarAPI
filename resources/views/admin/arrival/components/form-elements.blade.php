
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Назва</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="Введіть назву заїзду">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Опис</label>
     <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="form-group shadow-textarea">
            <wysiwyg v-model="form.description" rows="13" cols="111" style="border-color: #b9c8de;" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('begin'), 'has-success': fields.begin && fields.begin.valid }">
    <label for="begin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Початок</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.begin" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('begin'), 'form-control-success': fields.begin && fields.begin.valid}" id="begin" name="begin" ></datetime>
        </div>
        <div v-if="errors.has('begin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('begin') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Завершення</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}" id="end" name="end" ></datetime>
        </div>
        <div v-if="errors.has('end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tour_id'), 'has-success': fields.tour_id && fields.tour_id.valid }">
    <label for="tour_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Назва туру</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.tour_id" v-validate="'required'" @input="validate($event)" 
        class="form-control" :class="{'form-control-danger': errors.has('tour_id'), 'form-control-success': fields.tour_id && fields.tour_id.valid}"
         id="tour_id" name="tour_id">
        @foreach($tours as $tour)
        <option value="{{$tour->id}}">{{$tour->title}}</option>
        @endforeach
		</select>
		<div v-if="errors.has('tour_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tour_id') }}</div>
    </div>
	</div>

  



