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

            var inputFileExcel = this.container.find('.js-file-input-excel');
            inputFileExcel.on('change', _.bind(this.loadFileExcel, this));
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
                data = { 'idoa': btclick.data('ocencaautoid'), 'type' : 'deleterow', 'countOscenca' : this.container.find('.js-ocenca-count').val(), 'idm' : this.container.find('.js-maino-id').val(), 'idr' : this.container.find('.js-reestr-id').val()};
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


            this.inputCalcFull = this.container.find('.js-calc-auto-full-calc input');
            this.inputCalcFull.on('change', _.bind(this.onCalcFull, this));

            this.inputCalcGk = this.container.find('.js-calc-auto-gk input');
            this.inputCalcGk.on('change', _.bind(this.onCalcFullGk, this));

            this.btnDeleteAnalog = this.container.find('.js-delete-analog-auto');
            this.btnDeleteAnalog.on('click', _.bind(this.onDeleteAnalog, this));
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
                ocencaAutoAnalogList.items.push(ocencaAutoAnalog);
            });

            $(nzr).trigger('OcencaAutoFormView.updAnalogInfo', ocencaAutoAnalogList);

            this.btnDeleteAnalog = this.container.find('.js-delete-analog-auto');
            this.btnDeleteAnalog.on('click', _.bind(this.onDeleteAnalog, this));
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
            this.formone.find('input,select').each(function () {
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
            console.log(ocencaAutoOne);
            $(nzr).trigger('OcencaAutoFormView.updOcencaInfo', ocencaAutoOne);
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
                dateFormat: 'dd.mm.yy',
            });
        },

        showOcencaAnalogAuto: function(event, data) {
            var template = this.renderTemplate('OcencaAutoAnalogTableRows', data), onerow = data['items'][0]['avgsum'];
            this.container.find('.js-analog-ocenca-auto-row').html(template);
            this.container.find('.js-analog-ocenca-auto-avg').text(onerow);
            this.container.find('.js-analog-ocenca-auto-avg2').text(data['items'][0]['avgsum2']);
            this.container.find('.js-analog-ocenca-auto-avg3').text(data['items'][0]['avgsum3']);
            this.btnDeleteAnalog = this.container.find('.js-delete-analog-auto');
            this.btnDeleteAnalog.on('click', _.bind(this.onDeleteAnalog, this));

        },

        showCalcOcencaAnalogAuto: function(event, data) {
            console.log(data['avgsum']);
            this.container.find('.js-analog-ocenca-auto-avg').text(data['avgsum']);
            this.container.find('.js-analog-ocenca-auto-avg2').text(data['avgsum2']);
            this.container.find('.js-analog-ocenca-auto-avg3').text(data['avgsum3']);
            this.container.find('.js-analog-ocenca-auto-min').text(data['min']);
            this.container.find('.js-analog-ocenca-auto-max').text(data['max']);
            this.container.find('.js-analog-ocenca-auto-vid').text(data['vid']);
        },

        onCalcFull: function () {
            var procent = 0, b1 = 0, b2 = 0, b3 = 0, b3 = 0, b4 = 0, k1 = 1;

            this.container.find('.js-calc-auto-plus input[type=checkbox]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b1 = parseFloat(b1) + parseFloat(parent.find('input[type=number]').val());
            });

            this.container.find('.js-calc-auto-minus-1 input[type=radio]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b2 = parseFloat(b2) - parseFloat(parent.find('input[type=number]').val());
            });

            this.container.find('.js-calc-auto-minus-2 input[type=checkbox]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b3 = parseFloat(b3) - parseFloat(parent.find('input[type=number]').val());
            });

            this.container.find('.js-calc-auto-minus-3 input[type=checkbox]:checked').each(function () {
                var parent = $(this).parents('.input-group');
                b4 = parseFloat(b4) - parseFloat(parent.find('input[type=number]').val());
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
            this.container.find('.js-calc-suto-itog').data('proc',procent+' %');
            if (procent < 30 ) {
                this.container.find('.js-calc-suto-itog').removeClass('alert-danger').addClass('alert-success');
            } else {
                this.container.find('.js-calc-suto-itog').addClass('alert-danger').removeClass('alert-success');
            }
        },

        onCalcFullGk: function () {

            var koefic = parseFloat(this.container.find('.js-calc-auto-gk input[name=koefic]').val()),
                probeg_norm = parseFloat(this.container.find('.js-calc-auto-gk input[name=probeg_norm]').val()),
                fullyear = parseFloat(this.container.find('input[name=fullyear]').val()),
                probeg_fact = parseFloat(this.container.find('.js-calc-auto-gk input[name=probeg_fact]').val()),
                probeg_fact_sred = probeg_fact/fullyear,
                probeg_nedop = probeg_fact_sred - probeg_norm;

                this.container.find('.js-calc-auto-gk input[name=probeg_fact_sred]').val(probeg_fact_sred);
                this.container.find('.js-calc-auto-gk input[name=probeg_nedop]').val(probeg_nedop);

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
        }


    });

    ns.OcencaAutoFormView = OcencaAutoFormView;

})(nzr.view);
