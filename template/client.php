<script id="ClientView-List" type="text/x-dot-template">
	<div class="text-right"><a href="#" class="btn btn-success js-add-client">Додати Фырму</a></div>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-sm">
			<thead>
			<tr class="text-center">
				<th>№</th>
				<th>Назвние</th>
				<th>Директор</th>
				<th>e-mail</th>
				<th>Телефон</th>
				<th>действия</th>
			</tr>
			</thead>
			<tbody>
			{{~it.items :value:itm}}
			<tr class="j-RepeatOrder-Items{{=value.id}}">
				<td class="text-center">{{=itm+1}}.</td>
				<td>{{=value.name}}</td>
				<td>{{=value.dir_fio}}</td>
				<td>{{=value.email}}</td>
				<td class="text-center">{{=value.phone}}</td>
				<td class='text-center'><a href="#" data-clientid="{{=value.id}}"  class="btn btn-success btn-sm js-edit-client"><i  data-clientid="{{=value.id}}"  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;<a href="#" data-clientid="{{=value.id}}" class="btn btn-danger btn-sm js-delete-client"><i class="fa fa-trash" data-clientid="{{=value.id}}" aria-hidden="true"></i></a></td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
</script>


<script id="ClientViewForm-Add" type="text/x-dot-template">
	<div class="card">
		<div class="card-body">
			<h1 class='text-center'>Новий Замовник</h1>
			<form id='js-add-client-form'>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Назва</span>
							</div>
							<input type="text" class="form-control" name="name" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Огр.Правова форма</span>
							</div>
							<input type="text" class="form-control" name="pravforma" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_pravforma" data-name="pravforma" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
						</div>
					</div>
				</div>
				<div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Посада керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_role" >
                        </div>
                    </div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Призвище Керівника</span>
							</div>
							<input type="text" class="form-control" name="dir_fio" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Головний бух.</span>
							</div>
							<input type="text" class="form-control" name="buh_fio" >
						</div>
					</div>
				</div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Діє на підставі</span>
                            </div>
                            <input type="text" class="form-control"  name="dover" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адреса фіз.</span>
                            </div>
                            <input type="text" class="form-control"  name="adres1" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адреса юр.</span>
                            </div>
                            <input type="text" class="form-control"  name="adres2" >
                        </div>
                    </div>
                </div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">e-mail</span>
							</div>
							<input type="email" class="form-control"  name="email" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Телефон</span>
							</div>
							<input type="text" class="form-control"  name="phone" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Моб телефон</span>
							</div>
							<input type="text" class="form-control"  name="phone1" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<h2 class='text-center'>Реквізити</h2>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">ЄДРПоУ</span>
							</div>
							<input type="text" class="form-control"  name="inn" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<h2 class='text-center'>Банк</h2>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Розразунковий номер</span>
							</div>
							<input type="text" class="form-control"  name="ras" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">МФО банку</span>
							</div>
							<input type="text" class="form-control"  name="mfo" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Назва банку</span>
							</div>
							<input type="text" class="form-control"  name="bank" >
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-end text-center">
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-save-client-form">Сохранит</a></div>
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-save-client-cancel">Отменить</a></div>
		</div>
	</div>
</script>


<script id="ClientViewForm-Edit" type="text/x-dot-template">
    <div class="card">
        <div class="card-body">
            <h1 class='text-center'>редагування Замовника</h1>
            <form id='js-edit-client-form'>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Назва</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{=it.name}}" >
                            <input type="hidden" name="id" value="{{=it.id}}">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Огр.Правова форма</span>
                            </div>
                            <input type="text" class="form-control" name="pravforma"  value="{{=it.pravforma}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Посада керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_role" value="{{=it.dir_role}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Призвище Керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_fio" value="{{=it.dir_fio}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Головний бух.</span>
                            </div>
                            <input type="text" class="form-control" name="buh_fio" value="{{=it.buh_fio}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Діє на підставі</span>
                            </div>
                            <input type="text" class="form-control"  name="dover" value="{{=it.dover}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адреса фіз.</span>
                            </div>
                            <input type="text" class="form-control"  name="adres1" value="{{=it.adres1}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адреса юр.</span>
                            </div>
                            <input type="text" class="form-control"  name="adres2" value="{{=it.adres2}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="email" value="{{=it.email}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone" value="{{=it.phone}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone1" value="{{=it.phone1}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class='text-center'>Реквізити</h2>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ЄДРПоУ</span>
                            </div>
                            <input type="text" class="form-control"  name="inn" value="{{=it.inn}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class='text-center'>Банк</h2>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Розразунковий номер</span>
                            </div>
                            <input type="text" class="form-control"  name="ras" value="{{=it.ras}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">МФО банку</span>
                            </div>
                            <input type="text" class="form-control"  name="mfo" value="{{=it.mfo}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Назва банку</span>
                            </div>
                            <input type="text" class="form-control"  name="bank" value="{{=it.bank}}" >
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-end text-center">
            <div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-edit-client-form">Сохранит</a></div>
            <div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-edit-client-cancel">Отменить</a></div>
        </div>
    </div>
</script>
