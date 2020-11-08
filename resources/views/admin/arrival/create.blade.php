@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.arrival.actions.create'))

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

		<arrival-form :action="'{{ url('admin/arrivals') }}'" v-cloak inline-template>


			<form :action="action" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="card-header">
					<i class="fa fa-plus"></i> Новий заїзд
				</div>

				<div class="card-body">
					@include('admin.arrival.components.form-elements')

					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Документи</label>
							<input type="text" name="items[1][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[1][type]" value="Документи" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Документи"
								data-nazva="Документи">Додати ще</div>
						</div>
					</div>
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Засоби Гігієни</label>
							<input type="text" name="items[2][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[2][type]" value="Засоби Гігієни" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Засоби Гігієни"
								data-nazva="Засоби Гігієни">Додати ще</div>
						</div>
					</div>
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Посуд</label>
							<input type="text" name="items[3][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[3][type]" value="Посуд" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Посуд"
								data-nazva="Посуд">Додати ще</div>
						</div>
					</div>
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Харчування</label>
							<input type="text" name="items[4][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[4][type]" value="Харчування" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Харчування"
								data-nazva="Харчування">Додати ще</div>
						</div>
					</div>
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Спорядження</label>
							<input type="text" name="items[5][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[5][type]" value="Спорядження" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Спорядження"
								data-nazva="Спорядження">Додати ще</div>
						</div>
					</div>
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Засоби захисту</label>
							<input type="text" name="items[6][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[6][type]" value="Засоби захисту" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Засоби захисту"
								data-nazva="Засоби захисту">Додати ще</div>
						</div>
					</div>
					<div class="contain">

						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Одяг та взуття</label>
							<input type="text" name="items[7][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[7][type]" value="Одяг та взуття" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Одяг та взуття"
								data-nazva="Одяг та взуття">Додати ще</div>
						</div>

					</div>
					<div class="contain">
						<div class="row margin">
							<label class="col-form-label text-md-right col-md-2">Для групи</label>
							<input type="text" name="items[8][value]" id="in" class="form-control col-md-8" />
							<input type="hidden" name="items[8][type]" value="Для групи" />
							<div id="addD" class="btn btn-success widthButton addrow" data-type="Для групи"
								data-nazva="Для групи">Додати ще</div>
						</div>
					</div>

					<br>
					<div class="container center-block">
						<div class="file-field">
							<div class="btn btn-primary ">
								<span>&check; Додайте <b>ДВА</b> фонових зображення</p></span>
								<input type="file" class="image" name="images[]" id="file-selector"
									accept=".jpg, .jpeg, .png">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate hide" type="text" placeholder="">
							</div>
						</div>
						<!-- <input type="file" class="image" name="images[]"  id="file-selector" > -->
					</div>
					<br><br>
					<p id="status">Ви можете повторно відредагувати фото клікнувши по ньому.</p>

					<div id="output" class="row containerImg"></div>
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