@extends('brackets/admin-ui::admin.layout.default')

<title>Коритсувачі</title>

@section('body')

    <person-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/people') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Коритсувачі
  
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                           

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>
                                        
                                        <th is='sortable' :column="'id'">ID</th>
                                        <th is='sortable' :column="'gmail'">Тур</th>
                                        <th is='sortable' :column="'gmail'">Заїзд</th>
                                        <th is='sortable' :column="'name'">Ім'я</th>
                                        <th is='sortable' :column="'surname'">Прізвище</th>
                                        <th is='sortable' :column="'phone_number'">Номер телефону</th>
                                        <th is='sortable' :column="'gmail'">Електронна адреса</th>
                                       

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="7">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/people')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/people/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in collection.slice().reverse()" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                      <td>
                                            <div v-if="item.new == 1"><span class="fat"> @{{ item.id }}</span></div>
                                            <div v-else><span>@{{ item.id }}</span></div>
                                        </td>
                                        <td>
                                            <div v-if="item.new == 1"><span class="fat">@{{ item.tour_name}}</span></div>
                                            <div v-else><span>@{{ item.tour_name }}</span></div>
                                        </td>
                                        <td>
                                            <div v-if="item.new == 1"><span class="fat">@{{ item.arrival_name}}</span></div>
                                            <div v-else><span>@{{ item.arrival_name }}</span></div>
                                        </td>
                                        <td>
                                            <div v-if="item.new == 1"><span class="fat">@{{ item.name }}</span></div>
                                            <div v-else><span>@{{ item.name }}</span></div>
                                        </td>

                                        <td>
                                            <div v-if="item.new == 1"><span class="fat">@{{ item.surname }}</span></div>
                                            <div v-else><span>@{{ item.surname }}</span></div>
                                        </td>

                                        <td>
                                            <div v-if="item.new == 1"><span class="fat">@{{ item.phone_number }}</span></div>
                                            <div v-else><span>@{{ item.phone_number }}</span></div>
                                        </td>

                                        <td>
                                            <div v-if="item.new == 1"><span class="fat">@{{ item.gmail }}</span></div>
                                            <div v-else><span>@{{ item.gmail }}</span></div>
                                        </td>
                                       

                                        
                                        
                                       
                                        
                                            
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class=" btn-sm btn-spinner btn btn-warning" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i  ><i class="fa fa-eye" ></i></a></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            
                                    <pagination></pagination>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </person-listing>

@endsection