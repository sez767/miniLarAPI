@extends('brackets/admin-ui::admin.layout.default')
<title>Edit - {{$arrival->name}}</title>


@section('body')
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="container-xl">
	<div class="card">

		<arrival-form :action="'{{ $arrival->resource_url }}'" :data="{{ $arrival->toJson()}}" v-cloak inline-template>

			<form :action="action" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}


				<div class="card-header">
					<i class="fa fa-pencil"></i>Редагувння заїзду {{$arrival->name}}
				</div>

				<div class="card-body">
					@include('admin.arrival.components.form-elements')

					@foreach($arrival->takes as $take)
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">{{$take->item_type}}</label>
							<input type="text" name="items[{{$take->id}}][value]" id="in" class="form-control col-md-8"
								value="{{$take->value}}" />
							<input type="hidden" name="items[{{$take->id}}][type]" value="{{$take->item_type}}" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="{{$take->item_type}}"
								data-nazva="{{$take->item_type}}">Додати ще</div>
						</div>
					</div>
					@endforeach
					<div class="container center-block">
						<div class="file-field">
							<div class="btn btn-primary ">
								<p>&check; Додайте <b>ДВА</b> фонових зображення</p>
								<input type="file" class="image" name="images[]" id="file-selector"
									accept=".jpg, .jpeg, .png">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate hide" type="text" placeholder="">
							</div>
							<input type="file" class="image" name="images[]"  id="file-selector" >
						</div>
						<br><br>
						<p id="status">Ви можете повторно відредагувати фото клікнувши по ньому.</p>

						<div id="output" class="row containerImg">

							@foreach($arrival->images as $image)
							@if($image->filename =='main_image_1.png' || $image->filename =='main_image_2.png')
							<div class="containerDiv wrap">
								<img src="{{'data:image/png;base64,'.$image->filedata}}" class="smallImg img-thumbnail"
									alt="img">
								<input type=hidden class="input" name="hideimage[]"
									value="{{'data:image/png;base64,'.$image->filedata}}">
								<div class="btn btn-danger del">&times</div>
							</div>
							@endif
							@endforeach
						</div>
					</div>
					<div class="btn btn-primary ">
						<p>Завантажте фото заїзду</p>
						<input type="file" id="mult" name="photos[]" multiple accept=".jpg, .jpeg, .png">
					</div>
					<div id="output2" class="row containerImg"></div>
					<div class="row">
						@foreach($arrival->images as $image)
						@if($image->filename!='main_image_1.png' && $image->filename!='main_image_2.png')
						<div class="containerDiv wrap">
							<img src="{{'data:image/png;base64,'.$image->filedata}}" class="smallphoto img-thumbnail"
								alt="img">
							<input type=hidden class="input" name="hidephoto[]"
								value="{{'data:image/png;base64,'.$image->filedata}}">
							<div class="btn btn-danger del2">&times</div>
						</div>
						@endif
						@endforeach

					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary" :disabled="submiting">
						<i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
						Зберегти
					</button>
				</div>

			</form>

		</arrival-form>

	</div>

</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title" id="modalLabel">Виберіть розмір</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">×</span>

				</button>

			</div>

			<div class="modal-body">

				<div class="img-container">

					<div class="row">

						<div class="col-md-8">

							<img id="image" src="">

						</div>

						<div class="col-md-4">

							<div class="preview"></div>

						</div>

					</div>

				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>

				<button type="button" class="btn btn-primary" id="crop">Обрізати</button>

			</div>

		</div>

	</div>

</div>


</div>

</div>
@endsection