@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.arrival.actions.index'))

@section('body')

<arrival-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/arrivals') }}'" inline-template>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Заїзди
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        href="{{ url('admin/arrivals/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp;Додати
                        заїзд</a>
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        
                            <table class="table table-hover table-listing">
                                <thead >
                                    <tr>
                                        <td is='sortable'>Назва</td>
                                        <td is='sortable'>Назва туру</td>
                                        <td is='sortable'>Опис</td>
                                        <td is='sortable'>Початок</td>
                                        <td is='sortable'>Завершення</td>
                                        <td></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $arrival)
                                    <tr>
                                        <td>{{$arrival->name}}</td>
                                        <td>{{$arrival->tour->title}}</td>
                                        <td width="45%">{!! str_limit(strip_tags($arrival->description), $limit = 300,
                                            $end = '...') !!}</td>
                                        <td width="3%">{{ \Carbon\Carbon::parse($arrival->begin)->format('d/m/Y')}}</td>
                                        <td width="3%">{{ \Carbon\Carbon::parse($arrival->end)->format('d/m/Y')}}</td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info"
                                                        href="arrivals/{{$arrival->id}}/edit"
                                                        title="{{ trans('brackets/admin-ui::admin.btn.edit') }}"
                                                        role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" method="POST" action="arrivals/{{$arrival->id}}"
                                                    onclick="return confirm('Ви впевнені що хочете видалити даний заїзд');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger "><i
                                                            class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="display: table-cell">
                                            <div class="row">
                                                @foreach($arrival->images as $image)
                                                @if($image->filename!='main_image_1.png' &&
                                                $image->filename!='main_image_2.png')
                                                <image
                                                    src="{{asset('storage').'/'.$image->arrival->id.'_photos/'.$image->filename}}"
                                                    alt="1111111" height="70px" width="90px"
                                                    class="img-thumbnail img-fluid yey">
                                                    @endif
                                                    @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                


                        @endsection