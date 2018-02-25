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
						<div class="input-group input-group-sm mb-3">
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
                                <span class="input-group-text">Розразунковий рахунок</span>
                            </div>
                            <input type="text" class="form-control"  name="ras" value="" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">МФО банку</span>
                            </div>
                            <input type="text" class="form-control"  name="mfo" value="" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Назва банку</span>
                            </div>
                            <input type="text" class="form-control"  name="bank" value="" >
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
                            <input type="text" class="form-control" name="name" value="{{=it.client.name}}" >
                            <input type="hidden" name="idc" value="{{=it.client.id}}">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Огр.Правова форма</span>
                            </div>
                            <input type="text" class="form-control" name="pravforma"  value="{{=it.client.pravforma}}" >
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
                            <input type="text" class="form-control" name="dir_role" value="{{=it.client.dir_role}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Призвище Керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_fio" value="{{=it.client.dir_fio}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Головний бух.</span>
                            </div>
                            <input type="text" class="form-control" name="buh_fio" value="{{=it.client.buh_fio}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Діє на підставі</span>
                            </div>
                            <input type="text" class="form-control"  name="dover" value="{{=it.client.dover}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="email" value="{{=it.client.email}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone" value="{{=it.client.phone}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone1" value="{{=it.client.phone1}}" >
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
                        <h2 class='text-center'>Банк</h2>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ЄДРПоУ</span>
                            </div>
                            <input type="text" class="form-control"  name="inn" value="{{=it.client.inn}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Розразунковий рахунок</span>
                            </div>
                            <input type="text" class="form-control"  name="ras" value="{{=it.client.ras}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">МФО банку</span>
                            </div>
                            <input type="text" class="form-control"  name="mfo" value="{{=it.client.mfo}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Назва банку</span>
                            </div>
                            <input type="text" class="form-control"  name="bank" value="{{=it.client.bank}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class='text-center'>Доставка</h2>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr class="text-center">
                                    <th colspan="9">Адреса доставкі УкрПОчти.</th>
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
                                <tr data-addid="{{=it.ady.id}}">
                                    <td><input type="text" class="form-control form-control-sm" name="zip" value="{{=it.ady.zip}}" ><input type="hidden" name="id" value="{{=it.ady.id}}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="oblast" value="{{=it.ady.oblast}}" ></td>
                                    <td><input type="text" class="form-control form-control-sm" name="raion" value="{{=it.ady.raion}}" ></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_pynkt_f" data-name="t_pynkt" value="{{=it.ady.t_pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="pynkt" value="{{=it.ady.pynkt}}" ></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_street_f"  data-name="t_street" value="{{=it.ady.t_street}}" >
                                            <div class="input-group-append">
                                                <button class="btn js-modal-sprv" data-spr="s_street" data-name="t_street_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="street" value="{{=it.ady.street}}" ></td>
                                    <td><input type="text" class="form-control form-control-sm" name="dom" value="{{=it.ady.dom}}" ></td>
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
                                    <th colspan="6">Адреса Новая Почты.</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Область</th>
                                    <th>Район</th>
                                    <th>тип.населен</th>
                                    <th>населеный пункт</th>
                                    <th>номер Отделение</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-addid="{{=it.adn.id}}">
                                    <td><input type="hidden" name="id" value="{{=it.adn.id}}"><input type="text" class="form-control form-control-sm" name="oblast" value="{{=it.adn.oblast}}" ></td>
                                    <td><input type="text" class="form-control form-control-sm" name="raion" value="{{=it.adn.raion}}" ></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_pynkt_s" data-name="t_pynkt" value="{{=it.adn.t_pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="pynkt" value="{{=it.adn.pynkt}}" ></td>
                                    <td><input type="text" class="form-control form-control-sm" name="street" value="{{=it.adn.street}}" ></td>
                                    <td><a href="#" class="btn btn-success js-save-addr-firma-form"><i class="fa fa-save"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
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
