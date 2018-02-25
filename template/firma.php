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
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Коротка назва</span>
							</div>
							<input type="text" class="form-control" name="name" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Повна назва</span>
							</div>
							<input type="text" class="form-control" name="full_name" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Посада керівника</span>
							</div>
							<input type="text" class="form-control" name="dir_role" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Призвище Керівника</span>
							</div>
							<input type="text" class="form-control" name="dir_fio" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Головний бух.</span>
							</div>
							<input type="text" class="form-control" name="buh_fio" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">e-mail</span>
							</div>
							<input type="email" class="form-control"  name="email" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Телефон</span>
							</div>
							<input type="text" class="form-control"  name="tel" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
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
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">ЄДРПоУ</span>
							</div>
							<input type="text" class="form-control"  name="okpo" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Номер свідоцтва:</span>
							</div>
							<input type="text" class="form-control" name="svidot_nomer" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Дата реєстрації свідоцтва:</span>
							</div>
							<input type="text" class="form-control js-date" data-id="#date1" >
							<input type="hidden" id="date1" name="svidot_date" >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Орган реєстрації:</span>
							</div>
							<input type="text" class="form-control"  name="svidot_organ" >
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
            {{~it.items :value:itm}}
            <h1 class='text-center'>Редагування Фирма - {{=value.name}}</h1>
            <br>
            <form id='js-edit-firma-form'>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Коротка назва</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{=value.name}}" >
                            <input type="hidden" name="idf" value="{{=value.id}}">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Повна назва</span>
                            </div>
                            <input type="text" class="form-control" name="full_name" value="{{=value.full_name}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Посада керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_role" value="{{=value.dir_role}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Призвище Керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_fio" value="{{=value.dir_fio}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Головний бух.</span>
                            </div>
                            <input type="text" class="form-control" name="buh_fio" value="{{=value.buh_fio}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="email" value="{{=value.email}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="tel" value="{{=value.tel}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="tel1" value="{{=value.tel1}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr class="text-center">
                                    <th colspan="9">Адреса фіз.</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Индекс</th>
                                    <th>Область</th>
                                    <th>Район</th>
                                    <th>тип.населен</th>
                                    <th>населеный пункт</th>
                                    <th>тип.улици</th>
                                    <th>улица</th>
                                    <th>дом</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr data-addid="{{=it.adf.id}}">
                                        <td><input type="text" class="form-control form-control-sm" name="zip" value="{{=it.adf.zip}}" ><input type="hidden" name="id" value="{{=it.adf.id}}"></td>
                                        <td><input type="text" class="form-control form-control-sm" name="oblast" value="{{=it.adf.oblast}}" ></td>
                                        <td><input type="text" class="form-control form-control-sm" name="raion" value="{{=it.adf.raion}}" ></td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" name="t_pynkt_f" data-name="t_pynkt" value="{{=it.adf.t_pynkt}}" >
                                                <div class="input-group-append">
                                                    <button class="btn js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm" name="pynkt" value="{{=it.adf.pynkt}}" ></td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" name="t_street_f"  data-name="t_street" value="{{=it.adf.t_street}}" >
                                                <div class="input-group-append">
                                                    <button class="btn js-modal-sprv" data-spr="s_street" data-name="t_street_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm" name="street" value="{{=it.adf.street}}" ></td>
                                        <td><input type="text" class="form-control form-control-sm" name="dom" value="{{=it.adf.dom}}" ></td>
                                        <td><a href="#" class="btn btn-success js-save-addr-firma-form"><i class="fa fa-save"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr class="text-center">
                                    <th colspan="9">Адреса юр.</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Индекс</th>
                                    <th>Область</th>
                                    <th>Район</th>
                                    <th>тип.населен</th>
                                    <th>населеный пункт</th>
                                    <th>тип.улици</th>
                                    <th>улица</th>
                                    <th>дом</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-addid="{{=it.ad2.id}}">
                                    <td><input type="text" class="form-control form-control-sm" name="zip" value="{{=it.ad2.zip}}" ><input type="hidden" name="id" value="{{=it.ad2.id}}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="oblast" value="{{=it.ad2.oblast}}" ></td>
                                    <td><input type="text" class="form-control form-control-sm" name="raion" value="{{=it.ad2.raion}}" ></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_pynkt_s" data-name="t_pynkt" value="{{=it.ad2.t_pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="pynkt" value="{{=it.ad2.pynkt}}" ></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_street_s"  data-name="t_street" value="{{=it.ad2.t_street}}" >
                                            <div class="input-group-append">
                                                <button class="btn js-modal-sprv" data-spr="s_street" data-name="t_street_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="street" value="{{=it.ad2.street}}" ></td>
                                    <td><input type="text" class="form-control form-control-sm" name="dom" value="{{=it.ad2.dom}}" ></td>
                                    <td><a href="#" class="btn btn-success js-save-addr-firma-form"><i class="fa fa-save"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
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
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ЄДРПоУ</span>
                            </div>
                            <input type="text" class="form-control"  name="okpo" value="{{=value.okpo}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Номер свідоцтва:</span>
                            </div>
                            <input type="text" class="form-control" name="svidot_nomer" value="{{=value.svidot_nomer}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата реєстрації свідоцтва:</span>
                            </div>
                            <input type="text" class="form-control js-date" data-id="#date1" name="d1" value="{{=value.svidot_date}}" >
                            <input type="hidden" id="date1" name="svidot_date" value="{{=value.svidot_date}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Орган реєстрації:</span>
                            </div>
                            <input type="text" class="form-control" name="svidot_organ" value="{{=value.svidot_organ}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class="text-center">Банки <button type="button" class="btn  btn-sm btn-success pull-right js-add-bank"><i class="fa fa-plus"></i></button></h2>
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Назва банку</th>
                                <th>МФО банку</th>
                                <th>Розразунковий рахунок</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody class="js-bank-table-row">

                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            {{~}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-end text-center">
            <div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-edit-firma-form">Сохранит</a></div>
            <div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-edit-firma-cancel">Отменить</a></div>
        </div>
    </div>
</script>

<script id="FirmaViewBanksList" type="text/x-dot-template">
    {{~it.items :value:itm}}
    <tr class="text-center">
        <td class="text-center">{{=itm+1}}.<input type="hidden" name="id" value="{{=value.id}}"><input type="hidden" name="type" value="{{=value.type}}"><input type="hidden" name="parent_id" value="{{=value.parent_id}}"></td>
        <td><input type="text" class="form-control form-control-sm" name="bank" value="{{=value.bank}}"></td>
        <td><input type="text" class="form-control form-control-sm" name="mfo" value="{{=value.mfo}}"></td>
        <td><input type="text" class="form-control form-control-sm" name="ras" value="{{=value.ras}}"></td>
        <td><a href="#" class="btn btn-success js-save-bank-firma"><i class="fa fa-save"></i></a></td>
    </tr>
    {{~}}
</script>