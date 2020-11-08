@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-user.actions.index'))

@section('body')

    <admin-user-listing
        :data="{{ $data->toJson() }}"
        :activation="!!'{{ $activation }}'"
        :url="'{{ url('admin/admin-users') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>Адміністратори
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/admin-users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; Додати адміністратора</a>
                    </div>
                    <div class="card-body" v-cloak>
                      

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">{{ trans('admin.admin-user.columns.id') }}</th>
                                    <th is='sortable' :column="'first_name'">Ім'я</th>
                                    <th is='sortable' :column="'last_name'">Прізвище</th>
                                    <th is='sortable' :column="'email'">Електронна адреса</th>
                                    <th is='sortable' :column="'activated'" v-if="activation">{{ trans('admin.admin-user.columns.activated') }}</th>
                                    <th is='sortable' :column="'forbidden'">Адміністрування</th>
                                    
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td >@{{ item.id }}</td>
                                    <td >@{{ item.first_name }}</td>
                                    <td >@{{ item.last_name }}</td>
                                    <td >@{{ item.email }}</td>
                                    <td v-if="activation">
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].activated" @change="toggleSwitch(item.resource_url, 'activated', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td >
                                        <label class="switch switch-3d switch-danger">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].forbidden" @change="toggleSwitch(item.resource_url, 'forbidden', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            @can('admin.admin-user.impersonal-login')
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-success" v-show="item.activated" @click="impersonalLogin(item.resource_url + '/impersonal-login', item)" title="Impersonal login" role="button"><i class="fa fa-user-o"></i></button>
                                            </div>
                                            @endcan
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-warning" v-show="!item.activated" @click="resendActivation(item.resource_url + '/resend-activation')" title="Resend activation" role="button"><i class="fa fa-envelope-o"></i></button>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/admin-users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.new') }} AdminUser</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-user-listing>

@endsection
