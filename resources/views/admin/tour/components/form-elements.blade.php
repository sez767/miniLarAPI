<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Назва туру</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" maxlength="30" v-model="form.title" v-validate="'required|min:5'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="Назва">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Опис туру</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
        <!-- <!-- <div class="form-group shadow-textarea"> -->
            <textarea v-model="form.description" v-validate="'required|min:10'" class="form-control z-depth-1" id="description" name="description" rows="8" placeholder="Додайте інформацію про тур"></textarea>
        </div>
            <!-- <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div> -->
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>




