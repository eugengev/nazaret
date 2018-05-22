
<script id="PodpisantsView-List" type="text/x-dot-template">
	<div class="text-right"><a href="#" class="btn btn-success js-add-podpisant">Додати Користувача</a></div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-sm">
			<thead>
			<tr class="text-center">
				<th>№</th>
				<th>ФИО</th>
				<th>e-mail</th>
				<th>роль</th>
				<th>действия</th>
			</tr>
			</thead>
			<tbody>
			{{~it.items :value:itm}}
			<tr class="j-RepeatOrder-Items{{=value.id}}">
				<td class="text-center">{{=itm+1}}.</td>
				<td>{{=value.fio}}</td>
				<td>{{=value.mail_podpisant}}</td>
				<td class="text-center">{{=value.role}}</td>
				<td class='text-center'><a href="#" class="btn btn-success btn-sm js-edit-podpisant"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;<a href="#" data-idpodpisant="{{=value.id}}" class="btn btn-danger btn-sm js-delete-podpisant"><i class="fa fa-trash" data-idpodpisant="{{=value.id}}" aria-hidden="true"></i></a></td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
</script>

<script id="PodpisantsViewForm-Add" type="text/x-dot-template">
	<div class="card">
		<div class="card-body">
			<h1 class='text-center'>Новий Користувач</h1>
			<form id='js-add-podpisant-form'>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Ф.И.О.</span>
							</div>
							<input type="text" class="form-control" name="fio" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Телефон</span>
							</div>
							<input type="text" class="form-control" name="login" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Пароль</span>
							</div>
							<input type="password" class="form-control" name="password" id="password" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Повтор пароля</span>
							</div>
							<input type="password" class="form-control" name="repassword" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">e-mail</span>
							</div>
							<input type="email" class="form-control"  name="mail_podpisant" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Роль</span>
							</div>
							<select name="role" class="form-control">
								<option value="m" selected>Менеджер</option>
								<option value="a">Администратор</option>
								<option value="d">Директор</option>
							</select>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-end text-center">
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-save-podpisant-form">Сохранит</a></div>
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-save-podpisant-cancel">Отменить</a></div>
		</div>
	</div>
</script>
