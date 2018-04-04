<script id="OcencaAutoForm" type="text/x-dot-template">
    <ul class="nav nav-pills mb-2" id="pills-ocencaauto_full" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pils-1-tab" data-toggle="pill" href="#pils-1" role="tab" aria-controls="pils-1" aria-selected="true"><i class="fa fa-cloud"></i> Загальні відомости</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " id="pils-2-tab" data-toggle="pill" href="#pils-2" role="tab" aria-controls="pils-2" aria-selected="false"><i class="fa fa-bars"></i> Огляд</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-3-tab" data-toggle="pill" href="#pils-3" role="tab" aria-controls="pils-3" aria-selected="false"><i class="fa fa-cloud"></i> Вибор Файлі справи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-4-tab" data-toggle="pill" href="#pils-4" role="tab" aria-controls="pils-4" aria-selected="false"><i class="fa fa-cloud"></i> Литература</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-5-tab" data-toggle="pill" href="#pils-5" role="tab" aria-controls="pils-5" aria-selected="false"><i class="fa fa-cloud"></i> Фрпмування справи</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pils-1" role="tabpanel" aria-labelledby="pils-1-tab">
            <form class='js-add-form-info'>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Номер Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name='nomber' value="{{=it.reestr.nomber}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name="date" value="{{=it.reestr.date}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата оцінки</span>
                            </div>
                            <input type="text" class="form-control" readonly data-id="#datework"  value="{{=it.reestr.datework}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Старый Номер Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name="old_nomber" value="{{=it.reestr.old_nomber}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID Договору</span>
                            </div>
                            <input type="text" class="form-control" readonly name="id" id="reestrid" value="{{=it.reestr.id}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Замовник</span>
                            </div>
                            <input type="text" class="form-control js-auto-client" readonly name="client" value="{{=it.reestr.client}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Фірма виконавець</span>
                            </div>
                            <input type="text" class="form-control js-auto-firma" readonly name="firma" value="{{=it.reestr.firma}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Місто</span>
                            </div>
                            <input type="text" class="form-control js-auto-city" readonly name="city" value="{{=it.reestr.city}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Мета</span>
                            </div>
                            <input type="text" class="form-control js-auto-meta" readonly name="meta" value="{{=it.reestr.meta}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Банк</span>
                            </div>
                            <input type="text" class="form-control js-auto-bank" readonly name="bank" value="{{=it.reestr.bank}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Менеджер</span>
                            </div>
                            <input type="text" class="form-control js-auto-manager" readonly name="maneger" value="{{=it.reestr.manager}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class="text-center">Опис майна</h2>
                        <div class="js-table-work">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr class="text-center">
                                    <th>Вид майна</th>
                                    <th>Опис майна</th>
                                    <th>Кількість</th>
                                    <th>Завантажити з Excel</th>
                                    <th>Сформувати пусті</th>
                                </tr>
                                </thead>
                                <tbody class="js-maino-table-row">
                                <tr class="js-maino-row" data-idrow="2">
                                    <td><input type="hidden" name="reestr_id"  class="js-reestr-id" value="{{=it.reestr.id}}"><input type="hidden" name="maino_id" class="js-maino-id" value="{{=it.ocenca.id}}">
                                        <input type="text" class="form-control form-control-sm" value="{{=it.ocenca.mname}}"></td>
                                    <td><input type="text" class="form-control form-control-sm" value="{{=it.ocenca.opis}}"></td>
                                    <td><input type="text" class="form-control form-control-sm text-right js-ocenca-count" placeholder="0" value="{{=it.ocenca.count}}" name="count"></td>
                                    <td class="text-center"><button class="btn btn-sm btn-primary" type="button">Завантажити з Excel</button></td>
                                    <td class="text-center"><button class="btn btn-sm btn-primary js-ocenca-auto-add-zero" type="button">Сформувати пусті</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class="text-center">Спісок техніки</h2>
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Найменування майна</th>
                                <th>Марка, Модель</th>
                                <th>Рік випуску</th>
                                <th>VIN/№ шасы (кузова) № заводський</th>
                                <th>Ринкова вартість</th>
                                <th>Відкрити</th>
                            </tr>
                            </thead>
                            <tbody class="js-ocenca-auto-table-row">
                            {{~it.items :value:itm}}
                                <tr class='text-center'>
                                    <td>{{=itm+1}}</td>
                                    <td>{{=value.name}}</td>
                                    <td>{{=value.marka}} / {{=value.model}}</td>
                                    <td>{{=value.year}}</td>
                                    <td>{{=value.vin}}</td>
                                    <td>{{=value.sale_price}}</td>
                                    <td><a href="#" data-ocencaautoid="{{=value.id}}" data-togglle="modal" data-target="#ocencaAutoModal" class="btn js-open-modal-ocenca-auto btn-success btn-sm"><i class="fa fa-pencil-square-o"></i></a></td>
                                </tr>
                            {{~}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade show" id="pils-2" role="tabpanel" aria-labelledby="pils-2-tab">
            <div class="row">
                <div class='col'>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Осмотр транспортного средства производилось</span>
                        </div>
                        <input type="text" class="form-control js-date" data-id="#dateo" >
                        <input type="hidden" name="date" id="dateo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col'>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">времмя суток при</span>
                        </div>
                        <input type="text" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">в присутствии</span>
                        </div>
                        <input type="text" class="form-control" >
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-3" role="tabpanel" aria-labelledby="pils-3-tab">
        </div>
        <div class="tab-pane fade show" id="pils-4" role="tabpanel" aria-labelledby="pils-4-tab">
            <div class="row">
                <div class="col"><h2>Используемая литература</h2></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
                            </div>
                        </div>
                        <div class="input-group-prepend col-11">
                            <span class="input-group-text col-12" id="basic-addon1">Закон Украини "Про оцінк майна, майнових прав та професійну оцінку діяльності в Укрвїні"</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
                            </div>
                        </div>
                        <div class="input-group-prepend col-11">
                            <span class="input-group-text col-12" id="basic-addon1">Закон Украини "Про оцінк майна, майнових прав та професійну оцінку діяльності в Укрвїні"</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
                            </div>
                        </div>
                        <div class="input-group-prepend col-11">
                            <span class="input-group-text col-12" id="basic-addon1">Закон Украини "Про оцінк майна, майнових прав та професійну оцінку діяльності в Укрвїні"</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
                            </div>
                        </div>
                        <div class="input-group-prepend col-11">
                            <span class="input-group-text col-12" id="basic-addon1">Закон Украини "Про оцінк майна, майнових прав та професійну оцінку діяльності в Укрвїні"</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
                            </div>
                        </div>
                        <div class="input-group-prepend col-11">
                            <span class="input-group-text col-12" id="basic-addon1">Закон Украини "Про оцінк майна, майнових прав та професійну оцінку діяльності в Укрвїні"</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
                            </div>
                        </div>
                        <div class="input-group-prepend col-11">
                            <span class="input-group-text col-12" id="basic-addon1">Закон Украини "Про оцінк майна, майнових прав та професійну оцінку діяльності в Укрвїні"</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-5" role="tabpanel" aria-labelledby="pils-5-tab">
        </div>
    </div>

	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="ocencaAutoModal" tabindex="-1" role="dialog" aria-labelledby="ocencaAutoModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-xxl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ocencaAutoModalTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-pills mb-2" id="pills-ocencaauto" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa fa-cloud"></i> Ввод данних</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa fa-cloud"></i> Вибор Аналогов</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa fa-cloud"></i> Дз</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false"><i class="fa fa-cloud"></i> Гк</a>
						</li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false"><i class="fa fa-cloud"></i> ВРВ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false"><i class="fa fa-cloud"></i> Вибор Расчет</a>
                        </li>
					</ul>
					<div class="tab-content" id="pills-ocencaauto">
						<div class="tab-pane fade show active js-ocenca-auto-one" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
						</div>
                        <div class="tab-pane fade show" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">

						</div>
                        <div class="tab-pane fade show" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                            <div class="row mb-2">
                                <div class="col-md-10">
                                    <input type="text" class="w-100 js-url-analog-add" id="">
                                </div>
                                <div class="col">
                                    <button type="button" class="btn w-100 btn-success btn-sm pull-right js-add-analog"><i class="fa fa-plus"></i> Додати</button>
                                </div>
                            </div>
							<div class="row">
								<div class="col">
									<table class="table table-hover table-bordered table-sm">
										<thead>
										<tr class="text-center">
											<th>#</th>
											<th>Джероло Інформації</th>
											<th>Марка, модель</th>
											<th>Рік випуску</th>
                                            <th>Валюта</th>
											<th>Вартість пропозиції</th>
											<th>Вартість пропозиції, без ПДВ</th>
                                            <th>без ПДВ</th>
											<th>Коригування на торг</th>
											<th>Коригування на рік випуску</th>
											<th>Коригування на тех. стан</th>
											<th>Коригування на модель</th>
											<th>Вартість продажу, грн.</th>
										</tr>
										</thead>
										<tbody class="js-analog-ocenca-auto-row">

										</tbody>
										<tfoot>
										<tr>
											<td colspan="11" class="text-center">Середнє</td>
                                            <td class="text-center"><button type="button" class="btn w-100 btn-success btn-sm pull-right js-refresh-analog">Оновити</button></td>
											<td class="text-center">0</td>
										</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
							<div class="row">
								<div class="col"><h2>Фактори влияющие на процент повышения стоимости ТС</h2></div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col"><h2>Фактори влияющие на процент понижения стоимости ТС</h2></div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Отсутствие корозийного повреждения составных частей кузова легковых автомобилей</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><stong>ИТОГО от Повреждений</stong></span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" aria-label="Checkbox for following text input" name="dizelbenzin">
											</div>
										</div>
										<div class="input-group-prepend col-11">
											<span class="input-group-text col-12" id="basic-addon1">ТС имеет следы востановления 3 и боллее деталей кузова</span>
										</div>
										<input type="number" class="form-control" value="10" >
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Закрити</button>
				</div>
			</div>
		</div>
	</div>
</script>

<script id="OcencaAutoTableRows" type="text/x-dot-template">
    {{~it.items :value:itm}}
        <tr class='text-center'>
            <td>{{=itm+1}}</td>
            <td>{{=value.name}}</td>
            <td>{{=value.marka}} / {{=value.model}}</td>
            <td>{{=value.year}}</td>
            <td>{{=value.vin}}</td>
            <td>{{=value.sale_price}}</td>
            <td><a href="#" data-ocencaautoid="{{=value.id}}" data-togglle="modal" data-target="#ocencaAutoModal" class="btn js-open-modal-ocenca-auto btn-success btn-sm"><i class="fa fa-pencil-square-o"></i></a></td>
        </tr>
    {{~}}
</script>

<script id="OcencaAutoAnalogTableRows" type="text/x-dot-template">
    {{~it.items :value:itm}}
    <tr>
        <td>{{=itm+1}}</td>
        <td>
            <input type="hidden" name="id" value="{{=value.id}}" >
            <input type="hidden" name="ocenca_auto_id" value="{{=value.ocenca_auto_id}}" >
            <input type="hidden" name="url" value="{{=value.url}}" >
            <input type="hidden" name="link_pic" value="{{=value.link_pic}}" >
            <a href="{{=value.url}}" class="short_link" target="_blank">{{=value.url}}</a>

            <a href="{{=value.link_pic}}" target="_blank">скрин</a>
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" value="{{=value.name}}" name="name">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" value="{{=value.year}}" name="year">
        </td>
        <td>
            <select class="form-control form-control-sm" name="curency" >
                <option {{? value.curency == 'UAH'}} selected {{?}} value="UAH">UAH</option>
                <option {{? value.curency == 'USD'}} selected {{?}} value="USD">USD</option>
                <option {{? value.curency == 'EUR'}} selected {{?}} value="EUR">EUR</option>
            </select>
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.price}}" name="price">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.price_bez}}" name="price_bez">
        </td>
        <td>
            <input type="checkbox" class="form-control form-control-sm" value="1" name="pdv" {{? value.pdv == '1'}} checked {{?}} />
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.kor_torg}}" name="kor_torg">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.kor_year}}" name="kor_year">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.kor_tech}}" name="kor_tech">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.kor_model}}" name="kor_model">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" value="{{=value.vartis}}" name="vartis" readonly>
        </td>
    </tr>
    {{~}}
