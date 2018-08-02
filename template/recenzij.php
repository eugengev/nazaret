<script id="RecenzijForm" type="text/x-dot-template">
    <form id="RecenzijForms">
        <div class='row'>
            <div class='col'>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Номер Рецензія</span>
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
                        <span class="input-group-text">Старий Номер Договору</span>
                    </div>
                    <input type="text" class="form-control" readonly name="old_nomber" value="{{=it.reestr.old_nomber}}" >
                </div>
            </div>
            <div class='col'>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID Договору</span>
                    </div>
                    <input type="text" class="form-control" readonly id="reestrid" value="{{=it.reestr.id}}" >
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
                        <span class="input-group-text">Дата Рецензія</span>
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
        <div class='row mb-5'>
            <div class='col'>
                <a href="/api/recenzij/doc_create.php?id={{=it.items.id}}" target="_blank" class="btn btn-sm btn-primary js-recenzij-create-word w-100" type="button">сформувати WORD файл</a>
            </div>
            <div class='col'>
                <a href="/api/recenzij/doc_create.php?id={{=it.items.id}}" target="_blank" class="btn btn-sm btn-primary js-recenzij-create-pdf w-100" type="button">сформувати PDF файл</a>
            </div>
        </div>

    <ul class="nav nav-pills mb-2" id="pills-ocencaauto_full" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pils-1-tab" data-toggle="pill" href="#pils-1" role="tab" aria-controls="pils-1" aria-selected="true"><i class="fa fa-cloud"></i> Загальна інформація</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-3-tab" data-toggle="pill" href="#pils-3" role="tab" aria-controls="pils-3" aria-selected="false"><i class="fa fa-cloud"></i> Рецензенти</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-4-tab" data-toggle="pill" href="#pils-4" role="tab" aria-controls="pils-4" aria-selected="false"><i class="fa fa-cloud"></i> Об'кти</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-5-tab" data-toggle="pill" href="#pils-5" role="tab" aria-controls="pils-5" aria-selected="false"><i class="fa fa-cloud"></i> Методологія</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pils-6-tab" data-toggle="pill" href="#pils-6" role="tab" aria-controls="pils-6" aria-selected="false"><i class="fa fa-cloud"></i> Зауваження - Висновок</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pils-1" role="tabpanel" aria-labelledby="pils-1-tab">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card forms">
                        <div class="card-header d-flex align-items-center">
                            <h4>Загальна інформація</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Назва звіту
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="nazva" rows="5" class="form-control">{{=it.items.nazva}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Опис звіту
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="opis" rows="5" class="form-control">{{=it.items.opis}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Замовник оцінки
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="zamov" class="form-control" rows="5">{{=it.items.zamov}}</textarea>
                                    <input type="hidden" name="id" value="{{=it.items.id}}">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Об'єкт оцінки <br>
                                    <button class="btn btn-outline-secondary js-add-obekt" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати об'єкт</button>
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="obekt" rows="5" class="form-control">{{=it.items.obekt}}</textarea>
                                </div>
                            </div>
                            <div class="js-block-obekt">
                                {{? it.items.obekt_list }}
                                    {{~it.items.obekt_list :value:itm}}
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label">Об'єкт {{=itm+1}}</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="obekt_list[]">{{=value}}</textarea>
                                            </div>
                                        </div>
                                    {{~}}
                                {{?}}
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Виеонавець
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="vikonav" class="form-control">{{=it.items.vikonav}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Оцінювач <br>
                                    <button class="btn btn-outline-secondary js-add-ocenchiki" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати оцінювачив</button>
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="ocenchiki" class="form-control">{{=it.items.ocenchiki}}</textarea>
                                </div>
                            </div>
                            <div class="js-block-ocenchiki" >
                                {{? it.items.ocenchiki_list }}
                                {{~it.items.ocenchiki_list :value:itm}}
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Оцінювач {{=itm+1}}</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="ocenchiki_list[]">{{=value}}</textarea>
                                    </div>
                                </div>
                                {{~}}
                                {{?}}
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Підстава для виконання оцінки
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="pidstava" rows="5" class="form-control">{{=it.items.pidstava}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Мета оцінки
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="meta"  rows="5" class="form-control">{{=it.items.meta}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Вид вартості
                                </label>
                                <div class="col-sm-10">
                                    <select name="vid" class="w-100">
                                        <option value="Ринкова вартість">Ринкова вартість</option>
                                    </select>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Дата оцінки
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control js-date" date-id="#data_ocenka" value="{{=it.items.data_ocenka}}">
                                    <input type="hidden" name="data_ocenka" value="{{=it.items.data_ocenka}}">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Використані методологічні підходи <br>
                                    <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_pidhodi" data-name="pidhodi" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="pidhodi" rows="5" class="form-control">{{=it.items.pidhodi}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Вартість об'єкта оцінки <br>
                                    <button class="btn btn-outline-secondary js-add-vartist" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати вартість</button>
                                </label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="vartist">{{=it.items.vartist}}</textarea>
                                </div>
                            </div>
                            <div class="js-block-vartist">
                                {{? it.items.vartist_list }}
                                {{~it.items.vartist_list :value:itm}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Об'єкта {{=itm+1}}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="vartist_list[]">{{=value}}</textarea>
                                        </div>
                                    </div>
                                    {{~}}
                                {{?}}
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Підстава для рецензування
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="pidstavaoc" rows="5" class="form-control">{{=it.items.pidstavaoc}}</textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Дата оцінки
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control js-date" date-id="#data_oforml" value="{{=it.items.data_oforml}}">
                                    <input type="hidden" name="data_oforml" value="{{=it.items.data_oforml}}">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Висновок по розділу №1
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="visnov1" rows="5" class="form-control">{{=it.items.visnov1}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade show" id="pils-3" role="tabpanel" aria-labelledby="pils-3-tab">
            <div class="col-lg-12">
                <div class="card forms">
                    <div class="card-header d-flex align-items-center">
                        <h4>Рецензенти</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Рецензенти
                                <br>
                                <button class="btn btn-primary btn-sm js-add-rezenzetami" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати Рецензенти</button>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="rezenzetami" rows="5">{{=it.items.rezenzetami}}</textarea>
                                <span class="text-small text-gray help-block-none">Якщо більше одного рецензенту треаба додати ще</span>
                            </div>
                        </div>
                        <div class="js-block-rezenzetami">
                            {{? it.items.rezenzetami_list }}
                            {{~it.items.rezenzetami_list :value:itm}}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Рецензент №{{=itm+1}}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="rezenzetami_list[]">{{=value}}</textarea>
                                </div>
                            </div>
                            {{~}}
                            {{?}}
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Висновок по розділу №2</label>
                            <div class="col-sm-10">
                                <textarea name="visnov2" class="form-control" rows="5">{{=it.items.visnov2}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-4" role="tabpanel" aria-labelledby="pils-4-tab">
            <div class="col-lg-12">
                <div class="card forms">
                    <div class="card-header d-flex align-items-center">
                        <h4>Об'кти</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Опис об'єктів оцінки
                                <br>
                                <button class="btn btn-outline-secondary js-add-opisobekt" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати об'єкти</button>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="opisobekt">{{=it.items.opisobekt}}</textarea>
                            </div>
                        </div>
                        <div class="js-block-opisobekt">
                            {{? it.items.opisobekt_list }}
                            {{~it.items.opisobekt_list :value:itm}}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">об'єкт №{{=itm+1}}</label>
                                <div class="col-sm-3">
                                    <textarea class="form-control" name="opisobekt_list[name][]">{{=value.name}}</textarea>
                                    <span class="text-small text-gray help-block-none">назва</span>
                                </div>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="opisobekt_list[opis][]">{{=value.opis}}</textarea>
                                    <span class="text-small text-gray help-block-none">опис</span>
                                </div>
                            </div>
                            {{~}}
                            {{?}}
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Опис об'єктів</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="opisobekt2">{{=it.items.opisobekt2}}</textarea>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Вхідні документі
                                <br>
                                <button class="btn btn-outline-secondary js-add-docum" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати документі</button>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="docum">{{=it.items.docum}}</textarea>
                            </div>
                        </div>
                        <div class="js-block-docum">
                            {{? it.items.docum_list }}
                            {{~it.items.docum_list :value:itm}}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">документ №{{=itm+1}}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="docum_list[]">{{=value}}</textarea>
                                </div>
                            </div>
                            {{~}}
                            {{?}}
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Візуалізація</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="vizual">{{=it.items.vizual}}</textarea>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Характеристика зовнішніх факторів</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5"  name="factori">{{=it.items.factori}}</textarea>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Якість оформлення звіту з оцінки <br>
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_jakist" data-name="jakist" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="jakist">{{=it.items.jakist}}</textarea>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Висновок по розділу №3
                                <br>
                                <button class="btn btn-outline-secondary js-add-docum" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати документі</button>
                            </label>
                            <div class="col-sm-10">
                                <textarea name="visnov3" rows="5" class="form-control">{{=it.items.visnov3}}</textarea>
                            </div>
                        </div>
                        <div class="js-block-visnov3">
                            {{? it.items.visnov3_list }}
                            {{~it.items.visnov3_list :value:itm}}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">№{{=itm+1}}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="visnov3_list[]">{{=value}}</textarea>
                                </div>
                            </div>
                            {{~}}
                            {{?}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-5" role="tabpanel" aria-labelledby="pils-5-tab">
            <div class="col-lg-12">
                <div class="card forms">
                    <div class="card-header d-flex align-items-center">
                        <h4>Мітодологія оцінки</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Обгрунтування базі оцінки <br>
                                <button class="btn btn-outline-secondary js-modal-sprv" data-spr="s_obgrunt" data-name="obgrunt" type="button"><i class="fa fa-list" aria-hidden="true"></i></button>
                            </label>
                            <div class="col-sm-10">
                                <textarea name="obgrunt" rows="5" class="form-control">{{=it.items.obgrunt}}</textarea>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Використані оцінювачем ...
                                <br>
                                <button class="btn btn-outline-secondary js-add-vikoroce" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати dисновок</button>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="rezenzetami" rows="5">{{=it.items.rezenzetami}}</textarea>
                                <span class="text-small text-gray help-block-none">Якщо більше одного рецензенту треаба додати ще</span>
                            </div>
                        </div>
                        <div class="js-block-vikoroce">
                            {{? it.items.vikoroce_list }}
                                {{~it.items.vikoroce_list :value:itm}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">№{{=itm+1}}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="vikoroce_list[]">{{=value}}</textarea>
                                        </div>
                                    </div>
                                {{~}}
                            {{?}}
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Висновок по розділу №4
                                <br>
                                <button class="btn btn-outline-secondary js-add-visnov4" type="button"><i class="fa fa-plus" aria-hidden="true"></i> додати висновок</button>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="rezenzetami" rows="5">{{=it.items.rezenzetami}}</textarea>
                                <span class="text-small text-gray help-block-none">Якщо більше одного рецензенту треаба додати ще</span>
                            </div>
                        </div>
                        <div class="js-block-visnov4" >
                            {{? it.items.visnov4_list }}
                            {{~it.items.visnov4_list :value:itm}}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">№{{=itm+1}}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="visnov4_list[]">{{=value}}</textarea>
                                </div>
                            </div>
                            {{~}}
                            {{?}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pils-6" role="tabpanel" aria-labelledby="pils-6-tab">
            <div class="col-lg-12">
                <div class="card forms">
                    <div class="card-header d-flex align-items-center">
                        <h4>Зауваження</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea name="obgruntuv" rows="5" class="form-control">{{=it.items.obgruntuv}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h4>Висновок</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea name="visnov" rows="5" class="form-control">{{=it.items.visnov}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class="col-lg-12">
            <div class="card forms">
                <a href="#" class="btn btn-success w-100 js-save-recenziij">Зберегти</a>
            </div>
        </div>
    </div>
    </form>
</script>
<script id="BlockObekt" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="obekt_list[]"></textarea>
    </div>
</script>
<script id="BlockOcenchiki" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="ocenchiki_list[]"></textarea>
    </div>
</script>
<script id="BlockVartist" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="vartist_list[]"></textarea>
    </div>
</script>
<script id="BlockRezenzetami" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="rezenzetami_list[]"></textarea>
    </div>
</script>
<script id="BlockOpisobekt" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text text-center">{{=it.nomber}}</span>
        </div>
        <div class="input-group-prepend">
            <span class="input-group-text text-center">название</span>
        </div>
        <textarea class="form-control" name="opisobekt_list[name][]"></textarea>
        <div class="input-group-prepend">
            <span class="input-group-text text-center">описание</span>
        </div>
        <textarea class="form-control" name="opisobekt_list[opis][]"></textarea>
    </div>
</script>
<script id="BlockDocum" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="docum_list[]"></textarea>
    </div>
</script>
<script id="BlockVisnov3" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="visnov3_list[]"></textarea>
    </div>
</script>
<script id="BlockVisnov4" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="visnov4_list[]"></textarea>
    </div>
</script>
<script id="BlockVikoroce" type="text/x-dot-template">
    <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend w-25">
            <span class="input-group-text w-100 text-center">{{=it.nomber}}</span>
        </div>
        <textarea class="form-control" name="vikoroce_list[]"></textarea>
    </div>
</script>