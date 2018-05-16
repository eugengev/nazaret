<script id="OcencaAutoForm" type="text/x-dot-template">
    <ul class="nav nav-pills mb-2" id="pills-ocencaauto_full" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pils-1-tab" data-toggle="pill" href="#pils-1" role="tab" aria-controls="pils-1" aria-selected="true"><i class="fa fa-cloud"></i> Загальні відомости</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-ocenca-show-oglad" id="pils-2-tab" data-toggle="pill" href="#pils-2" role="tab" aria-controls="pils-2" aria-selected="false"><i class="fa fa-bars"></i> Огляд</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-ocenca-show-files" id="pils-3-tab" data-toggle="pill" href="#pils-3" role="tab" aria-controls="pils-3" aria-selected="false"><i class="fa fa-cloud"></i> Вибор Файлі справи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-ocenca-show-literal" id="pils-4-tab" data-toggle="pill" href="#pils-4" role="tab" aria-controls="pils-4" aria-selected="false"><i class="fa fa-cloud"></i> Литература</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-5-tab" data-toggle="pill" href="#pils-5" role="tab" aria-controls="pils-5" aria-selected="false"><i class="fa fa-cloud"></i> Формування справи</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pils-1" role="tabpanel" aria-labelledby="pils-1-tab">
            <form class='js-add-form-info'>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Номер Оценки</span>
                            </div>
                            <input type="hidden" id='idocenka' value="{{=it.ocenca.id}}" >
                            <input type="text" class="form-control" readonly name='nomber' value="{{=it.ocenca.nomer}}" >
                        </div>
                    </div>
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
                <div class="row">
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
                                    <td class="text-center">
                                        <div class="custom-file form-control-sm" style="width: 200px">
                                            <form id="loadexcel" method="post" enctype="multipart/form-data">
                                                <input type="file" class="custom-file-input js-file-input-excel  form-control-sm" data-id="loadexcel" id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Завантажити з Excel</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </form>
                                        </div>
                                        <!-- <button class="btn btn-sm btn-primary" type="button">Завантажити з Excel</button> -->
                                    </td>
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
                                    <td><a href="#" data-ocencaautoid="{{=value.id}}" data-togglle="modal" data-target="#ocencaAutoModal" class="btn js-open-modal-ocenca-auto btn-success btn-sm"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="#" data-ocencaautoid="{{=value.id}}" class="btn js-delete-ocenca-auto btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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
                        <input type="text" class="form-control js-date" data-id="#dateo" name="oglad_date" >
                        <input type="hidden" name="date" id="dateo" name="oglad_date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col'>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">времмя суток при</span>
                        </div>
                        <input type="text" class="form-control" name="oglad_sutok" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">в присутствии</span>
                        </div>
                        <input type="text" class="form-control" name="oglad_prisut" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-sm btn-primary js-ocenca-auto-save-oglad" type="button">Зберегти</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-3" role="tabpanel" aria-labelledby="pils-3-tab">
            <div class="row">
                <div class="col">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                        <tr class="text-center" style="font-size: 0.8em">
                            <th>#</th>
                            <th>отметка</th>
                            <th>миниатюра</th>
                            <th>имя файла</th>
                            <th>тип файла</th>
                        </tr>
                        </thead>
                        <tbody class="js-ocenca-file-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-4" role="tabpanel" aria-labelledby="pils-4-tab">
            <div class="row">
                <div class="col"><h2>Используемая литература</h2></div>
            </div>
            <div class="js-ocenca-liter-list">

            </div>
        </div>
        <div class="tab-pane fade show" id="pils-5" role="tabpanel" aria-labelledby="pils-5-tab">
            <button class="btn btn-sm btn-primary js-ocenca-create-file" type="button">Формування справи</button>
        </div>
    </div>

	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="ocencaAutoModal" tabindex="-1" role="dialog" aria-labelledby="ocencaAutoModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-xxl" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<ul class="nav nav-pills mb-2" id="pills-ocencaauto" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa fa-cloud"></i> Введення даних</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa fa-cloud"></i> Вибір аналогів</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa fa-cloud"></i> Дз</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false"><i class="fa fa-cloud"></i> Гк+Кр</a>
						</li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false"><i class="fa fa-cloud"></i> ВТВ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false"><i class="fa fa-cloud"></i> Вибір Розрахунку</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false"><i class="fa fa-cloud"></i> Розрахунок Ліквідаційной вартості</a>
                        </li>

					</ul>
					<div class="tab-content" id="pills-ocencaauto">
						<div class="tab-pane fade show active js-ocenca-auto-one" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
						</div>
                        <div class="tab-pane fade show js-calc-auto-full-calc" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                            <div class="row">
                                <div class="col js-calc-auto-plus">
                                    <h5>Фактори, що впливають на збільшення вартості КТЗ</h5>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_01" >
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">Відсутність корозійних пошкоджень складових частин кузова легкових автомобілів</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10" min="0" max="10" step="0.1" name="chb_01_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input"  name="chb_02" >
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">Відсутність пошкоджень лакофарбового покриття легкового автомобіля за умови, що відновлювальний ремонт кузова не виконували</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="5.0" min="0" max="5" step="0.1" name="chb_03_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_03">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">Виконано капітальний ремонт двигуна не більше як за 1 рік до дати оцінки</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="5.0" min="0" max="5" step="0.1" name="chb_03_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_04">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">капітальний ремонт кузова з повним пофарбуванням не більше як за 3 роки до дати оцінки</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="15.0" min="0" max="15" step="0.1" name="chb_04_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input"  name="chb_05">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">заміну кузова на новий не більше як за 5 років до дати оцінки(1)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="30.0" min="0" max="30" step="0.1" name="chb_05_v" >
                                    </div>
                                </div>
                                <div class="col js-calc-auto-minus-1">
                                    <h5>Фактори, що впливають на процент зменшення вартості КТЗ</h5>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" aria-label="Checkbox for following text input"  name="chb_06"">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">Нема</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0" min="0" max="0" step="0"  name="chb_06_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" aria-label="Checkbox for following text input"  name="chb_07">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">автомобіль легковий, експлуатувався в режимі таксі, що передбачає надання послуг з перевезення пасажирів та їхнього багажу в індивідуальному порядку</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10.0" min="0" max="10" step="0.1"  name="chb_07_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" aria-label="Checkbox for following text input"  name="chb_08">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">автомобілі легкові та автобуси спеціалізованого призначення</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10.0" min="0" max="10" step="0.1" name="chb_08_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" aria-label="Checkbox for following text input"  name="chb_09">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">КТЗ застосовувався поза дорогами загального користування (не менше 30% пробігу)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10.0" min="0" max="10" step="0.1" name="chb_09_v" >
                                    </div>
                                </div>
                                <div class="col js-calc-auto-minus-2">
                                    <h5>ЕЛЕМЕНТИ КУЗОВА(4) (пошкодження корозією)</h5>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input"  name="chb_10" >
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">1 Панель підлоги кузова, кабіни</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="4.0" min="0" max="4" step="0.1" name="chb_10_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_11">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">2 Коробчасті елементи збільшення жорсткості (лонжерони, поперечини,підсилювачі, підмоторна рама)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="6.0" min="0" max="6" step="0.1" name="chb_11_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_12">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">3 Пороги кузова</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="1.0" min="0" max="1" step="0.1" name="chb_12_v" >
                                    </div>
                                    <h6>4 Передок кузова, кабіни:</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_13" >
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">4.1 бризковики передніх крил</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="2.0" min="0" max="2" step="0.1" name="chb_13_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input"  name="chb_14">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">4.2 щиток передка</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="3.0" min="0" max="3" step="0.1" name="chb_14_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_15">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">4.3 панелі передка (полиці щитків радіатора)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="1.0" min="0" max="1" step="0.1" name="chb_15_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_16">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">4.4 бризковик облицювання радіатора</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.3" min="0" max="0.3" step="0.1" name="chb_16_v" >
                                    </div>
                                    <h6>5 Боковина кузова, кабіни:</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_17">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">5.1 стояки боковин </span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="4.0" min="0" max="4" step="0.1" name="chb_17_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_18">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">5.2 арки боковин (бризковики боковин)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="2.0" min="0" max="2" step="0.1"  name="chb_19_v">
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_20">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">5.3 панелі боковин</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="2.0" min="0" max="2" step="0.1" name="chb_20_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_21">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">5.4 Двері</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10.0" min="0" max="10" step="0.1" name="chb_21_v" >
                                    </div>
                                    <h6>6 Задок кузова, кабіни: </h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input"  name="chb_22">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">6.1 панелі задка </span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.5" min="0" max="0.5" step="0.1" name="chb_22_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_23">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">6.2 полиці задка з перегородкою (стінка моторного відсіку)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.5" min="0" max="0.5" step="0.1"  name="chb_23_v">
                                    </div>
                                    <h6>7 Дах кузова, кабіни: </h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_24">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">7.1 панель даху</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="1.0" min="0" max="1" step="0.1" name="chb_24_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_25">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">7.2 панель бокова задня </span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.3" min="0" max="0.3" step="0.1" name="chb_25_v" >
                                    </div>
                                    <h6>8 Оперення:</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_26">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">8.1 крило знімне</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.5" min="0" max="0.5" step="0.1" name="chb_26_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_27">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">8.2 крило незнімне</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="1.0" min="0" max="1" step="0.1"  name="chb_27_v">
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_28">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">8.3 капот</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.5" min="0" max="0.5" step="0.1" name="chb_29_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_30">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">8.4 кришка багажника</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.5" min="0" max="0.5" step="0.1" name="chb_30_v" >
                                    </div>
                                    <h6>ЕЛЕМЕНТИ КУЗОВА, КАБІНИ, РАМИ(5) (деформація)</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_31">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">9 Деформації без пошкодження лакофарбового покриття</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="5.0" min="0" max="5" step="0.1"  name="chb_31_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_32">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">10 Інформативні ознаки наявності перекосу кузова чи необхідності правки рами КТЗ (окрім випадків, що передбачають складання калькуляції відновлювального ремонту аварійно пошкодженого КТЗ)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="15.0" min="0" max="15" step="0.1" name="chb_32_v" >
                                    </div>
                                    <h6>ОББИВКА КУЗОВА, КАБІНИ(5) (забруднення, пошкодження, потертості)</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_33">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">11 Оббивка салону (даху, стояків, боковин, полиць, дверей)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="1.0" min="0" max="1" step="0.1"  name="chb_33_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_34">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">12 Оббивка сидінь </span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="2.0" min="0" max="2" step="0.1" name="chb_34_v" >
                                    </div>
                                    <h6>ПОФАРБУВАННЯ КУЗОВА, КАБІНИ(5) (дефекти лакофарбового покриття)</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_35">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">13 Пофарбування кузова</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="3.0" min="0" max="3" step="0.1"  name="chb_35_v">
                                    </div>
                                    <h6>ХРОМОВАНІ ДЕТАЛІ(5) (корозія, потьмяніння, відшарування)</h6>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_36">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">14 Хромовані покриття</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="3.0" min="0" max="3" step="0.1"  name="chb_36_v">
                                    </div>
                                    <h6>СКЛО(5) (потертості, пошкодження)</h6>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_37">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">15 Скло</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="0.5" min="0" max="0.5" step="0.1"  name="chb_37_v">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ИТОГО от повреждения</span>
                                        </div>
                                        <input type="number" class="form-control js-analog-ocenca-auto-itogo-minus text-right" value="1" min="0.25" max="1" spet="0.25" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" class="js-analog-ocenca-auto-8-let"   name="chb_38" />
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="КТЗ,  термін експлуатації  яких  перевищує  8  років" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" class="js-analog-ocenca-auto-gruz"  name="chb_39" />
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="Для вантажних КТЗ,  причепів,  напівпричепів та автобусів
значення Дз додатково зменшуються удвічі" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-dark text-center" style="margin-bottom: 0;">Итого</div>
                                    <div data-proc="0" class="alert alert-success js-calc-suto-itog text-center">0 %</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col js-calc-auto-minus-3">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input"  name="chb_40">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">Кузовні складові КТЗ відновлювалися ремонтом У разі відновлення трьох і більше складових  кузова.</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10.0" min="0" max="10" step="0.1" name="chb_40_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_41">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">Кузовні складові КТЗ відновлювалися ремонтом У разі відновлення не більше двох складових кузова</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="4.0" min="0" max="4" step="0.1"  name="chb_41_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_42">
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">КТЗ має складові частини, які потребують ремонту (окрім заміни чи капітального ремонту складової)</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="10.0" min="0" max="10" step="0.1" name="chb_42_v" >
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" name="chb_43" >
                                            </div>
                                        </div>
                                        <div class="input-group-prepend col-11">
                                            <span class="input-group-text col-12" id="basic-addon1">КТЗ пофарбовано в колір, який не користується попитом</span>
                                        </div>
                                        <input type="number" class="form-control text-right" value="1.0" min="0" max="1" step="0.1"  name="chb_43_v" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show  js-calc-auto-gk" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100">Коєфіціет ринку регіону</span>
                                        </div>
                                        <select class="form-control" name="koefic" >
                                            <option value="0.97">0.97</option>
                                            <option selected value="1">1.00</option>
                                            <option value="1.03">1.03</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100">Пробіг нормативний</span>
                                        </div>
                                        <input type="number" name="probeg_norm" class="form-control text-right" value="0" min="0" max="999999" step="100" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100">Пробіг фактичний</span>
                                        </div>
                                        <input type="number" name="probeg_fact" class="form-control text-right" value="0" min="0" max="999999" step="100" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100">Фактичний середньогоддовий пробіг</span>
                                        </div>
                                        <input type="number"  name="probeg_fact_sred" class="form-control text-right" value="0" min="0" max="999999" step="100" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100">Середньогодовий перепробег (недопробег)</span>
                                        </div>
                                        <input type="number"  name="probeg_nedop" class="form-control text-right" value="0" min="0" max="999999" step="100" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100">Значення Гк</span>
                                        </div>
                                        <input type="number" class="form-control text-right"  name="gk" >
                                    </div>
                                </div>
                            </div>
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
										<tr class="text-center" style="font-size: 0.8em">
											<th>#</th>
											<th>Джероло Інформації</th>
											<th>Марка, модель</th>
											<th>Рік випуску</th>
                                            <th style="width: 80px">Валюта</th>
											<th>Вартість пропозиції</th>
											<th>Вартість пропозиції в грн</th>
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
                                            <td colspan="3">min значення</td>
                                            <td colspan="2" class="text-right"><h5 class="js-analog-ocenca-auto-min">0</h5></td>
                                            <td colspan="5" class="text-center" style="vertical-align: middle"><label for="sale_price">Середне значення</label></td>
                                            <td colspan="1" class="text-center"><input type="radio" name="sale_price_chose" value="sale_price" id="sale_price" checked></td>
											<td colspan="2" class="text-center" style="vertical-align: middle"><h4 class="js-analog-ocenca-auto-avg">0</h4></td>
										</tr>
                                        <tr>
                                            <td colspan="3">max значення</td>
                                            <td colspan="2" class="text-right"><h5 class="js-analog-ocenca-auto-max">0</h5></td>
                                            <td colspan="5" class="text-center" style="vertical-align: middle"><label for="sale_price_2">Серединне</label></td>
                                            <td colspan="1" class="text-center"><input type="radio" name="sale_price_chose" value="sale_price_2" id="sale_price_2"></td>
                                            <td colspan="2" class="text-center" style="vertical-align: middle"><h4 class="js-analog-ocenca-auto-avg2">0</h4></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">відхілення</td>
                                            <td colspan="2" class="text-right"><h5 class="js-analog-ocenca-auto-vid">0</h5></td>
                                            <td colspan="5" class="text-center" style="vertical-align: middle"><label for="sale_price_3">Медианне</label></td>
                                            <td colspan="1" class="text-center"><input type="radio" name="sale_price_chose" value="sale_price_3" id="sale_price_3"></td>
                                            <td colspan="2" class="text-center" style="vertical-align: middle"><h4 class="js-analog-ocenca-auto-avg3">0</h4></td>
                                        </tr>
                                        <tr>
                                            <td colspan="13"><button type="button" class="btn w-100 btn-success btn-sm pull-right js-refresh-analog">Розрахувати</button></td>
                                        </tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
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
            <td><a href="#" data-ocencaautoid="{{=value.id}}" data-togglle="modal" data-target="#ocencaAutoModal" class="btn js-open-modal-ocenca-auto btn-success btn-sm"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="#" data-ocencaautoid="{{=value.id}}" class="btn js-delete-ocenca-auto btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
        </tr>
    {{~}}
