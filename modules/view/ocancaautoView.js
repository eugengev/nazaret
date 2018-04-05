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
                dateFormat: 'dd.mm.yy',
            });
        },

        onOcencaAutoAddZero: function() {
            $('#loader').show();
            var data =  { 'countOscenca' : this.container.find('.js-ocenca-count').val(), 'idm' : this.container.find('.js-maino-id').val(), 'idr' : this.container.find('.js-reestr-id').val(), 'type' : 'addzero'};
            $(nzr).trigger('OcencaAutoFormView.addOcencaZero', data);
        },

        showOcencaAddZero: function(event, data) {
            console.log(data);
            var template = this.renderTemplate('OcencaAutoTableRows', {items: data.items.items});
            this.container.find('.js-ocenca-auto-table-row').html(template);
            this.btnShowModalAuto = this.container.find('.js-open-modal-ocenca-auto');
            this.btnShowModalAuto.on('click', _.bind(this.getInfoOcencaAuto, this));
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
            console.log(data, onerow);
            this.container.find('.js-analog-ocenca-auto-avg').text(onerow);
        }


    });

    ns.OcencaAutoFormView = OcencaAutoFormView;

})(nzr.view);