</script>

<script id="OcencaAutoOne" type="text/x-dot-template">
    <form action="" id="formOcencaAutoOne">
        <input type="hidden" name="id" value="{{=it.id}}">
    <div class="row">
        <div class='col-md-4'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Наименування</span>
                </div>
                <input type="text" class="form-control" name="name" value="{{=it.name}}">
            </div>
        </div>
        <div class='col-md-3'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Категория КТС</span>
                </div>
                <input type="text" class="form-control" name="kts" value="{{=it.kts}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_kts" data-name="kts" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Производство КТС</span>
                </div>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="proiz" value="otech" {{? it.proiz == 'otech'}} checked {{?}} >
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Отечествений КТС">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="proiz" value="zarub" {{? it.proiz == 'zarub'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Зарубежный КТС">
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Марка транспортного средства</span>
                </div>
                <input type="text" class="form-control" name="marka" value="{{=it.marka}}" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_marka" data-name="marka" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Модель транспортного средства</span>
                </div>
                <input type="text" class="form-control" name="model" value="{{=it.model}}" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_model" data-name="model" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Тип Кузова</span>
                </div>
                <input type="text" class="form-control" name="kyzov" value="{{=it.kyzov}}" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary  js-modal-sprv" data-spr="s_kyzov" data-name="kyzov" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Тип Двиготеля</span>
                </div>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="dizelbenzinelectro" value="Дизель" {{? it.dizelbenzinelectro == 'Дизель'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Дизель">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="dizelbenzinelectro" value="Бензин" {{? it.dizelbenzinelectro == 'Бензин'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Бензин">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="dizelbenzinelectro" value="Электро" {{? it.dizelbenzinelectro == 'Электро'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Электро">
            </div>
        </div>
        <div class='col-md-4'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Объем двигателя</span>
                </div>
                <input type="number" class="form-control" name="obem" value="{{=it.obem}}" >
                <div class="input-group-append">
                    <span class="input-group-text">куб.см</span>
                </div>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Год выпуска</span>
                </div>
                <select name="year" class="form-control">
                    {{ for(var prop in it.yeara) { }}
                    <option {{? it.year == prop}} selected {{?}} value="{{=prop}}">{{=prop}}</option>
                    {{ } }}
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Дата выдачи свидетельства о регистрации/техпаспорт</span>
                </div>
                <input type="text" class="form-control js-date" data-id="#datesvidet"  name="datesvidet" value="{{=it.datesvidet}}" >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Принятая дата производства КТС</span>
                </div>
                <input type="text" class="form-control js-date" data-id="#datektsproiz" name="datektsproiz"  value="{{=it.datektsproiz}}"  >
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">количество полніх лет Єксплуатации</span>
                </div>
                <input type="text" class="form-control" name="fullyear"  value="{{=it.fullyear}}"  >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Количество месяцев Єксплуапаци</span>
                </div>
                <input type="text" class="form-control" name="fullmonth"  value="{{=it.fullmonth}}"  >
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="reg_nom_tran" value="Регистрационый Номер"  {{? it.reg_nom_tran == 'Регистрационый Номер'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Регистрационый Номер">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="reg_nom_tran" value="Транзитный номер" {{? it.reg_nom_tran == 'Транзитный номер'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Транзитный номер">
                <input type="text" class="form-control"  name="reg_nom_tran_val"  value="{{=it.reg_nom_tran_val}}"  >
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="svid_reg_tran" value="Свидетильство о регистрации"  {{? it.svid_reg_tran == 'Свидетильство о регистрации'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Свидетильство о регистрации">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="svid_reg_tran" value="Тезнический паспорт" {{? it.svid_reg_tran == 'Тезнический паспорт'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Тезнический паспорт">
                <input type="text" class="form-control" name="svid_reg_tran_val"  value="{{=it.svid_reg_tran_val}}"   >
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="vin_nom_kyz" value="Индификационій номер (VIN)"  {{? it.vin_nom_kyz == 'Индификационій номер (VIN)'}} checked {{?}} >
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Индификационій номер (VIN)">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Checkbox for following text input" name="vin_nom_kyz" value="Номер кузова" {{? it.vin_nom_kyz == 'Номер кузова'}} checked {{?}}>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Номер кузова">
                <input type="text" class="form-control" name="vin"  value="{{=it.vin}}"  >
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">№ двигателя</span>
                </div>
                <input type="text" class="form-control" name="nom_dvig"  value="{{=it.nom_dvig}}"  >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">№ шасси</span>
                </div>
                <input type="text" class="form-control" name="nom_shasi"  value="{{=it.nom_shasi}}"  >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">№ рамы</span>
                </div>
                <input type="text" class="form-control" name="nom_rami" value="{{=it.nom_rami}}"  >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Цвет КТС</span>
                </div>
                <input type="text" class="form-control" name="color"  value="{{=it.color}}" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_color" data-name="color" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="vlad_tot" value="yes"  {{? it.vlad_tot == 'yes'}} checked {{?}} />
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Владелец той самй" >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Владалец КТС</span>
                </div>
                <input type="text" class="form-control" name="vladel_kts"  value="{{=it.vladel_kts}}"  >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Адрес Владельца</span>
                </div>
                <input type="text" class="form-control" name="vladel_adres"  value="{{=it.vladel_adres}}"  >
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-10'>
        </div>
        <div class='col-md-2'>
            <button type="button" class="btn btn-primary  btn-sm js-ocenca-auto-submit" style="width: 100%;">Зберегти</button>
        </div>
    </div>
    </form>
</script>