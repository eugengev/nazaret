
<script id="ReestrFormView-List" type="text/x-dot-template">
	<div class="text-right"><a href="#" class="btn btn-success btn-sm js-add-new-order"><i class="fa fa-plus"></i> Новий договір</a></div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-sm">
			<thead>
			<tr class="text-center">
				<th>№ Договора</th>
				<th>ДАТА</th>
				<th>Банк</th>
				<th>Город</th>
				<th>Мета</th>
				<th>Виконавець</th>
				<th>Дата оценки</th>
				<th>Дія</th>
			</tr>
			</thead>
			<tbody>
			{{~it.items :value:itm}}
			<tr class="js-Reestr-Item{{=value.id}}">
				<td class="text-center">{{=value.nomber}}</td>
				<td>{{=value.date}}</td>
				<td>{{=value.bank}}</td>
				<td>{{=value.city}}</td>
				<td>{{=value.meta}}</td>
				<td>{{=value.firma}}</td>
				<td>{{=value.datework}}</td>
				<td class='text-center'>
                    <a href="#" class="btn btn-success btn-sm js-viewedit-reestr-item" data-id="{{=value.id}}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                    <a href="#" class="btn btn-primary btn-sm js-edit-reestr-item" data-id="{{=value.id}}"><i class="fa fa-align-justify"></i></a>&nbsp;
                    <a href="#" class="btn btn-danger btn-sm js-delete-reestr-item" data-id="{{=value.id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
            {{~it.page :value:itm}}
                <li class="page-item"><a class="page-link js-reestr-page-show" data-page="{{=value}}" href="#">{{=value+1}}</a></li>
            {{~}}
		</ul>
	</nav>
</script>

<script id="ReestrFormView-AddFirst" type="text/x-dot-template">
	<div class="card">
		<div class="card-body">
			<h1 class='text-center'>нове замовлення</h1>
			<form id='js-add-form-info-first'>
                <div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Фірма виконавець</span>
							</div>
							<input type="text" class="form-control js-auto-firma" name="firma" >
							<div class="input-group-append">
								<button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_firma" data-name="firma" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
                </div>
                <div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Номер Договору</span>
							</div>
							<input type="text" class="form-control" name='nomber' >
                            <input type="hidden" name='cifr_nomer' >
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Старbй yомер Договору</span>
							</div>
							<input type="text" class="form-control" name="old_nomber" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Дата Договору</span>
							</div>
							<input type="text" class="form-control js-date" data-id="#date" >
							<input type="hidden" name="date" id="date">
						</div>
					</div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Дата оцінки</span>
							</div>
							<input type="text" class="form-control js-date" data-id="#datework" >
							<input type="hidden" name="datework" id="datework" >
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Замовник</span>
							</div>
							<input type="text" class="form-control js-auto-client"  name="client" >
							<div class="input-group-append">
								<button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_client" data-name="client" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
							</div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-client-add" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>
						</div>
					</div>
                </div>

				<div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Місто</span>
                            </div>
                            <input type="text" class="form-control js-auto-city" name="city" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_city" data-name="city" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
					<div class='col'>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Менеджер</span>
							</div>
							<input type="text" class="form-control js-auto-manager" name="manager" >
							<div class="input-group-append">
								<button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_manager" data-name="manager" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Мета</span>
                            </div>
                            <input type="text" class="form-control js-auto-meta"  name="meta" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_meta" data-name="meta" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Банк</span>
                            </div>
                            <input type="text" class="form-control js-auto-bank"  name="bank" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_bank" data-name="bank" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Від Угоди</span>
                            </div>
                            <input type="text" class="form-control js-auto-vidygodi"  name="vidygodi" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_vidygodi" data-name="vidygodi" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Номер Угоди</span>
                            </div>
                            <input type="text" class="form-control"  name="nomerygodi" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата Угоди</span>
                            </div>
                            <input type="text" class="form-control js-date" data-id="#dateygodi" >
                            <input type="hidden" name="dateygodi" id="dateygodi" >
                        </div>
                    </div>
				</div>
			</form>
		</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="row justify-content-end text-center">
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-success js-save-first-form">Далее</a></div>
			<div class='col-12 col-sm-3 col-md-2 col-lg-1'><a href="#" class="btn btn-danger js-reestr-cancel">Отменить</a></div>
		</div>
	</div>
