nzr.view = nzr.view || {};
(function(ns){

    function FirmaFormView(FirmaModel, FirmasModel) {
        /** @type КууіекList */
        this.className = "FirmaFormView";
        this.Firma = FirmaModel || null;
        this.Firmas = FirmasModel || null;
        this.init();
    }
    _.extend(FirmaFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(FirmaFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.getButtonList = $('#js-firma-list');
            this.buttonAddFirma = null;
            this.autoNomDog = null;
            this.formAddFirma = null;

            // this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            this.getButtonList.on('click', _.bind(this.onClickFirmasList, this));
            $(nzr).on('FirmaFormController.getFirmaList', _.bind(this.getFirmaList, this));
            $(nzr).on('FirmaFormController.EditFirmaList', _.bind(this.editFormFirma, this));

        },

        onClickFirmasList: function(event) {
            $('#loader').show();
            $(nzr).trigger('FirmaFormView.getFirmaList');
        },

        getFirmaList: function(event, firmas){
            var template = this.renderTemplate('FirmasView-List',{"items": firmas.items});
            this.container.html(template);

            this.buttonAddFirma = this.container.find('.js-add-firma');
            this.buttonAddFirma.on('click', _.bind(this.addFormFirma, this));

            this.buttonDeleteFirma = this.container.find('.js-delete-firma');
            this.buttonDeleteFirma.on('click', _.bind(this.onClickDeleteFirmas, this));

            this.buttonEditFirma = this.container.find('.js-edit-firma');
            this.buttonEditFirma.on('click', _.bind(this.onClickEditFirmas, this));
        },

        addFormFirma: function() {
            var template = this.renderTemplate('FirmaViewForm-Add'),
                self = this;
            this.container.html(template);

            this.buttonAddFirma = this.container.find('.js-save-firma-cancel');
            this.buttonAddFirma.on('click', _.bind(this.onClickFirmasList, this));

            this.formAddFirma = this.container.find('#js-add-firma-form');

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                }
            });

            this.buttonFirmaSaveForm = this.container.find('.js-save-firma-form');
            this.buttonFirmaSaveForm.click(function(){
                self.formAddFirma.submit();
            });

            this.formEditFirma.validate({
                rules: {
                    name: {
                        required: true
                    },
                    full_name: {
                        required: true
                    },
                    dir_role: {
                        required: true
                    },
                    dir_fio: {
                        required: true
                    },
                    buh_fio: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    tel: {
                        required: true
                    },
                    tel1: {
                        required: true
                    },
                    okpo: {
                        required: true
                    },
                    svidot_nomer: {
                        required: true
                    },
                    svidot_organ: {
                        required: true
                    },
                    ras: {
                        required: true
                    },
                    mfo: {
                        required: true
                    },
                    bank: {
                        required: true
                    },
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var firma = new Firma();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        firma[nameInput] = $(this).val();
                    });
                    $(nzr).trigger('FirmaFormView.saveFirmaForm',firma);
                }
            });

        },

        editFormFirma: function(event, firma){
            var template = this.renderTemplate('FirmaViewForm-Edit', firma.items[0]),
                self = this;
            this.container.html(template);

            this.buttonCancel = this.container.find('.js-edit-firma-cancel');
            this.buttonCancel.on('click', _.bind(this.onClickFirmasList, this));

            this.formEditFirma = this.container.find('#js-edit-firma-form');

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                }
            });

            this.buttonFirmaEditForm = this.container.find('.js-edit-firma-form');
            this.buttonFirmaEditForm.click(function(){
                self.formEditFirma.submit();
            });

            this.formEditFirma.validate({
                rules: {
                    name: {
                        required: true
                    },
                    full_name: {
                        required: true
                    },
                    dir_role: {
                        required: true
                    },
                    dir_fio: {
                        required: true
                    },
                    buh_fio: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    tel: {
                        required: true
                    },
                    tel1: {
                        required: true
                    },
                    okpo: {
                        required: true
                    },
                    svidot_nomer: {
                        required: true
                    },
                    svidot_organ: {
                        required: true
                    },
                    ras: {
                        required: true
                    },
                    mfo: {
                        required: true
                    },
                    bank: {
                        required: true
                    },
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var firma = new Firma();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        firma[nameInput] = $(this).val();
                    });
                    $(nzr).trigger('FirmaFormView.updateFirmaForm',firma);
                }
            });
        },

        onClickDeleteFirmas: function(event) {
            $('#loader').show();
            var firmaId = $(event.target).data('idfirma');
            $(nzr).trigger('FirmaFormView.deleteFirmaInfo',firmaId);
        },

        onClickEditFirmas: function(event) {
            $('#loader').show();
            var firmaId = $(event.target).data('idfirma');
            $(nzr).trigger('FirmaFormView.editFirmaInfo',firmaId);
        },

    });

    ns.FirmaFormView = FirmaFormView;

})(nzr.view);
