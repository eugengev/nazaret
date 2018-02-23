<script id="FirmasView-List" type="text/x-dot-template">
	<div class="text-right"><a href="#" class="btn btn-success js-add-firma">Додати Фырму</a></div>
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
				<td class="text-center">{{=value.tel}}</td>
				<td class='text-center'><a href="#" data-idfirma="{{=value.id}}" class="btn btn-success btn-sm js-edit-firma"><i data-idfirma="{{=value.id}}" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;<a href="#" data-idfirma="{{=value.id}}" class="btn btn-danger btn-sm js-delete-firma"><i class="fa fa-trash" data-idfirma="{{=value.id}}" aria-hidden="true"></i></a></td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
</script>

<script id="FirmaViewForm-Add" type="text/x-dot-template">
	<div class="card">
		<div class="card-body">
			<h1 class='text-center'>Нова Фірма виконавець</h1>
			<form id='js-add-firma-form'>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Коротка назва</span>
							</div>
							<input type="text" class="form-control" name="name" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Повна назва</span>
							</div>
							<input type="text" class="form-control" name="full_name" >
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
                                <span class="input-group-text">Адреса фіз.</span>
                            </div>
                            <input type="email" class="form-control"  name="adress" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адреса юр.</span>
                            </div>
                            <input type="email" class="form-control" name="adres_yur" >
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
							<input type="text" class="form-control"  name="tel" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Моб телефон</span>
							</div>
							<input type="text" class="form-control"  name="tel1" >
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
							<input type="text" class="form-control"  name="okpo" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Новер свідоцтва:</span>
							</div>
							<input type="text" class="form-control" name="svidot_nomer" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Дата реєстрації свідоцтва:</span>
							</div>
							<input type="text" class="form-control js-date"  name="tel1" data-id="date1" >
							<input type="hidden" id="date1" name="svidot_date" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Орган реєстрації:</span>
							</div>
							<input type="text" class="form-control"  name="svidot_organ" >
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
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-save-firma-form">Сохранит</a></div>
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-save-firma-cancel">Отменить</a></div>
		</div>
	</div>
</script>


<script id="FirmaViewForm-Edit" type="text/x-dot-template">
    <div class="card">
        <div class="card-body">
            <h1 class='text-center'>Корегування Фирма</h1>
            <form id='js-edit-firma-form'>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Коротка назва</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{=it.name}}" >
                            <input type="hidden" name="id" value="{{=it.id}}">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Повна назва</span>
                            </div>
                            <input type="text" class="form-control" name="full_name" value="{{=it.full_name}}" >
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
                                <span class="input-group-text">Адреса фіз.</span>
                            </div>
                            <input type="email" class="form-control"  name="adress" value="{{=it.adress}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адреса юр.</span>
                            </div>
                            <input type="email" class="form-control" name="adres_yur" value="{{=it.adres_yur}}" >
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
                            <input type="text" class="form-control"  name="tel" value="{{=it.tel}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="tel1" value="{{=it.tel1}}" >
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
                            <input type="text" class="form-control"  name="okpo" value="{{=it.okpo}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Новер свідоцтва:</span>
                            </div>
                            <input type="text" class="form-control" name="svidot_nomer" value="{{=it.svidot_nomer}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата реєстрації свідоцтва:</span>
                            </div>
                            <input type="text" class="form-control js-date" name="tel1" data-id="date1"  value="{{=it.svidot_date}}" >
                            <input type="hidden" id="date1" name="svidot_date" value="{{=it.svidot_date}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Орган реєстрації:</span>
                            </div>
                            <input type="text" class="form-control" name="svidot_organ" value="{{=it.svidot_organ}}" >
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
                            <input type="text" class="form-control" name="ras" value="{{=it.ras}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">МФО банку</span>
                            </div>
                            <input type="text" class="form-control" name="mfo" value="{{=it.mfo}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Назва банку</span>
                            </div>
                            <input type="text" class="form-control" name="bank" value="{{=it.bank}}" >
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-end text-center">
            <div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-edit-firma-form">Сохранит</a></div>
            <div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-edit-firma-cancel">Отменить</a></div>
        </div>
    </div>
</script>