</script>

<script id="ReestrFormView-AddSecond" type="text/x-dot-template">
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-bars"></i> Загальна інформація</a>
		</li>
		<li class="nav-item">
			<a class="nav-link js-open-file-tab" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-cloud"></i> Файли справи</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-buh-tab" data-toggle="pill" href="#pills-buh" role="tab" aria-controls="pills-buh" aria-selected="false"><i class="fa fa-cloud"></i> Бухгалтерия</a>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<div class="card">
				<div class="card-body">
					<form class='js-add-form-info'>
                        <div class="row">
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Фірма виконавець</span>
                                    </div>
                                    <input type="text" class="form-control js-auto-firma" readonly name="firma" value="{{=it.firma}}" >
                                </div>
                            </div>
                        </div>
						<div class='row'>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Номер Договору</span>
									</div>
									<input type="text" class="form-control" readonly name='nomber' value="{{=it.nomber}}" >
								</div>
							</div>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Старый Номер Договору</span>
									</div>
									<input type="text" class="form-control" readonly name="old_nomber" value="{{=it.old_nomber}}" >
								</div>
							</div>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">ID Договору</span>
									</div>
									<input type="text" class="form-control" readonly name="id" id="reestrid" value="{{=it.id}}" >
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Дата Договору</span>
                                    </div>
                                    <input type="text" class="form-control" readonly name="date" value="{{=it.date}}" >
                                </div>
                            </div>
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Дата оцінки</span>
                                    </div>
                                    <input type="text" class="form-control" readonly data-id="#datework"  value="{{=it.datework}}" >
                                </div>
                            </div>
                        </div>
						<div class='row'>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Замовник</span>
									</div>
									<input type="text" class="form-control js-auto-client" readonly name="client" value="{{=it.client}}" >
								</div>
							</div>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Фірма виконавець</span>
									</div>
									<input type="text" class="form-control js-auto-firma" readonly name="firma" value="{{=it.firma}}" >
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Місто</span>
									</div>
									<input type="text" class="form-control js-auto-city" readonly name="city" value="{{=it.city}}" >
								</div>
							</div>
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Менеджер</span>
                                    </div>
                                    <input type="text" class="form-control js-auto-manager" readonly name="maneger" value="{{=it.manager}}" >
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Мета</span>
									</div>
									<input type="text" class="form-control js-auto-meta" readonly name="meta" value="{{=it.meta}}" >
								</div>
							</div>
							<div class='col'>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"> Банк</span>
									</div>
									<input type="text" class="form-control js-auto-bank" readonly  name="bank" value="{{=it.bank}}" >
								</div>
							</div>
                        </div>
                        <div class='row'>
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Від угоди</span>
                                    </div>
                                    <input type="text" class="form-control" readonly  name="vidygodi" value="{{=it.vidygodi}}" >
                                </div>
                            </div>
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Номер угоди</span>
                                    </div>
                                    <input type="text" class="form-control" readonly  name="nomerygodi" value="{{=it.nomerygodi}}" >
                                </div>
                            </div>
                            <div class='col'>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Дата угоди</span>
                                    </div>
                                    <input type="text" class="form-control" readonly  name="dateygodi" value="{{=it.dateygodi}}" >
                                </div>
                            </div>
						</div>
						<div class='row'>
							<div class='col'>
								<h2 class="text-center">Опис майна<button type="button" class="btn btn-success pull-right js-add-maino"><i class="fa fa-plus"></i></button></h2>
								<div class="js-table-work">

								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row justify-content-end text-center">
								<div class='col text-right'><a href="#" class="btn btn-success js-reestr-rows">Зберігти зміни</a>&nbsp;<a href="#" class="btn btn-danger js-reestr-cancel">Закрити</a></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
			<div class="card">
				<div class="card-body">
					<div class="js-block-files">

					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="pills-buh" role="tabpanel" aria-labelledby="pills-contact-tab">
			<div class="card">
				<div class="card-body">
					<div class="">
                        <div class="row mb-4">
                            <div class="col">
                                <h2>Вибор рахунку</h2>
                                <table class="table table-hover table-bordered table-sm">
                                    <thead>
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>Назва банку</th>
                                        <th>МФО банку</th>
                                        <th>Розразунковий рахунок</th>
                                    </tr>
                                    </thead>
                                    <tbody class="js-reest-show-bank">

                                    </tbody>
                                </table>
                            </div>
                        </div>
						<div class="row mb-4">
							<div class="col">
								<h2>Заяви</h2>
								<a href="print.php?id={{=it.id}}&work=print&template=zajava" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>Друк</a>&nbsp;<button type="button" class="btn btn-primary btn-sm js-send-to-email"  data-link="print.php?id={{=it.id}}&work=print&template=zajava&email=1"><i class="fa fa-print"></i> Надіслати на email</button>
							</div>
                        </div>
                        <div class="row mb-4">
							<div class="col">
								<h2>Рахунок</h2>
								<a href="print.php?id={{=it.id}}&work=print&template=schet" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Друк</a>&nbsp;<button type="button" class="btn btn-primary btn-sm js-send-to-email"  data-link="print.php?id={{=it.id}}&work=print&template=schet&email=1"><i class="fa fa-print"></i> Надіслати на email</button>
							</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
								<h2>Договір</h2>
								<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Друк</button>&nbsp;<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Надіслати на email</button>
							</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
								<h2>Акт</h2>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Номер Акта" aria-label="Username" aria-describedby="basic-addon1" id="nomer-act" value="{{=it.nomer_act}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control js-date"  data-id="#date-act" placeholder="Дата Акта" aria-label="Username" aria-describedby="basic-addon1" value="{{=it.date_act}}">
                                            <input type="hidden" class="" id="date-act" >
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-sm btn-primary  js-act-nomer-save"><i class="fa fa-save"></i> Зберегти</button>
                                    </div>
                                </div>
								<a href="print.php?id={{=it.id}}&work=print&template=act" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Друк</a>&nbsp;<button type="button" class="btn btn-primary btn-sm  js-send-to-email" data-link="print.php?id={{=it.id}}&work=print&template=act&email=1"><i class="fa fa-print"></i> Надіслати на email</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

<script id="ReestrFormView-ViewEdit" type="text/x-dot-template">
    <div class="card">
        <div class="card-body">
            <form id='js-edit-form-info'>
                <div class="row">
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Фірма виконавець</span>
                            </div>
                            <input type="text" class="form-control" readonly name="firma" value="{{=it.firma}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Номер Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name='nomber' value="{{=it.nomber}}" >
                            <input type="hidden" name='cifr_nomer' value="{{=it.cifr_nomer}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Старый Номер Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name="old_nomber" value="{{=it.old_nomber}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name="id" id="reestrid" value="{{=it.id}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата Договору</span>
                            </div>
                            <input type="text" class="form-control js-date" data-id="#date" value="{{=it.date}}" >
                            <input type="hidden" name="date" id="date">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата оцінки</span>
                            </div>
                            <input type="text" class="form-control js-date" data-id="#datework"  value="{{=it.datework}}" >
                            <input type="hidden" name="datework" id="datework" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Замовник</span>
                            </div>
                            <input type="text" class="form-control" name="client" value="{{=it.client}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_client" data-name="client" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Місто</span>
                            </div>
                            <input type="text" class="form-control" name="city" value="{{=it.city}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_city" data-name="city" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Менеджер</span>
                            </div>
                            <input type="text" class="form-control" name="maneger" value="{{=it.manager}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_manager" data-name="manager" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Мета</span>
                            </div>
                            <input type="text" class="form-control" name="meta" value="{{=it.meta}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_meta" data-name="meta" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Банк</span>
                            </div>
                            <input type="text" class="form-control"  name="bank" value="{{=it.bank}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_bank" data-name="bank" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Від угоди</span>
                            </div>
                            <input type="text" class="form-control" name="vidygodi" value="{{=it.vidygodi}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_vidygodi" data-name="vidygodi" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Номер угоди</span>
                            </div>
                            <input type="text" class="form-control"   name="nomerygodi" value="{{=it.nomerygodi}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Дата угоди</span>
                            </div>
                            <input type="text" class="form-control js-date" data-id="#dateygodi" value="{{=it.dateygodi}}" >
                            <input type="hidden" name="dateygodi" id="dateygodi" >
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row justify-content-end text-center">
                        <div class='col text-right'><a href="#" class="btn btn-success js-reestr-view-edit-save">Зберігти зміни</a>&nbsp;<a href="#" class="btn btn-danger js-reestr-cancel">Закрити</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>

<script id="ReestrFormView-TableMaino" type="text/x-dot-template">
	<table class="table table-hover table-bordered table-sm">
		<thead>
		<tr class="text-center">
			<th>#</th>
            <th>Номер</th>
			<th>Вид майна</th>
			<th>Опис майна</th>
			<th>Кількість</th>
			<th>Вартість за один</th>
			<th>Загальна вартість</th>
			<th>Сума прайс</th>
			<th>Виконавець</th>
            <th>Подписант</th>
		</tr>
		</thead>
		<tbody class="js-maino-table-row">

		</tbody>
		<tfoot>
		<tr>
			<td colspan="6" align="right">Сумма</td>
			<td><input type="text" class="form-control  form-control-sm js-maino-all-summ text-right" readonly size="1" value="0"></td>
            <td><input type="text" class="form-control  form-control-sm js-maino-all-summ-price text-left" readonly size="1" value="0"></td>
			<td colspan="2"></td>
		</tr>
		</tfoot>
	</table>
</script>
<script id="ReestrFormView-TableMainoOneRow" type="text/x-dot-template">
	<tr class="js-maino-row" data-idrow="{{=it.idd}}">
		<td>{{=it.idd}}<input type="hidden" name="id" value="{{=it.idd}}"><input type="hidden" name="reestr_id" value="{{=it.idr}}"></td>
        <td><input type="text" class="form-control form-control-sm text-center"  readonly size="2"></td>
		<td>
			<select size="1" class="form-control form-control-sm" name="vid_id" >
				<option value="0" selected> - - - - </option>
				{{~it.typemaino :value:itm}}
				<option value="{{=value.id}}" >{{=value.name}}</option>
				{{~}}
			</select>
		</td>
		<td><input type="text" class="form-control form-control-sm" value="" name="opis"></td>
		<td><input type="text" class="form-control form-control-sm text-right js-maino-one-count" placeholder="0" name="count"></td>
		<td><input type="text" class="form-control form-control-sm text-right js-maino-one-price" placeholder="0" name="price"></td>
		<td><input type="text" class="form-control form-control-sm text-right js-maino-one-summ" readonly placeholder="0"></td>
		<td>
			<div class="input-group input-group-sm">
				<input type="text" class="form-control form-control-sm js-maino-price" data-id="0" data-name="0" data-price="0" name="vartist" />
				<div class="input-group-append">
					<button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_price" data-name="maino-price" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
				</div>
			</div>
		</td>
		<td>
			<select size="1" class="form-control form-control-sm" name="vikon" >
				<option value="0" selected> - - - - </option>
				{{~it.viconav :value:itm}}
				<option value="{{=value.id}}" >{{=value.name}}</option>
				{{~}}
			</select>
		</td>
        <td>
            <select size="1" class="form-control form-control-sm" name="podpisant" >
                <option value="0" selected> - - - - </option>
                {{~it.podpisant :value:itm}}
                <option value="{{=value.id}}" >{{=value.name}}</option>
                {{~}}
            </select>
        </td>

	</tr>
</script>
<script id="ReestrFormView-TableMainoListRow" type="text/x-dot-template">
	{{~it.rowws :value:itm}}
	<tr class="js-maino-row" data-idrow="{{=value.id}}">
		<td>{{=itm+1}}<input type="hidden" name="id" value="{{=value.id}}"><input type="hidden" name="reestr_id" value="{{=value.reestr_id}}"></td>
        <td><input type="text" class="form-control form-control-sm text-center" name="nomber" value="{{=value.nomber}}" readonly size="10"></td>
		<td>
			<select size="1" class="form-control form-control-sm" name="vid_id" >
				<option value="0" selected> - - - - </option>
				{{~it.typemaino :vallue:itmm}}
				<option value="{{=vallue.id}}" {{? vallue.id == value.vid_id }} selected {{?}} >{{=vallue.name}}</option>
				{{~}}
			</select>
		</td>
		<td><input type="text" class="form-control form-control-sm" value="{{=value.opis}}" name="opis"></td>
		<td><input type="text" class="form-control form-control-sm text-right js-maino-one-count" placeholder="0" value="{{=value.count}}" name="count"></td>
		<td><input type="text" class="form-control form-control-sm text-right js-maino-one-price" placeholder="0" value="{{=value.price}}" name="price"></td>
		<td><input type="text" class="form-control form-control-sm text-right js-maino-one-summ" readonly placeholder="0" ></td>
		<td>
			<div class="input-group input-group-sm">
				<input type="text" class="form-control form-control-sm js-maino-price" data-id="0" data-name="0" data-price="0" value="{{=value.vartist}}"  name="vartist" />
				<div class="input-group-append">
					<button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_price" data-name="maino-price" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
				</div>
			</div>
		</td>
		<td>
			<select size="1" class="form-control form-control-sm" name="vikon" >
				<option value="0" > - - - - </option>
				{{~it.viconav :vallue:itmm}}
				<option value="{{=vallue.id}}"  {{? vallue.id == value.vikon }} selected {{?}} >{{=vallue.name}}</option>
				{{~}}
			</select>
		</td>
        <td>
            <select size="1" class="form-control form-control-sm" name="podpisant" >
                <option value="0" > - - - - </option>
                {{~it.podpisant :vallue:itmm}}
                <option value="{{=vallue.id}}"  {{? vallue.id == value.podpisant }} selected {{?}} >{{=vallue.name}}</option>
                {{~}}
            </select>
        </td>
	</tr>
	{{~}}
</script>
<script id="ReestrFormView-TableMainoListFile" type="text/x-dot-template">

	{{~it.items :value:itm}}
	<div>
		<h3>{{~it.maino :vallue:itmm}}
                {{? vallue.id == value.vid_id }} {{=vallue.name}} {{?}}
            {{~}} - {{=value.opis}}
        </h3>
		<ul class="nav nav-pills mb-3" id="pills-{{=value.id}}-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-{{=value.id}}-1-tab" data-toggle="pill" href="#pills-{{=value.id}}-1" role="tab" aria-controls="pills-{{=value.id}}-1" aria-selected="true">Технічна документація</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-{{=value.id}}-2-tab" data-toggle="pill" href="#pills-{{=value.id}}-2" role="tab" aria-controls="pills-{{=value.id}}-2" aria-selected="false">Бух.Дані</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-{{=value.id}}-4-tab" data-toggle="pill" href="#pills-{{=value.id}}-4" role="tab" aria-controls="pills-{{=value.id}}-4" aria-selected="false">Фото</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-{{=value.id}}-5-tab" data-toggle="pill" href="#pills-{{=value.id}}-5" role="tab" aria-controls="pills-{{=value.id}}-5" aria-selected="false">Установчи</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-{{=value.id}}-6-tab" data-toggle="pill" href="#pills-{{=value.id}}-6" role="tab" aria-controls="pills-{{=value.id}}-6" aria-selected="false">Різне</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-{{=value.id}}-tabContent">
			<div class="tab-pane fade show active" id="pills-{{=value.id}}-1" role="tabpanel" aria-labelledby="pills-{{=value.id}}-1-tab">
				<div class="row">
					<div class="col-lg-2">
						<form id="inputFormGroupFile-{{=value.id}}t" enctype="multipart/form-data">
							<div class="input-group input-group-sm mb-3 input-group-sm">
								<div class="custom-file">
									<input type="file" multiple class="custom-file-input js-file-input" name="files[]" data-idmaino="{{=value.id}}" data-reestrid="{{=value.reestr_id}}" data-form="inputFormGroupFile-{{=value.id}}t" id="inputGroupFile-{{=value.id}}t" data-type="t" data-block=".js-to-show-{{=value.id}}t">
									<label class="custom-file-label" for="inputGroupFile-{{=value.id}}">Выбрать файл</label>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-10">
						<table class="table table-sm js-to-show-{{=value.id}}t" >
							{{~it.files :vallue:itmm}}
							{{? vallue.maino == value.id && vallue.type == 't' }}
							<tr>
								<td>
									<a target="_blank" href="{{=vallue.file}}">{{=vallue.name}}</a>
								</td>
								<td class="w-25">
									<button type="button" class="close js-to-delete-file" aria-label="Close" data-idfile="{{=vallue.id}}">
										<span aria-hidden="true"  data-idfile="{{=vallue.id}}">&times;</span>
									</button>
								</td>
							</tr>
							{{?}}
							{{~}}
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-{{=value.id}}-2" role="tabpanel" aria-labelledby="pills-{{=value.id}}-2-tab">
				<div class="row">
					<div class="col-lg-2">
						<form id="inputFormGroupFile-{{=value.id}}b" enctype="multipart/form-data">
							<div class="input-group input-group-sm mb-3 input-group-sm">
								<div class="custom-file">
									<input type="file" multiple class="custom-file-input js-file-input" name="files[]" data-idmaino="{{=value.id}}" data-reestrid="{{=value.reestr_id}}" data-form="inputFormGroupFile-{{=value.id}}b" id="inputGroupFile-{{=value.id}}b" data-type="b" data-block=".js-to-show-{{=value.id}}b">
									<label class="custom-file-label" for="inputGroupFile-{{=value.id}}">Выбрать файл</label>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-10">
						<table class="table table-sm js-to-show-{{=value.id}}b" >
							{{~it.files :vallue:itmm}}
							{{? vallue.maino == value.id && vallue.type == 'b' }}
							<tr>
								<td>
									<a target="_blank" href="{{=vallue.file}}">{{=vallue.name}}</a>
								</td>
								<td class="w-25">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</td>
							</tr>
							{{?}}
							{{~}}
						</table>
					</div>
				</div>                </div>
			<div class="tab-pane fade" id="pills-{{=value.id}}-3" role="tabpanel" aria-labelledby="pills-{{=value.id}}-3-tab">
				<div class="row">
					<div class="col-lg-2">
						<form id="inputFormGroupFile-{{=value.id}}a" enctype="multipart/form-data">
							<div class="input-group input-group-sm mb-3 input-group-sm">
								<div class="custom-file">
									<input type="file" multiple class="custom-file-input js-file-input" name="files[]" data-idmaino="{{=value.id}}" data-reestrid="{{=value.reestr_id}}" data-form="inputFormGroupFile-{{=value.id}}a" id="inputGroupFile-{{=value.id}}a" data-type="a" data-block=".js-to-show-{{=value.id}}a">
									<label class="custom-file-label" for="inputGroupFile-{{=value.id}}">Выбрать файл</label>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-10">
						<table class="table table-sm js-to-show-{{=value.id}}a" >
							{{~it.files :vallue:itmm}}
							{{? vallue.maino == value.id && vallue.type == 'a' }}
							<tr>
								<td>
									<a target="_blank" href="{{=vallue.file}}">{{=vallue.name}}</a>
								</td>
								<td class="w-25">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</td>
							</tr>
							{{?}}
							{{~}}
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-{{=value.id}}-4" role="tabpanel" aria-labelledby="pills-{{=value.id}}-4-tab">
				<div class="row">
					<div class="col-lg-2">
						<form id="inputFormGroupFile-{{=value.id}}f" enctype="multipart/form-data">
							<div class="input-group input-group-sm mb-3 input-group-sm">
								<div class="custom-file">
									<input type="file" multiple class="custom-file-input js-file-input" name="files[]" data-idmaino="{{=value.id}}" data-reestrid="{{=value.reestr_id}}" data-form="inputFormGroupFile-{{=value.id}}f" id="inputGroupFile-{{=value.id}}f" data-type="f" data-block=".js-to-show-{{=value.id}}f">
									<label class="custom-file-label" for="inputGroupFile-{{=value.id}}">Выбрать файл</label>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-10">
						<table class="table table-sm js-to-show-{{=value.id}}f" >
							{{~it.files :vallue:itmm}}
							{{? vallue.maino == value.id && vallue.type == 'f' }}
							<tr>
								<td>
									<a target="_blank" href="{{=vallue.file}}">{{=vallue.name}}</a>
								</td>
								<td class="w-25">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</td>
							</tr>
							{{?}}
							{{~}}
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-{{=value.id}}-5" role="tabpanel" aria-labelledby="pills-{{=value.id}}-5-tab">
				<div class="row">
					<div class="col-lg-2">
						<form id="inputFormGroupFile-{{=value.id}}y" enctype="multipart/form-data">
							<div class="input-group input-group-sm mb-3 input-group-sm">
								<div class="custom-file">
									<input type="file" multiple class="custom-file-input js-file-input" name="files[]" data-idmaino="{{=value.id}}" data-reestrid="{{=value.reestr_id}}" data-form="inputFormGroupFile-{{=value.id}}y" id="inputGroupFile-{{=value.id}}y" data-type="y" data-block=".js-to-show-{{=value.id}}y">
									<label class="custom-file-label" for="inputGroupFile-{{=value.id}}">Выбрать файл</label>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-10">
						<table class="table table-sm js-to-show-{{=value.id}}y" >
							{{~it.files :vallue:itmm}}
							{{? vallue.maino == value.id && vallue.type == 'y' }}
							<tr>
								<td>
									<a target="_blank" href="{{=vallue.file}}">{{=vallue.name}}</a>
								</td>
								<td class="w-25">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</td>
							</tr>
							{{?}}
							{{~}}
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-{{=value.id}}-6" role="tabpanel" aria-labelledby="pills-{{=value.id}}-6-tab">
				<div class="row">
					<div class="col-lg-2">
						<form id="inputFormGroupFile-{{=value.id}}z" enctype="multipart/form-data">
							<div class="input-group input-group-sm mb-3 input-group-sm">
								<div class="custom-file">
									<input type="file" multiple class="custom-file-input js-file-input" name="files[]" data-idmaino="{{=value.id}}" data-reestrid="{{=value.reestr_id}}" data-form="inputFormGroupFile-{{=value.id}}z" id="inputGroupFile-{{=value.id}}z" data-type="z" data-block=".js-to-show-{{=value.id}}z">
									<label class="custom-file-label" for="inputGroupFile-{{=value.id}}">Выбрать файл</label>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-10">
						<table class="table table-sm js-to-show-{{=value.id}}z" >
							{{~it.files :vallue:itmm}}
							{{? vallue.maino == value.id && vallue.type == 'z' }}
							<tr>
								<td>
									<a target="_blank" href="{{=vallue.file}}">{{=vallue.name}}</a>
								</td>
								<td class="w-25">
									<button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</td>
							</tr>
							{{?}}
							{{~}}
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{~}}
</script>
<script id="ReestrFormView-TableMainoListFileRow" type="text/x-dot-template">
	{{~it.items :value:itm}}
	<tr>
		<td>
			<a target="_blank" href="{{=value.file}}">{{=value.name}}</a>
		</td>
		<td class="w-25">
			<button type="button" class="close" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</td>
	</tr>
	{{~}}
</script>

