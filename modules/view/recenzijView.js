nzr.view = nzr.view || {};
(function(ns){

    function RecenzijFormView(OcenkaModel, OcenkasModel) {
        /** @type КууіекList */
        this.className = "RecenzijFormView";
        this.Ocenka = OcenkaModel || null;
        this.Ocenkas = OcenkasModel || null;
        this.init();
    }
    _.extend(RecenzijFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(RecenzijFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.ocenkainit = $('#ocenkainit');
            this.allcountocenka = $('#allcountocenka');
            this.getButtonList = $('#js-ocenka-list');
            this.autoNomDog = null;
            this.modalSpr = $('#sprModalCenter');

            $(nzr).on('RecenzijFormView.getRecenzijView', _.bind(this.getRecenzijView, this));
            $(nzr).on('RecenzijFormView.getRecenzijShow', _.bind(this.getRecenzijShow, this));
        },

        getRecenzijView: function() {
            $('#loader').show();
            console.log('RecenzijFormView.getOcencaView');
            var btclick = $(event.currentTarget),
                data = { 'idm': btclick.data('id'), 'idr': btclick.data('rid') };
                console.log(data);
            $(nzr).trigger('RecenzijFormView.getRecenzijInfo', data);
        },

        getRecenzijShow: function(event, data) {
            console.log(data);
            var tempReestrFormFirst = this.renderTemplate('RecenzijForm', {ocenca:data.ocenca, reestr: data.reestr, items:data.items});
            this.container.html(tempReestrFormFirst);
            this.btSave = this.container.find('.js-save-recenziij');
            this.btSave.on('click', _.bind(this.onSaveForm, this));

            this.btAddObekt = this.container.find('.js-add-obekt');
            this.btAddObekt.on('click', _.bind(this.onAddObekt, this));

            this.btAddOcenchiki = this.container.find('.js-add-ocenchiki');
            this.btAddOcenchiki.on('click', _.bind(this.onAddOcenchiki, this));

            this.btAddVartist = this.container.find('.js-add-vartist');
            this.btAddVartist.on('click', _.bind(this.onAddVartist, this));

            this.btAddRezenzetami = this.container.find('.js-add-rezenzetami');
            this.btAddRezenzetami.on('click', _.bind(this.onAddRezenzetami, this));

            this.btAddOpisobekt = this.container.find('.js-add-opisobekt');
            this.btAddOpisobekt.on('click', _.bind(this.onAddOpisobekt, this));

            this.btAddDocum = this.container.find('.js-add-docum');
            this.btAddDocum.on('click', _.bind(this.onAddDocum, this));

            this.btAddVisnov3 = this.container.find('.js-add-visnov3');
            this.btAddVisnov3.on('click', _.bind(this.onAddVisnov3, this));

            this.btAddVisnov4 = this.container.find('.js-add-visnov4');
            this.btAddVisnov4.on('click', _.bind(this.onAddVisnov4, this));

            this.btAddVikoroce = this.container.find('.js-add-vikoroce');
            this.btAddVikoroce.on('click', _.bind(this.onAddVikoroce, this));

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                }
            });
            this.container.find('.js-date').each(function(){
                var datea = $(this).val(),
                    dateaі = datea.split('.');
                $($(this).data('id')).val(dateaі[2]+'-'+dateaі[1]+'-'+dateaі[0]);
            });

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

        },

        onModalSprClick: function(event){
            $('#loader').show();
            this.modalSpr.data('name', event.currentTarget.dataset.name);
            this.modalSpr.data('table', event.currentTarget.dataset.spr);
            var field = {
                'idCity': this.container.find('input[name="city"]').data('id'),
                'table': event.currentTarget.dataset.spr
            };
            if (event.currentTarget.dataset.spr == 's_manager') {
                console.log(field);
                $(nzr).trigger('ReestrFormView.getListSpr', field);
            } else {
                field.idCity = 0;
                console.log(field);
                $(nzr).trigger('ReestrFormView.getListSpr', field);
            }
        },

        onSaveForm: function() {
            $('#loader').show();
            var form_data = new FormData($('form#RecenzijForms')[0]);
            $(nzr).trigger('RecenzijFormView.saveRecenzijForm', form_data);
        },

        onAddObekt: function() {
            this.blockObekt = this.container.find('.js-block-obekt');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockObekt', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddOcenchiki: function() {
            this.blockObekt = this.container.find('.js-block-ocenchiki');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockOcenchiki', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddVartist: function() {
            this.blockObekt = this.container.find('.js-block-vartist');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockVartist', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddRezenzetami: function() {
            this.blockObekt = this.container.find('.js-block-rezenzetami');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockRezenzetami', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddOpisobekt: function() {
            this.blockObekt = this.container.find('.js-block-opisobekt');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockOpisobekt', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddDocum: function() {
            this.blockObekt = this.container.find('.js-block-docum');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockDocum', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddVisnov3: function() {
            this.blockObekt = this.container.find('.js-block-visnov3');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockVisnov3', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddVisnov4: function() {
            this.blockObekt = this.container.find('.js-block-visnov3');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockVisnov4', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

        onAddVikoroce: function() {
            this.blockObekt = this.container.find('.js-block-vikoroce');
            var count = this.blockObekt.find('textarea').length+1;

            var tempBlockObekt = this.renderTemplate('BlockVikoroce', {nomber:count});
            this.blockObekt.append(tempBlockObekt);
        },

    });

    ns.RecenzijFormView = RecenzijFormView;

})(nzr.view);
