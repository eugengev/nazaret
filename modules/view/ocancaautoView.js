nzr.view = nzr.view || {};
(function(ns){

    function OcencaAutoFormView(OcenkaModel, OcenkasModel) {
        /** @type КууіекList */
        this.className = "OcencaAutoFormView";
        this.Ocenka = OcenkaModel || null;
        this.Ocenkas = OcenkasModel || null;
        this.init();
    }
    _.extend(OcencaAutoFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(OcencaAutoFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.ocenkainit = $('#ocenkainit');
            this.allcountocenka = $('#allcountocenka');
            this.getButtonList = $('#js-ocenka-list');
            this.autoNomDog = null;
            this.modalSpr = $('#sprModalCenter');

            $(nzr).on('OcencaAutoFormView.getOcencaView', _.bind(this.getOcencaView, this));
            $(nzr).on('OcencaAutoFormView.getOcencaShow', _.bind(this.getOcencaShow, this));
            $(nzr).on('OcencaAutoFormView.showOcencaAddZero', _.bind(this.showOcencaAddZero, this));
            $(nzr).on('OcencaAutoFormView.showOcencaAutoOne', _.bind(this.showOcencaAutoOne, this));
            $(nzr).on('OcencaAutoFormView.showOcencaAutoOneUpd', _.bind(this.showOcencaAutoOneUpd, this));
            $(nzr).on('OcencaAutoFormView.showOcencaAnalogAuto', _.bind(this.showOcencaAnalogAuto, this));
            $(nzr).on('OcencaAutoFormView.showCalcOcencaAnalogAuto', _.bind(this.showCalcOcencaAnalogAuto, this));
            $(nzr).on('OcencaAutoFormView.showOcencaFiles', _.bind(this.showOcencaFiles, this));
            $(nzr).on('OcencaAutoFormView.showOcencaLiterals', _.bind(this.showOcencaLiterals, this));
            $(nzr).on('OcencaAutoFormView.showOcencaAutoOneGK', _.bind(this.showOcencaAutoOneGK, this));


        },

        getOcencaView: function() {
            $('#loader').show();
            console.log('OcencaAutoFormView.getOcencaView');
            var btclick = $(event.currentTarget),
                data = { 'idm': btclick.data('id'), 'idr': btclick.data('rid') };
                console.log(data);
            $(nzr).trigger('OcencaAutoFormView.getOcencaInfo', data);
        },

        getOcencaShow: function(event, data) {
            console.log(data);
            var tempReestrFormFirst = this.renderTemplate('OcencaAutoForm', {ocenca:data.ocenca, reestr: data.reestr, items:data.items.items});
            this.container.html(tempReestrFormFirst);
            this.btAddZero = this.container.find('.js-ocenca-auto-add-zero');
            this.btAddZero.on('click', _.bind(this.onOcencaAutoAddZero, this));
            this.btnShowModalAuto = this.container.find('.js-open-modal-ocenca-auto');
            this.btnShowModalAuto.on('click', _.bind(this.getInfoOcencaAuto, this));
            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy'
            });

            this.btDeleteRow = this.container.find('.js-delete-ocenca-auto');
            this.btDeleteRow.on('click', _.bind(this.onOcencaAutoDeleteRow, this));

            this.btSaveOglad = this.container.find('.js-ocenca-auto-save-oglad');
            this.btSaveOglad.on('click', _.bind(this.onSaveOglad, this));

            this.container.find('input[name=oglad_date]').val(data.ocenca.oglad_date);
            this.container.find('input[name=oglad_sutok]').val(data.ocenca.oglad_sutok);
            this.container.find('input[name=oglad_prisut]').val(data.ocenca.oglad_prisut);

            var inputFileExcel = this.container.find('.js-file-input-excel');
            inputFileExcel.on('change', _.bind(this.loadFileExcel, this));

            this.btFileShow = this.container.find('.js-ocenca-show-files');
            this.btFileShow.on('click', _.bind(this.onShowFiles, this));

            this.btLiterShow = this.container.find('.js-ocenca-show-literal');
            this.btLiterShow.on('click', _.bind(this.onShowLiteral, this));

            this.btCreateFile = this.container.find('.js-ocenca-create-file');
            this.btCreateFile.on('click', _.bind(this.onCreateFile, this));
        },

        onSaveOglad: function() {
            $('#loader').show();
            var data = {
                'oglad_date' : this.container.find('input[name=oglad_date]').val(),
                'oglad_sutok' : this.container.find('input[name=oglad_sutok]').val() ,
                'oglad_prisut' : this.container.find('input[name=oglad_prisut]').val(),
                'type' : 'updateogljad',
                'id' : this.container.find('#idocenka').val()
            };
            $(nzr).trigger('OcenkaFormView.saveOcenkaInfo', data);
        },

        loadFileExcel: function(event) {
            $('#loader').show();
            var idForm = $(event.target).attr('id');

            console.log('Loadfile',idForm);

            $(nzr).trigger('OcencaAutoFormView.onLoadFiles', idForm);
        },

        onOcencaAutoAddZero: function() {
            $('#loader').show();
            var data =  { 'countOscenca' : this.container.find('.js-ocenca-count').val(), 'idm' : this.container.find('.js-maino-id').val(), 'idr' : this.container.find('.js-reestr-id').val(), 'type' : 'addzero'};
            $(nzr).trigger('OcencaAutoFormView.addOcencaZero', data);
        },

        onOcencaAutoDeleteRow: function() {
            $('#loader').show();
            var btclick = $(event.currentTarget),
                data = { 'idoa': btclick.data('ocencaautoid'),
                         'type' : 'deleterow',
                        'countOscenca' : this.container.find('.js-ocenca-count').val(),
                        'idm' : this.container.find('.js-maino-id').val(),
                    'idr' : this.container.find('.js-reestr-id').val()
                };
            console.log(data);
            $(nzr).trigger('OcencaAutoFormView.deleteOcencaRow', data);
        },

        showOcencaAddZero: function(event, data) {
            console.log(data);
            var template = this.renderTemplate('OcencaAutoTableRows', {items: data.items.items});
            this.container.find('.js-ocenca-auto-table-row').html(template);
            this.btnShowModalAuto = this.container.find('.js-open-modal-ocenca-auto');
            this.btnShowModalAuto.on('click', _.bind(this.getInfoOcencaAuto, this));
            this.btDeleteRow = this.container.find('.js-delete-ocenca-auto');
            this.btDeleteRow.on('click', _.bind(this.onOcencaAutoDeleteRow, this));
        },

        getInfoOcencaAuto: function() {
            $('#loader').show();
            var btclick = $(event.currentTarget),
                data = { 'idoa': btclick.data('ocencaautoid')};
            console.log(data);
            $(nzr).trigger('OcencaAutoFormView.getOcencaAutoOneInfo', data);
        },

        showOcencaAutoOne: function(event, data) {
            var d = new Date(),
                yeara = [],
                year = d.getFullYear();

            var i = 1970;
            while (i <= year) {
                yeara[i] = i;
                i++;
            }

            data['yeara'] = yeara;

            dataAuto = data;
            console.log(data);
            var template = this.renderTemplate('OcencaAutoOne', data);
            this.container.find('.js-analog-ocenca-auto-avg').text(data['sale_price']);
            this.container.find('.js-analog-ocenca-auto-avg2').text(data['sale_price_2']);
            this.container.find('.js-analog-ocenca-auto-avg3').text(data['sale_price_3']);
            this.container.find('.js-ocenca-auto-one').html(template);
            var options = {
                'show' : true
            };
            $('#ocencaAutoModal').modal(options);

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.formSubmit = this.container.find('.js-ocenca-auto-submit');
            this.formSubmit.on('click', _.bind(this.onSubmitForm, this));

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
            });

            this.bttonAddAnalog = this.container.find('.js-add-analog');
            this.bttonAddAnalog.on('click', _.bind(this.onAddAnalog, this));

            this.bttonRefreshAnalog = this.container.find('.js-refresh-analog');
            this.bttonRefreshAnalog.on('click', _.bind(this.onRefreshAnalog, this));

            data = {
                id : this.container.find('#formOcencaAutoOne input[name=id]').val()
            };
            $(nzr).trigger('OcencaAutoFormView.getAnalogInfo', data);


            this.inputCalcFull = this.container.find('.js-calc-auto-full-calc input, .js-calc-auto-full-calc select');
            this.inputCalcFull.on('change', _.bind(this.onCalcFull, this));

            this.inputCalcGk = this.container.find('.js-calc-auto-gk input');
            this.inputCalcGk.on('change', _.bind(this.onCalcFullGk, this));

            this.btnDeleteAnalog = this.container.find('.js-delete-analog-auto');
            this.btnDeleteAnalog.on('click', _.bind(this.onDeleteAnalog, this));

            // tinymce.init({
            //     selector: "textarea",
            //     plugins: "a11ychecker, advcode, linkchecker, media mediaembed, powerpaste, tinymcespellchecker",
            //     toolbar: "a11ycheck, code"
            // });
            this.teh_har = CKEDITOR.replace( 'teh_har' );

            this.btYearChose = this.container.find('.js-year-chose');
            this.btYearChose.on('change', _.bind(this.onYearChose, this));

            this.container.find('.js-calc-suto-itog').text(dataAuto.dz + ' %');
            var dz_json = JSON.parse(dataAuto.dz_json);

            for (var key in dz_json) {
                var obj = dz_json[key];
                for (var prop in obj) {
                    console.log(prop + " = " + obj[prop]);
                    if (prop == 'name') {
                        this.container.find('input[name='+obj[prop]+']').prop('checked',true);
                        this.container.find('input[name='+obj[prop]+']').change();
                    }
                }
            }

            this.container.find('.js-calc-auto-gk [name=koefic]').val(dataAuto['koefic']);
            this.container.find('.js-calc-auto-gk input[name=probeg_norm]').val(dataAuto['probeg_norm']);
            this.container.find('.js-calc-auto-gk input[name=probeg_fact]').val(dataAuto['probeg_fact']);
            this.container.find('.js-calc-auto-gk input[name=probeg_fact_sred]').val(dataAuto['probeg_fact_sred']);
            this.container.find('.js-calc-auto-gk input[name=probeg_nedop]').val(dataAuto['probeg_nedop']);
            this.container.find('.js-calc-auto-gk input[name=gk]').val(dataAuto['gk']);

        },

        onRefreshAnalog: function() {
            $('#loader').show();

            this.tableAnalog = this.container.find('.js-analog-ocenca-auto-row');
            var ocencaAutoAnalogList = new OcencaAutoAnalogList();
            this.tableAnalog.find('tr').each(function(){
                var ocencaAutoAnalog = new OcencaAutoAnalog();
                $(this).find('input[type=hidden],input[type=number],input[type=text],select').each(function(){
                    var name = $(this).attr('name'), val = $(this).val();
                    if (name != undefined) {
                        ocencaAutoAnalog[name] = val;
                    };
                });
                $(this).find('input:checked').each(function(){
                    var name = $(this).attr('name'), val = $(this).val();
                    if (name != undefined) {
                        ocencaAutoAnalog[name] = val;
                    };
                });
                $('input[name=sale_price_chose]:checked').each(function(){
                    var name = $(this).attr('name'), val = $(this).val();
                    if (name != undefined) {
                        ocencaAutoAnalog[name] = val;
                    };
                });
                ocencaAutoAnalogList.items.push(ocencaAutoAnalog);
            });


            $(nzr).trigger('OcencaAutoFormView.updAnalogInfo', ocencaAutoAnalogList);
        },

        onAddAnalog: function() {
            $('#loader').show();
            var field = {
                'link': this.container.find('.js-url-analog-add').val(),
                'id': this.container.find('#formOcencaAutoOne input[name=id]').val()
            };
            $(nzr).trigger('OcencaAutoFormView.addAnaloAuto', field);
        },

        onModalSprClick: function(event){
            $('#loader').show();
            this.modalSpr.data('name', event.currentTarget.dataset.name);
            this.modalSpr.data('table', event.currentTarget.dataset.spr);
            var field = {
                'idCity': 0,
                'idmarka': '',
                'table': event.currentTarget.dataset.spr
            };

            if (event.currentTarget.dataset.spr == 's_model') {
                field.idmarka = this.container.find('input[name=marka]').val();
            }

            field.idCity = 0;
            console.log(field);
            $(nzr).trigger('ReestrFormView.getListSpr', field);
        },

        onSubmitForm: function () {
            var ocencaAutoOne = new OcencaAutoItem();
            this.formone = this.container.find('#formOcencaAutoOne');
            this.formone.find('input,select,textarea').each(function () {
                var name = $(this).attr('name'), val = $(this).val();
                if (name != undefined) {
                    console.log(name, val);
                    ocencaAutoOne[name] = val;
                }
            });
            this.formone.find('input:checked').each(function () {
                var name = $(this).attr('name'), val = $(this).val();
                if (name != undefined) {
                    console.log(name, val);
                    ocencaAutoOne[name] = val;
                }
            });
            ocencaAutoOne['teh_har'] = this.teh_har.getData();
            console.log(ocencaAutoOne);
            $(nzr).trigger('OcencaAutoFormView.updOcencaInfo', ocencaAutoOne);

            // tinymce.init({
            //     selector: "textarea",
            //     plugins: "a11ychecker, advcode, linkchecker, media mediaembed, powerpaste, tinymcespellchecker",
            //     toolbar: "a11ycheck, code"
            // });
            this.teh_har = CKEDITOR.replace( 'teh_har' );

        },

        showOcencaAutoOneUpd: function(event, data) {
            var d = new Date(),
                yeara = [],
                year = d.getFullYear();

            var i = 1970;
            while (i <= year) {
                yeara[i] = i;
                i++;
            }

            data['yeara'] = yeara;

            var template = this.renderTemplate('OcencaAutoOne', data);
            this.container.find('.js-ocenca-auto-one').html(template);

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.formSubmit = this.container.find('.js-ocenca-auto-submit');
            this.formSubmit.on('click', _.bind(this.onSubmitForm, this));

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy'
            });
            this.btYearChose = this.container.find('.js-year-chose');
            this.btYearChose.on('change', _.bind(this.onYearChose, this))
            this.teh_har = CKEDITOR.replace( 'teh_har' );

        },

        getDayDelta: function (
            incomingDate, //новая дата
            todayDate //текущая дата
        ){
            var incomingDate = new Date(incomingDate[0],incomingDate[1]-1,incomingDate[2]),
                today = new Date(todayDate[0], todayDate[1]-1, todayDate[2]), delta;
            today.setHours(0);
            today.setMinutes(0);
            today.setSeconds(0);
            today.setMilliseconds(0);

            delta = incomingDate - today;

            return Math.round(delta / 1000 / 60 / 60/ 24);
        },

        onYearChose: function(){
            console.log('onYearChose');
            var dt = this.container.find('input[data-id="#datework"]').val(),
                db = this.container.find('input[name="datektsproiz"]').val(),
                dba = db.split('.'),
                dta = dt.split('.');

            var fulday =this.getDayDelta( [dta[2],dta[1],dta[0]], [dba[2],dba[1],dba[0]] );

            console.log(fulday);

            if (fulday > 365) {
                var  yf = Math.round(fulday/365);
            } else {
                var  yf = 0;
            }
            fulday = fulday - (yf*365);

            if (fulday > 30) {
                var  ym = Math.round(fulday/30);
            } else {
                var  ym = 0;
            }
            fulday = fulday - (ym*30);

            yd = fulday/30;

            console.log(yf, ym, yd, fulday);

            this.container.find('.js-fullyear').val(yf);
            this.container.find('.js-fullmonth').val(parseFloat(ym)+parseFloat(yd.toFixed(2)));


            // var year = this.btYearChose.val(),
            //     Xmas = new Date(),
            //     tekYear = Xmas.getFullYear(),
            //     razYear = tekYear - year,
            //     raMonth = (razYear * 12)-7;
            // console.log(Xmas);
            // console.log(year,tekYear,razYear,raMonth);
            // this.container.find('.js-fullyear').val(razYear);
            // this.container.find('.js-fullmonth').val(raMonth);
        },

        showOcencaAnalogAuto: function(event, data) {
            var template = this.renderTemplate('OcencaAutoAnalogTableRows', data), onerow = data['items'][0]['avgsum'];
            this.container.find('.js-analog-ocenca-auto-row').html(template);
            this.container.find('.js-analog-ocenca-auto-avg').text(onerow);
            this.container.find('.js-analog-ocenca-auto-avg2').text(data['items'][0]['avgsum2']);
            this.container.find('.js-analog-ocenca-auto-avg3').text(data['items'][0]['avgsum3']);
            this.btnDeleteAnalog = this.container.find('.js-delete-analog-auto');
            this.btnDeleteAnalog.on('click', _.bind(this.onDeleteAnalog, this));

            datta = {
                ocenca_auto_id : data['items'][0]['ocenca_auto_id']
            };
            $(nzr).trigger('OcencaAutoFormView.calcAnalogInfo', datta);
        },

        showCalcOcencaAnalogAuto: function(event, data) {
            console.log(data['avgsum']);
            this.container.find('.js-analog-ocenca-auto-avg').text(data['avgsum']);
            this.container.find('.js-analog-ocenca-auto-avg2').text(data['avgsum2']);
            this.container.find('.js-analog-ocenca-auto-avg3').text(data['avgsum3']);
            this.container.find('.js-analog-ocenca-auto-min').text(data['min']);
            this.container.find('.js-analog-ocenca-auto-max').text(data['max']);
            this.container.find('.js-analog-ocenca-auto-vid').text(data['vid']);
            this.container.find('input[name=sale_price_chose]').prop('checked',false);
            this.container.find('input[value='+data['sale_price_chose']+']').prop('checked',true);
        },

        onCalcFull: function () {
            var procent = 0, b1 = 0, b2 = 0, b3 = 0, b3 = 0, b4 = 0, k1 = 1;
            var dzArray = [];

            this.container.find('.js-calc-auto-plus input[type=checkbox]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b1 = parseFloat(b1) + parseFloat(parent.find('input[type=number]').val());
                dz = {
                    'chose' : 1,
                    'name'  : $(this).attr('name'),
                    'label' : parent.find('span').text(),
                    'value' : parseFloat(parent.find('input[type=number]').val())
                };
                dzArray.push(dz);
            });

            this.container.find('.js-calc-auto-minus-1 input[type=radio]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b2 = parseFloat(b2) - parseFloat(parent.find('input[type=number]').val());
                dz = {
                    'chose' : 1,
                    'name'  : $(this).attr('name'),
                    'label' : parent.find('span').text(),
                    'value' : parseFloat(parent.find('input[type=number]').val())
                };
                dzArray.push(dz);
            });

            this.container.find('.js-calc-auto-minus-2 input[type=checkbox]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b3 = parseFloat(b3) - parseFloat(parent.find('input[type=number]').val());
                dz = {
                    'chose' : 1,
                    'name'  : $(this).attr('name'),
                    'label' : parent.find('span').text(),
                    'value' : parseFloat(parent.find('input[type=number]').val())
                };
                dzArray.push(dz);
            });

            this.container.find('.js-calc-auto-minus-3 input[type=checkbox]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b4 = parseFloat(b4) - parseFloat(parent.find('input[type=number]').val());
                dz = {
                    'chose' : 1,
                    'name'  : $(this).attr('name'),
                    'label' : parent.find('span').text(),
                    'value' : parseFloat(parent.find('input[type=number]').val())
                };
                dzArray.push(dz);
            });

            if ( this.container.find('.js-analog-ocenca-auto-gruz').prop('checked') ) {
                k1 = parseFloat(k1) / 2;
            }

            if ( this.container.find('.js-analog-ocenca-auto-8-let').prop('checked') ) {
                k1 = parseFloat(k1) / 2;
            }

            this.container.find('.js-analog-ocenca-auto-itogo-minus').val(k1);

            // k1 = parseFloat(this.container.find('.js-analog-ocenca-auto-itogo-minus').val());

            procent =  parseFloat(b1) + parseFloat(b2) + (parseFloat(b3)*k1) + parseFloat(b4);

            this.container.find('.js-analog-ocenca-auto-itogo-minus').val((parseFloat(b3)*parseFloat(k1)));

            this.container.find('.js-calc-suto-itog').text(procent+' %');
            this.container.find('.js-calc-suto-itog').data('proc',procent);
            if (procent < 30 ) {
                this.container.find('.js-calc-suto-itog').removeClass('alert-danger').addClass('alert-success');
            } else {
                this.container.find('.js-calc-suto-itog').addClass('alert-danger').removeClass('alert-success');
            }

            var field = {
                'dz': procent,
                'dza': dzArray,
                'id': this.container.find('#formOcencaAutoOne input[name=id]').val(),
                'type': 'upadetedz'
            };
            $(nzr).trigger('OcencaAutoFormView.updOcencaDz', field);
        },

        onCalcFullGk: function () {

            var koefic = parseFloat(this.container.find('.js-calc-auto-gk [name=koefic]').val()),
                probeg_norm = parseFloat(this.container.find('.js-calc-auto-gk input[name=probeg_norm]').val()),
                fullyear = parseFloat(this.container.find('input[name=fullyear]').val()),
                fullmonth = parseFloat(this.container.find('input[name=fullmonth]').val()),
                probeg_fact = parseFloat(this.container.find('.js-calc-auto-gk input[name=probeg_fact]').val()),
                probeg_fact_sred = probeg_fact/(fullyear+(fullmonth/12)),
                probeg_nedop = probeg_fact_sred - probeg_norm;

            this.container.find('.js-calc-auto-gk input[name=probeg_fact_sred]').val(probeg_fact_sred);
            this.container.find('.js-calc-auto-gk input[name=probeg_nedop]').val(probeg_nedop);

            var field = {
                'koefic': koefic,
                'probeg_norm': probeg_norm,
                'id': this.container.find('#formOcencaAutoOne input[name=id]').val(),
                'fullyear': fullyear,
                'fullmonth': fullmonth,
                'probeg_fact': probeg_fact,
                'probeg_fact_sred': probeg_fact_sred,
                'probeg_nedop': probeg_nedop,
            };

            $(nzr).trigger('OcencaAutoFormView.updOcencaGK', field);
        },

        showOcencaAutoOneGK: function(event, data) {
            this.container.find('.js-calc-auto-gk [name=koefic]').val(data['koefic']);
            this.container.find('.js-calc-auto-gk input[name=probeg_norm]').val(data['probeg_norm']);
            this.container.find('.js-calc-auto-gk input[name=probeg_fact]').val(data['probeg_fact']);
            this.container.find('.js-calc-auto-gk input[name=probeg_fact_sred]').val(data['probeg_fact_sred']);
            this.container.find('.js-calc-auto-gk input[name=probeg_nedop]').val(data['probeg_nedop']);
            this.container.find('.js-calc-auto-gk input[name=gk]').val(data['gk']);
        },

        onDeleteAnalog: function () {
            var tr = $(event.currentTarget).parents('tr'),
                id = tr.find('input[name=id]').val();
            var field = {
                'link': '',
                'id': this.container.find('#formOcencaAutoOne input[name=id]').val(),
                'idd': id,
                'type': 'deleterow'
            };
            $(nzr).trigger('OcencaAutoFormView.addAnaloAuto', field);
        },


        showOcencaFiles: function(event, data) {
            console.log(data);
            var template = this.renderTemplate('OcencaAutoFilesList', {items: data.items});
            this.container.find('.js-ocenca-file-list').html(template);

            this.fileChange = this.container.find('.js-chose-file-change');
            this.fileChange.on('change', _.bind(this.onFileChange, this));

        },

        onFileChange: function(){
            $('#loader').show();
            var field = {
                'id' : this.container.find('#idocenka').val(),
                'idfile': $(event.currentTarget).data('id'),
                'type': 'changefile',
                'change': $(event.currentTarget).prop('checked')
            };
            $(nzr).trigger('OcencaAutoFormView.getOcencaFiles', field);

        },

        onShowFiles: function() {
            $('#loader').show();
            var field = {
                id : this.container.find('#idocenka').val()
            };
            $(nzr).trigger('OcencaAutoFormView.getOcencaFiles', field);
        },

        onShowLiteral: function() {
            $('#loader').show();
            var field = {
                id : this.container.find('#idocenka').val()
            };
            $(nzr).trigger('OcencaAutoFormView.getOcencaLiteral', field);
        },


        showOcencaLiterals: function(event, data) {
            console.log(data);
            var template = this.renderTemplate('OcencaAutoLiterList', {items: data.items});
            this.container.find('.js-ocenca-liter-list').html(template);

            this.fileChange = this.container.find('.js-chose-liter-change');
            this.fileChange.on('change', _.bind(this.onLitarlChange, this));

        },

        onLitarlChange: function(){
            $('#loader').show();
            var field = {
                'id' : this.container.find('#idocenka').val(),
                'idfile': $(event.currentTarget).data('id'),
                'type': 'changefile'
            };
            $(nzr).trigger('OcencaAutoFormView.getOcencaFiles', field);

        },


        onCreateFile: function() {
            $('#loader').show();
            var field = {
                id : this.container.find('#idocenka').val()
            };
            $(nzr).trigger('OcencaAutoFormView.onCreateFile', field);
        },

    });

    ns.OcencaAutoFormView = OcencaAutoFormView;

})(nzr.view);
