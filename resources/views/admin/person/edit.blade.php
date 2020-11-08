@extends('brackets/admin-ui::admin.layout.default')
<title>Перегляд - {{$person->name}}</title>


@section('body')

    <div class="container-xl">
        <div class="card">

            <person-form
                :action="'{{ $person->resource_url }}'"
                :data="{{ $person->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-eye"></i> Перегляд
                    </div>

                    <div class="card-body">
                        @include('admin.person.components.form-elements')
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" class="ok" :disabled="submiting">
                           
                            Ok
                        </button>
                    </div>
                    
                </form>

        </person-form>

        </div>
    
</div>

@endsection