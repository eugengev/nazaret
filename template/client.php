<script id="ClientView-List" type="text/x-dot-template">
	<div class="text-right"><a href="#" class="btn btn-success js-add-client">Додати замовника</a></div>
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
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Від Замовника</span>
                            </div>
                            <select name="type" class="custom-select js-vid-zamov">
                                <option value="fo" >ФО</option>
                                <option value="fop">ФО-П</option>
                                <option value="yo" >ЮО</option>
                            </select>
                        </div>
                    </div>
                    <div class='col js-yo js-vid-hide'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Огр.Правова форма</span>
                            </div>
                            <input type="text" class="form-control" name="pravforma">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_pravforma" data-name="pravforma" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text js-fop js-yo js-vid-hide">Назва</span><span class="input-group-text js-fo js-vid-hide">П.І.Б.</span>
                            </div>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ЄДРПоУ/ІНН</span>
                            </div>
                            <input type="text" class="form-control" name="inn">
                        </div>
                    </div>
                </div>
                <div class="js-fo js-fop js-vid-hide">
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Паспорт СЕРИЯ</span>
                                </div>
                                <input type="text" class="form-control"  name="pasp_ser">
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Паспорт НОМЕР</span>
                                </div>
                                <input type="text" class="form-control"  name="pasp_nom">
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Дата Выдачи</span>
                                </div>
                                <input type="text" class="form-control js-date" data-id="#date1">
                                <input type="hidden" id="date1" name="pasp_data">
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Ким Видан</span>
                                </div>
                                <input type="text" class="form-control"  name="pasp_vidan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-fop js-vid-hide">
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Номер Свідотства</span>
                                </div>
                                <input type="text" class="form-control"  name="svid_nomer" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Дата Свідотства</span>
                                </div>
                                <input type="text" class="form-control js-date" data-id="#svid_date" >
                                <input type="hidden" id="svid_date" name="svid_date" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row js-yo js-vid-hide'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Посада керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_role" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_dir_role" data-name="dir_role" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Призвище Керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_fio">

                        </div>
                    </div>
                </div>
                <div class='row  js-yo js-vid-hide'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Діє на підставі</span>
                            </div>
                            <input type="text" class="form-control"  name="dover">
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="email">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone1">
                        </div>
                    </div>
                </div>
                <div class="row  js-yo js-vid-hide">
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Бухгалтер П.І.Б.</span>
                            </div>
                            <input type="text" class="form-control" name="buh_fio">
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="buh_email">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="buh_phone">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="buh_phone1">
                        </div>
                    </div>
                </div>
                <div class="js-yo js-vid-hide">
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Контактна особа П.І.Б.</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_fio">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Посада</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_posada">
                            </div>
                        </div>

                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">e-mail</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_email">
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Телефон</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_telefon">
                            </div>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col">
                            <button class="btn btn-outline-secondary js-osoba-dir" type="button">Контактна особа директор</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-secondary js-osoba-buh" type="button">Контактна особа бухгалтер</button>
                        </div>
                    </div>
                </div>

                <div class="js-yo js-fop js-vid-hide">
                    <div class='row'>
                        <div class='col'>
                            <h2 class='text-center'>Банк</h2>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Розразунковий рахунок</span>
                                </div>
                                <input type="text" class="form-control"  name="ras">
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">МФО банку</span>
                                </div>
                                <input type="text" class="form-control"  name="mfo">
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Назва банку</span>
                                </div>
                                <input type="text" class="form-control"  name="bank">
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class='text-center'>Доставка</h2>
                    </div>
                </div>
                <div class="row">
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Спосіб доставки</span>
                            </div>
                            <select name="delivertype" class="custom-select js-vid-zamov">
                                <option value="ykrp" >Укр Пошта</option>
                                <option value="npv">Нова Пошта відділення</option>
                                <option value="npk">Нова Пошта Курьер</option>
                            </select>
                        </div>
                    </div>
                </div>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-end text-center">
			<div class='col'><a href="#" class="btn btn-sm w-100 btn-success js-save-client-form">Сохранит</a></div>
			<div class='col'><a href="#" class="btn btn-sm w-100 btn-danger js-save-client-cancel">Отменить</a></div>
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
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Від Замовника</span>
                            </div>
                            <select name="type" class="custom-select js-vid-zamov">
                                <option {{? it.client.type == "fo"}} selected {{?}} value="fo" >ФО</option>
                                <option {{? it.client.type == "fop"}} selected {{?}}  value="fop">ФО-П</option>
                                <option {{? it.client.type == "yo"}} selected {{?}}  value="yo">ЮО</option>
                            </select>
                        </div>
                    </div>
                    <div class='col js-yo js-vid-hide'>
                        <div class="input-group input-group-sm mb-3">
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
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text js-fop js-yo js-vid-hide">Назва</span><span class="input-group-text js-fo js-vid-hide">П.І.Б.</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{=it.client.name}}" >
                            <input type="hidden" name="idc" value="{{=it.client.id}}">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ЄДРПоУ/ІНН</span>
                            </div>
                            <input type="text" class="form-control" name="inn" value="{{=it.client.inn}}" >
                        </div>
                    </div>
                </div>
                <div class="js-fo js-fop js-vid-hide">
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Паспорт СЕРИЯ</span>
                                </div>
                                <input type="text" class="form-control"  name="pasp_ser" value="{{=it.client.pasp_ser}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Паспорт НОМЕР</span>
                                </div>
                                <input type="text" class="form-control"  name="pasp_nom" value="{{=it.client.pasp_nom}}" >
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Дата Выдачи</span>
                                </div>
                                <input type="text" class="form-control js-date" data-id="#date1" value="{{=it.client.pasp_data}}" >
                                <input type="hidden" id="date1" name="pasp_data" value="{{=it.client.pasp_data}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Ким Видан</span>
                                </div>
                                <input type="text" class="form-control"  name="pasp_vidan" value="{{=it.client.pasp_vidan}}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-fop js-vid-hide">
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Номер Свідотства</span>
                                </div>
                                <input type="text" class="form-control"  name="svid_nomer" value="{{=it.client.svid_nomer}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Дата Свідотства</span>
                                </div>
                                <input type="text" class="form-control js-date" data-id="#svid_date" value="{{=it.client.svid_date}}" >
                                <input type="hidden" id="svid_date" name="svid_date" value="{{=it.client.svid_date}}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row js-yo js-vid-hide'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Посада керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_role" value="{{=it.client.dir_role}}" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_dir_role" data-name="dir_role" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Призвище Керівника</span>
                            </div>
                            <input type="text" class="form-control" name="dir_fio" value="{{=it.client.dir_fio}}" >

                        </div>
                    </div>
                </div>
                <div class='row  js-yo js-vid-hide'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Діє на підставі</span>
                            </div>
                            <input type="text" class="form-control"  name="dover" value="{{=it.client.dover}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="email" value="{{=it.client.email}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone" value="{{=it.client.phone}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="phone1" value="{{=it.client.phone1}}" >
                        </div>
                    </div>
                </div>
                <div class="row  js-yo js-vid-hide">
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Бухгалтер П.І.Б.</span>
                            </div>
                            <input type="text" class="form-control" name="buh_fio" value="{{=it.client.buh_fio}}" >
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">e-mail</span>
                            </div>
                            <input type="email" class="form-control"  name="buh_email" value="{{=it.client.buh_email}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control"  name="buh_phone" value="{{=it.client.buh_phone}}" >
                        </div>
                    </div>
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Моб телефон</span>
                            </div>
                            <input type="text" class="form-control"  name=buh_"phone1" value="{{=it.client.buh_phone1}}" >
                        </div>
                    </div>
                </div>
                <div class="js-yo js-vid-hide">
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Контактна особа П.І.Б.</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_fio" value="{{=it.client.osoba_fio}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Посада</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_posada" value="{{=it.client.osoba_posada}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">e-mail</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_email" value="{{=it.client.osoba_email}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Телефон</span>
                                </div>
                                <input type="text" class="form-control" name="osoba_telefon" value="{{=it.client.osoba_telefon}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col">
                            <button class="btn btn-sm btn-outline-secondary js-osoba-dir" type="button">Контактна особа директор</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-outline-secondary js-osoba-buh" type="button">Контактна особа бухгалтер</button>
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
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm" name="oblast_f"  data-name="oblast"  value="{{=it.adf.oblast}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_oblast" data-name="oblast_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm" name="raion_f"  data-name="raion"  value="{{=it.adf.raion}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_raion" data-name="raion_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_pynkt_f" data-name="t_pynkt" value="{{=it.adf.t_pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="pynkt_f" data-name="pynkt" value="{{=it.adf.pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_a_city" data-name="pynkt_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_street_f"  data-name="t_street" value="{{=it.adf.t_street}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_street" data-name="t_street_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
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
                <div class='row js-yo js-vid-hide'>
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
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm" name="oblast_s"  data-name="oblast"  value="{{=it.ad2.oblast}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_oblast" data-name="oblast_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm" name="raion_s"  data-name="raion"  value="{{=it.ad2.raion}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_raion" data-name="raion_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_pynkt_s" data-name="t_pynkt" value="{{=it.ad2.t_pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="pynkt_s" data-name="pynkt" value="{{=it.ad2.pynkt}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_a_city" data-name="pynkt_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="t_street_s"  data-name="t_street" value="{{=it.ad2.t_street}}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_street" data-name="t_street_s" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
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
                <div class="js-yo js-fop js-vid-hide">
                    <div class='row'>
                        <div class='col'>
                            <h2 class='text-center'>Банк</h2>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Розразунковий рахунок</span>
                                </div>
                                <input type="text" class="form-control"  name="ras" value="{{=it.client.ras}}" >
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">МФО банку</span>
                                </div>
                                <input type="text" class="form-control"  name="mfo" value="{{=it.client.mfo}}" >
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Назва банку</span>
                                </div>
                                <input type="text" class="form-control"  name="bank" value="{{=it.client.bank}}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h2 class='text-center'>Доставка</h2>
                    </div>
                </div>
                <div class="row">
                    <div class='col'>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Спосіб доставки</span>
                            </div>
                            <select name="delivertype" class="custom-select js-vid-zamov">
                                <option {{? it.client.delivertype == "ykrp"}} selected {{?}} value="ykrp" >Укр Пошта</option>
                                <option {{? it.client.delivertype == "npv"}} selected {{?}}  value="npv">Нова Пошта відділення</option>
                                <option {{? it.client.delivertype == "npk"}} selected {{?}}  value="npk">Нова Пошта Курьер</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div data-addid="{{=it.ady.id}}" class="js-tr">
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Индекс</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="zip" value="{{=it.ady.zip}}" ><input type="hidden" name="id" value="{{=it.ady.id}}">
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Область</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="oblast_y"  data-name="oblast"  value="{{=it.ady.oblast}}" >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_oblast" data-name="oblast_y" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Район</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="raion_y"  data-name="raion"  value="{{=it.ady.raion}}" >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_raion" data-name="raion_y" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">тип.населен</span>
                                </div>
                                <input type="text" class="form-control" name="t_pynkt_f" data-name="t_pynkt" value="{{=it.ady.t_pynkt}}" >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_pynkt" data-name="t_pynkt_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">населеный пункт</span>
                                </div>
                                <input type="text" class="form-control" name="pynkt_y" data-name="pynkt" value="{{=it.ady.pynkt}}" >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_a_city" data-name="pynkt_y" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">тип.улици</span>
                                </div>
                                <input type="text" class="form-control" name="t_street_f"  data-name="t_street" value="{{=it.ady.t_street}}" >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_street" data-name="t_street_f" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">улица</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="street" value="{{=it.ady.street}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">дом</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="dom" value="{{=it.ady.dom}}" >
                            </div>
                        </div>
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">кв</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="kv" value="{{=it.ady.kv}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Відділення новой пошти</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="np" value="{{=it.ady.np}}" >
                            </div>
                        </div>
                        <div class="col">
                            <a href="#" class="btn w-100 btn-sm btn-success js-save-addr-firma-form"><i class="fa fa-save"></i> Зберегти адресу доставки</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-end text-center">
            <div class='col'><a href="#" class="btn bt-sm w-100 btn-success js-edit-client-form">Зберегти</a></div>
            <div class='col'><a href="#" class="btn bt-sm w-100 btn-danger js-edit-client-cancel">Закрити</a></div>
        </div>
    </div>
</script>
