nzr.view = nzr.view || {};
(function(ns){

    function OcenkaFormView(OcenkaModel, OcenkasModel) {
        /** @type КууіекList */
        this.className = "OcenkaFormView";
        this.Ocenka = OcenkaModel || null;
        this.Ocenkas = OcenkasModel || null;
        this.init();
    }
    _.extend(OcenkaFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(OcenkaFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.ocenkainit = $('#ocenkainit');
            this.allcountocenka = $('#allcountocenka');
            this.getButtonList = $('#js-ocenka-list');
            this.autoNomDog = null;

            // this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            this.getButtonList.on('click', _.bind(this.onClickOcenkasList, this));
            $(nzr).on('OcenkaFormController.getOcenkaList', _.bind(this.showOcenkaList, this));
            $(nzr).on('OcenkaFormController.showOcenkaInit', _.bind(this.showOcenkaInit, this));

        },

        onClickOcenkasList: function(event) {
            $('#loader').show();
            $(nzr).trigger('OcenkaFormView.getOcenkaList');
        },


        showOcenkaList: function(event, ocenkaList) {
            var tempReestrFormFirst = this.renderTemplate('OcenkaFormView-List', {"items": ocenkaList.items}),
                self = this;
            this.container.html(tempReestrFormFirst);
            this.btnOcencaAuto = this.container.find('.js-ocenca-auto');
            this.btnOcencaAuto.on('click', _.bind(this.onOcencaAuto, this));
            this.btnRecenzij = this.container.find('.js-recenzij');
            this.btnRecenzij.on('click', _.bind(this.onRecenzij, this));
        },

        showOcenkaInit: function(event, ocentainit) {
            var allcount = 0;
            console.log(ocentainit);
            ocentainit.items.forEach(function(element) {
                console.log(element);
                allcount = element.count;
            });
            this.allcountocenka.text(allcount);
            var tempReestrFormFirst = this.renderTemplate('OcenkaFormView-Init', {"items": ocentainit.items}),
                self = this;
            this.ocenkainit.html(tempReestrFormFirst);

        },

        onOcencaAuto: function (event ) {
            $('#loader').show();
            $(nzr).trigger('OcencaAutoFormView.getOcencaView');
        },

        onRecenzij: function (event ) {
            $('#loader').show();
            $(nzr).trigger('RecenzijFormView.getRecenzijView');
        }

    });

    ns.OcenkaFormView = OcenkaFormView;

})(nzr.view);
