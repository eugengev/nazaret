nzr.view = nzr.view || {};
(function(ns){

    function ReestrFormView(model, modelClient) {
        /** @type КууіекList */
        this.className = "ReestrFormView";
        this.model = model || null;
        this.modelClient = modelClient || null;
        this.modelFirma = modelClient || null;
        this.modelCity = modelClient || null;
        this.modelBank = modelClient || null;
        this.modelList = modelClient || null;
        this.init();
    }
    _.extend(ReestrFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(ReestrFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.nameContainer = $('#nameController');
            this.menuOrganiz = $('#listReestr');
            this.modalSpr = $('#sprModalCenter');
            this.autoNomDog = null;

            this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            $(nzr).on('ReestrFormController.requestListSuccess', _.bind(this.onListReestr, this));
            $(nzr).on('ReestrFormController.listClientSuccess', _.bind(this.onListClientAuto, this));
            $(nzr).on('ReestrFormController.listFirmaSuccess', _.bind(this.onListFirmaAuto, this));
            $(nzr).on('ReestrFormController.listCitySuccess', _.bind(this.onListCityAuto, this));
            $(nzr).on('ReestrFormController.listBankSuccess', _.bind(this.onListBankAuto, this));
            $(nzr).on('ReestrFormController.listManagerSuccess', _.bind(this.onListManagerAuto, this));
            $(nzr).on('ReestrFormController.addForm', _.bind(this.onReestrForm, this));
            $(nzr).on('ReestrFormController.sprModal', _.bind(this.onModalSprOpen, this));
            $(nzr).on('ReestrFormController.nomerDog', _.bind(this.changeNomerDog, this));
            // $(nzr).on('ReestrFormController.onTrClickSpr', _.bind(this.onTrClickSpr, this));

        },

        onSaveActNomerDate: function(){
            var data = { nomer: $('#nomer-act').val(), date: $('#date-act').val(), idr: $('#reestrid').val()  };
            $(nzr).trigger('ReestrFormView.saveActDateNomer', data);
        },

        changeNomerDog: function (event, nomer) {
            this.container.find('input[name="nomber"]').val(nomer);
        },

        onClickMenu: function() {
            $(nzr).trigger('ReestrFormView.listReestr');
        },

        onClickEdit: function(event) {
            $('#loader').show();
            $(nzr).trigger('ReestrFormView.EditReestr', event.currentTarget.dataset.id);
        },

        onClickDelete: function(event) {
            $('#loader').show();
            $(nzr).trigger('ReestrFormView.DeleteReestr', event.currentTarget.dataset.id);
        },

        onListReestr: function(event, modelList){
            this.nameContainer.text(this.menuOrganiz.text());
            this.model = modelList;
            var pages = [];
            for (var i = 0; i < this.model.items[0].countpage; i++) {
                pages.push(i);
            }
            console.log(pages);
            var tempOrgzniList = this.renderTemplate('ReestrFormView-List',{"items": this.model.items, "page": pages});
            this.container.html(tempOrgzniList);

            this.buttonsAddOrder = this.container.find('.js-add-new-order');
            this.buttonsAddOrder.on('click', _.bind(this.onAddReestrForm, this));

            this.buttonsPageOrder = this.container.find('.js-reestr-page-show');
            this.buttonsPageOrder.on('click', _.bind(this.onPageReestrForm, this));

            this.buttonsEditOrder = this.container.find('.js-edit-reestr-item');
            this.buttonsEditOrder.on('click', _.bind(this.onClickEdit, this));

            this.buttonsDeleteOrder = this.container.find('.js-delete-reestr-item');
            this.buttonsDeleteOrder.on('click', _.bind(this.onClickDelete, this));
        },

        onPageReestrForm: function(event) {
            $('#loader').show();
            var page = event.currentTarget.dataset.page;
            $(nzr).trigger('ReestrFormView.getReestrPage', page);
        },

        onChangeFirmForAutoNombr: function() {
            var nomFirmi = this.autoNomDog.data('id');
            $(nzr).trigger('ReestrFormView.getListNomFirm', nomFirmi);
        },

        onAddReestrForm: function(event, modelList){
            $('#loader').show();
            var tempReestrFormFirst = this.renderTemplate('ReestrFormView-AddFirst'), self = this;
            this.container.html(tempReestrFormFirst);
            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                }
            });
            this.buttonsCancelOrder = this.container.find('.js-reestr-cancel');
            this.buttonsCancelOrder.on('click', _.bind(this.onClickMenu, this));

            this.autoNomDog = this.container.find('.js-auto-firma');
            this.autoNomDog.on('change', _.bind(this.onChangeFirmForAutoNombr, this));

            this.formFirst = this.container.find('#js-add-form-info-first');
            this.formFirst.validate({
                rules: {
                    nomber: {
                        required: true
                    },
                    datework: {
                        required: true
                    },
                    date: {
                        required: true
                    },
                    client: {
                        required: true
                    },
                    firma: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    meta: {
                        required: true
                    },
                    bank: {
                        required: true
                    },
                    manager: {
                        required: true
                    }
                },
                submitHandler: function(form) {
                    console.log('eee');
                    self.onSaveFirstForm();
                }
            });

            this.buttonsFirstForm = this.container.find('.js-save-first-form');
            this.buttonsFirstForm.click(function(){
                self.formFirst.submit();
            });

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            $(nzr).trigger('ReestrFormView.listFirma');
            // $(nzr).trigger('ReestrFormView.listClient');
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

        onModalSprOpen: function(event, sprList){
            this.modelList = sprList;
            var tempReestrFormFirst = this.renderTemplate('ReestrFormView-TableSpr', this.modelList), self = this;
            this.modalSpr.find('.js-modal-body').html(tempReestrFormFirst);
            var trClick = this.modalSpr.find('.js-Spr-Items-click');
            trClick.on('click', _.bind(this.onTrClickSpr, this));
            $('#sprModalCenter').modal('show')
        },

        onTrClickSpr: function (event) {
            var id = event.currentTarget.dataset.id,
                name = event.currentTarget.dataset.value,
                nameImput = this.modalSpr.data('name');
            var input = this.container.find('input[name="'+nameImput+'"]');
            input.val(name);
            input.data('id',id);
            input.change();
            $('#sprModalCenter').modal('hide')
        },

        onReestrForm: function(event, modelOne){
            this.model = modelOne;
            var tempReestrFormFirst = this.renderTemplate('ReestrFormView-AddSecond', this.model), self = this,
                tempMainoForm = this.renderTemplate('ReestrFormView-TableMaino');

            this.container.html(tempReestrFormFirst);
            var $Maino = this.container.find('.js-table-work'),
                $MainoAdd = this.container.find('.js-add-maino');
            $Maino.html(tempMainoForm);
            $MainoAdd.on('click', _.bind(this.onClickAddRowMaino, this));

            this.buttonsCancelOrder = this.container.find('.js-reestr-cancel');
            this.buttonsCancelOrder.on('click', _.bind(this.onClickMenu, this));

            this.buttonsSaveMaino = this.container.find('.js-reestr-rows');
            this.buttonsSaveMaino.on('click', _.bind(this.onSaveMaino, this));

            $(nzr).trigger('ReestrFormView.getListRowMaino',  this.model.id);

            this.buttonsOpenTabFile = this.container.find('.js-open-file-tab');
            this.buttonsOpenTabFile.on('click', _.bind(this.onOpenTabFile, this));

            this.buttonsOnSaveAct = this.container.find('.js-act-nomer-save');
            this.buttonsOnSaveAct.on('click', _.bind(this.onSaveActNomerDate, this));

            this.buttonsOnSendEmail = this.container.find('.js-send-to-email');
            this.buttonsOnSendEmail.on('click', _.bind(this.onSendEmail, this));

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    console.log(selectedDate);
                    console.log($(this).data('id'));
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                    console.log($($(this).data('id')).val());


                }
            });
        },

        onSendEmail: function (event) {
            var data = { link: '/'+$(event.target).data('link') };
            console.log(data);
            $(nzr).trigger('ReestrFormView.sendEmail', data);
        },

        onOpenTabFile: function(){
            $(nzr).trigger('ReestrFormView.openTabFile');
        },

        onSaveMaino: function(){
            $(nzr).trigger('ReestrFormView.onSaveMaino');
        },

        onClickAddRowMaino: function(){
            $(nzr).trigger('ReestrFormView.addRowTable');
        },

        onListClientAuto: function(event, modelListClient, modelListFirma){
            this.modelClient = modelListClient;
            this.modelFirma = modelListClient;
            var availableTags = [], city;

            this.modelClient.items.forEach(function(elementin) {
                city = { 'value':elementin["id"], 'label':elementin["name"] };
                availableTags.push(city);
            });

            this.container.find('.js-auto-client').autocomplete({
                source: availableTags,
                select: function( event, ui ) {
                    $(this).data('id',ui.item.value);
                    $(this).val(ui.item.label);
                    return false;
                }
            });
        },

        onListFirmaAuto: function(event, modelList){
            this.modelFirma = modelList;
            var availableTags = [], city;

            this.modelFirma.items.forEach(function(elementin) {
                city = { 'value':elementin["id"], 'label':elementin["name"] };
                availableTags.push(city);
            });

            this.container.find('.js-auto-firma').autocomplete({
                source: availableTags,
                select: function( event, ui ) {
                    $(this).data('id',ui.item.value);
                    $(this).val(ui.item.label);
                    return false;
                }
            });
        },

        onListCityAuto: function(event, modelList){
            this.modelCity = modelList;
            var availableTags = [], city;

            this.modelCity.items.forEach(function(elementin) {
                city = { 'value':elementin["id"], 'label':elementin["name"] };
                availableTags.push(city);
            });

            this.container.find('.js-auto-city').autocomplete({
                source: availableTags,
                select: function( event, ui ) {
                    $(this).data('id',ui.item.value);
                    $(this).val(ui.item.label);
                    return false;
                }
            });
        },

        onListBankAuto: function(event, modelList){
            this.modelBank = modelList;
            var availableTags = [], city;

            this.modelBank.items.forEach(function(elementin) {
                city = { 'value':elementin["id"], 'label':elementin["name"] };
                availableTags.push(city);
            });

            this.container.find('.js-auto-bank').autocomplete({
                source: availableTags,
                select: function( event, ui ) {
                    $(this).data('id',ui.item.value);
                    $(this).val(ui.item.label);
                    return false;
                }
            });
        },

        onListManagerAuto: function(event, modelList){
            this.modelManager = modelList;
            var availableTags = [], city;

            this.modelManager.items.forEach(function(elementin) {
                city = { 'value':elementin["id"], 'label':elementin["name"] };
                availableTags.push(city);
            });

            this.container.find('.js-auto-manager').autocomplete({
                source: availableTags,
                select: function( event, ui ) {
                    $(this).data('id',ui.item.value);
                    $(this).val(ui.item.label);
                    return false;
                }
            });
        },

        onSaveFirstForm: function () {
            var reestOne = new Reestr();
            this.formFirst = this.container.find('#js-add-form-info-first');
            this.formFirst.find('input').each(function(){
                var nameInput = $(this).attr('name');
                if ($(this).data('id')) {
                    reestOne[nameInput] = $(this).data('id');
                } else {
                    reestOne[nameInput] = $(this).val();
                }
            });
            console.log(reestOne);
            $(nzr).trigger('ReestrFormView.saveFirstForm',reestOne);
        },

        onEditOrganizForm: function () {

        }

    });

    ns.ReestrFormView = ReestrFormView;

})(nzr.view);