</script>

<script id="OcencaAutoAnalogTableRows" type="text/x-dot-template">
    {{~it.items :value:itm}}
    <tr>
        <td class="text-center">{{=itm+1}}<br>
            <a href="#" class="btn js-delete-analog-auto btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
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
                <option {{? value.curency == 'RUB'}} selected {{?}} value="RUB">RUB</option>
            </select>
        </td>
        <td class="text-right">
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.price}}" name="price">
        </td>
        <td class="text-right">
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.price_uah}}" name="price_uah" readonly>
        </td>
        <td>
            <input type="checkbox" class="form-control form-control-sm" value="1" name="pdv" {{? value.pdv == '1'}} checked {{?}} />
        </td>
        <td class="text-right">
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.kor_torg}}" name="kor_torg">
        </td>
        <td class="text-right">
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.kor_year}}" name="kor_year">
        </td>
        <td class="text-right">
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.kor_tech}}" name="kor_tech">
        </td>
        <td>
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.kor_model}}" name="kor_model">
        </td>
        <td>
            <input type="number" class="form-control text-right form-control-sm" value="{{=value.vartis}}" name="vartis" readonly>
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
                    <span class="input-group-text">Дата Введення</span>
                </div>
                <input type="text" class="form-control js-date" data-id="#data_vedenja"  name="data_vedenja" value="{{=it.data_vedenja}}" >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Заводской номер</span>
                </div>
                <input type="text" class="form-control" name="zavod_nomer" value="{{=it.zavod_nomer}}" >
            </div>
        </div>
        <div class='col'>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Инвентарний номер</span>
                </div>
                <input type="text" class="form-control" name="invent_nomer" value="{{=it.invent_nomer}}" >
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
    </div>
    <div class="row">
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
        <div class='col'>
            <div class="input-groupinput-group-sm mb-2">
                <div class="input-group-prepend w-100">
                    <span class="input-group-text w-100 text-center">Техничні характеристики</span>
                </div>
                <textarea name="teh_har"  class="form-control" cols="30" rows="10">{{=it.teh_har}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-10'>
        </div>
        <div class='col-md-2'>
            <button type="button" class="btn btn-primary  btn-sm js-ocenca-auto-submit w-100">Зберегти</button>
        </div>
    </div>
    </form>
</script>

<script id="OcencaAutoFilesList" type="text/x-dot-template">
    {{~it.items :value:itm}}
    <tr class='text-center'>
        <td>{{=itm+1}}</td>
        <td><input type="checkbox" class="js-chose-file-change" data-id="{{=value.id}}" {{? value.chosen == 1}} checked {{?}}></td>
        <td><img src="{{=value.file_pach}}" alt="" width="50"></td>
        <td><a href="{{=value.file_pach}}" target="_blank">{{=value.name}}</a></td>
        <td>
            {{? value.type == 't'}} Технічна документація {{?}}
            {{? value.type == 'b'}} Бух.Дані {{?}}
            {{? value.type == 'f'}} Фото {{?}}
            {{? value.type == 'y'}} Установчи {{?}}
            {{? value.type == 'z'}} Різне {{?}}

        </td>
    </tr>
    {{~}}
</script>
<script id="OcencaAutoLiterList" type="text/x-dot-template">
    {{~it.items :value:itm}}
    <div class="row">
        <div class="col">
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" class="js-chose-liter-change" data-id="{{=value.id}}-{{=value.chose}}" {{? value.chose == 1}} checked {{?}}>
                    </div>
                </div>
                <div class="input-group-prepend col-11" style="overflow: hidden">
                    <span class="input-group-text col-12">{{=value.name}}</span>
                </div>
            </div>
        </div>
    </div>
    {{~}}
</script>