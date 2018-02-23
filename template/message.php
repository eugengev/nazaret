
<script id="MessageView-List" type="text/x-dot-template">
	<div class="text-right"><a href="#" class="btn btn-success js-new-message">Написати повідомлення</a></div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-sm">
			<thead>
			<tr class="text-center">
				<th>№</th>
				<th>От кого</th>
				<th>Кому</th>
				<th>Дата</th>
				<th>Время</th>
				<th>Сообщение</th>
				<th>действия</th>
			</tr>
			</thead>
			<tbody>
			{{~it.items :value:itm}}
			<tr class="j-RepeatOrder-Items{{=value.id}}">
				<td class="text-center">{{=itm+1}}.</td>
				<td>{{=value.fromname}}</td>
				<td>{{=value.toname}}</td>
				<td>{{=value.date}}</td>
				<td>{{=value.time}}</td>
				<td class="text-left">{{=value.message}}</td>
				<td class='text-center'>
					<a href="#" data-idmesage="{{=value.id}}" class="btn btn-success btn-sm js-view-message"><i class="fa fa-eye"  data-idmesage="{{=value.id}}" aria-hidden="true"></i></a>&nbsp;<a href="#" data-idmesage="{{=value.id}}" class="btn btn-danger btn-sm js-delete-message"><i class="fa fa-trash" data-idmesage="{{=value.id}}" aria-hidden="true"></i></a>
				</td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
</script>

<script id="MessageForm-New" type="text/x-dot-template">
	<div class="card">
		<div class="card-body">
			<h1 class='text-center'>Нове повідомлення</h1>
			<form id='js-new-message-form'>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Кому</span>
							</div>
							<select multiple  name="user_id_to" class="form-control">
								{{~it.items :value:itm}}
								<option value="{{=value.id}}">{{=value.fio}}</option>
								{{~}}
							</select>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Повідомлення</span>
							</div>
							<textarea name="message" class="form-control" rows="5"></textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-end text-center">
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-save-message">Отправить</a></div>
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-show-message">Отменить</a></div>
		</div>
	</div>
</script>

<script id="NewMessageView-List" type="text/x-dot-template">
	{{~it.items :value:itm}}
	<li><a rel="nofollow" href="#" class="dropdown-item d-flex">
			<div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
			<div class="msg-body">
				<h3 class="h5">{{=value.fromname}}</h3><span>Отправил вам сообщение</span><small>{{=value.dayago}}</small>
			</div></a></li>
	{{~}}
	<li><a rel="nofollow" href="#" id="js-all-message" class="dropdown-item all-notifications text-center"><strong><i class="fa fa-envelope"></i>Посмотреть все сообщения</strong></a></li>
</script>

<script id="MessageView-Parent" type="text/x-dot-template">
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-sm">
			<thead>
			<tr class="text-center">
				<th>От кого</th>
				<th>Кому</th>
				<th>Дата</th>
				<th colspan="2">Время</th>
			</tr>
			<tr>
				<th class="text-center" colspan="5">Сообщение</th>
			</tr>
			</thead>
			<tbody>
			{{~it.items :value:itm}}
			<tr class="text-center j-RepeatOrder-Items{{=value.id}}">
				<th>{{=value.fromname}}</th>
				<th>{{=value.toname}}</th>
				<th>{{=value.date}}</th>
				<td>{{=value.time}}</td>
				<td>{{=value.dayago}}</td>
			</tr>
			<tr>
				<td  colspan="5" class="text-left">{{=value.message}}</td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
	<div class="card">
		<div class="card-body">
			<h1 class='text-center'>Ответить</h1>
			<form id='js-new-message-form'>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Повідомлення</span>
							</div>
							<textarea name="message" class="form-control" rows="5"></textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-end text-center">
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-save-message">Ответить</a></div>
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-show-message">Отменить</a></div>
		</div>
	</div>
</script>