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
            this.modalSpr = $('#sprModalCenter');
            this.buttonAddFirma = null;
            this.autoNomDog = null;
            this.formAddFirma = null;

            // this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            this.getButtonList.on('click', _.bind(this.onClickFirmasList, this));
            $(nzr).on('FirmaFormController.getFirmaList', _.bind(this.getFirmaList, this));
            $(nzr).on('FirmaFormController.EditFirmaList', _.bind(this.editFormFirma, this));
            $(nzr).on('FirmaFormController.bankList', _.bind(this.bankListFirm, this));
            $(nzr).on('FirmaFormController.writerList', _.bind(this.writerListFirm, this));

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

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.buttonSaveAddr = this.container.find('.js-save-addr-firma-form');
            this.buttonSaveAddr.on('click', _.bind(this.onSaveAdress, this));

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

            this.formAddFirma.validate({
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

        editFormFirma: function(event, data){
            var firma = data['f'],
                adress1 = data['a1'],
                adress2 = data['a2'],
                banki = data['b'],
                writer = data['w'];
            console.log(firma, adress1, adress2, banki,writer);
            var template = this.renderTemplate('FirmaViewForm-Edit', {"items": firma.items, "adf": adress1, "ad2": adress2}),
                self = this;
            this.container.html(template);

            var templateBank = this.renderTemplate('FirmaViewBanksList', {"items": banki.items});
            this.container.find('.js-bank-table-row').html(templateBank);

            var templateWriter = this.renderTemplate('FirmaViewWriterList', {"items": writer.items});
            this.container.find('.js-writer-table-row').html(templateWriter);

            this.buttonCancel = this.container.find('.js-edit-firma-cancel');
            this.buttonCancel.on('click', _.bind(this.onClickFirmasList, this));
            
            this.buttonSaveAddr = this.container.find('.js-save-addr-firma-form');
            this.buttonSaveAddr.on('click', _.bind(this.onSaveAdress, this));

            this.formEditFirma = this.container.find('#js-edit-firma-form');

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.buttonsAddBank = this.container.find('.js-add-bank');
            this.buttonsAddBank.on('click', _.bind(this.onAddBank, this));

            this.buttonsAddWriter = this.container.find('.js-add-writer');
            this.buttonsAddWriter.on('click', _.bind(this.onAddWriter, this));

            this.buttonsSaveBank = this.container.find('.js-save-bank-firma');
            this.buttonsSaveBank.on('click', _.bind(this.onSaveBank, this));

            this.buttonsSaveWriter = this.container.find('.js-save-writer-firma');
            this.buttonsSaveWriter.on('click', _.bind(this.onSaveWriter, this));

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
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var firma = new Firma();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        firma[nameInput] = $(this).val();
                    });
                    firma['id'] = $('input[name=idf]').val();
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

        onModalSprClick: function(event){
            $('#loader').show();
            this.modalSpr.data('name', event.currentTarget.dataset.name);
            this.modalSpr.data('table', event.currentTarget.dataset.spr);
            var field = {
                'idCity': 0,
                'table': event.currentTarget.dataset.spr
            };

            field.idCity = 0;
            console.log(field);
            $(nzr).trigger('ReestrFormView.getListSpr', field);
        },
        
        onSaveAdress: function (event) {
            $('#loader').show();

            var trForm = $(event.target).parents('tr'),
                adress = new Adress();

            trForm.find('input').each(function(){
                var nameInput = $(this).attr('name'),
                    dname = $(this).data('name');
                if (dname != null) {
                    nameInput = $(this).data('name');
                }
                adress[nameInput] = $(this).val();
            });

            $(nzr).trigger('FirmaFormView.updateAdress',adress);
        },

        onAddBank: function() {
            var data = {
                'idf': this.container.find('input[name=idf]').val(),
                'type': 'f'
            };
            $(nzr).trigger('FirmaFormView.addBank',data);
        },


        onAddWriter: function() {
            var data = {
                'idf': this.container.find('input[name=idf]').val(),
                'type': 'f'
            };
            $(nzr).trigger('FirmaFormView.addWriter',data);
        },


        bankListFirm: function(event, data) {
            var template = this.renderTemplate('FirmaViewBanksList', {"items": data.items}),
                self = this;
            this.container.find('.js-bank-table-row').html(template);

            this.buttonsSaveBank = this.container.find('.js-save-bank-firma');
            this.buttonsSaveBank.on('click', _.bind(this.onSaveBank, this));
        },

        writerListFirm: function(event, data) {
            var template = this.renderTemplate('FirmaViewWriterList', {"items": data.items}),
                self = this;
            this.container.find('.js-writer-table-row').html(template);

            this.buttonsSaveWriter = this.container.find('.js-save-writer-firma');
            this.buttonsSaveWriter.on('click', _.bind(this.onSaveWriter, this));
        },

        onSaveBank: function() {
            $('#loader').show();

            var trForm = $(event.target).parents('tr'),
                bank = new Bank();

            trForm.find('input').each(function(){
                var nameInput = $(this).attr('name'),
                    dname = $(this).data('name');
                if (dname != null) {
                    nameInput = $(this).data('name');
                }
                bank[nameInput] = $(this).val();
            });

            console.log(bank);

            $(nzr).trigger('FirmaFormView.updateBank',bank);
        },

        onSaveWriter: function() {
            $('#loader').show();

            var trForm = $(event.target).parents('tr'),
                writer = new Writer();

            trForm.find('input').each(function(){
                var nameInput = $(this).attr('name'),
                    dname = $(this).data('name');
                if (dname != null) {
                    nameInput = $(this).data('name');
                }
                writer[nameInput] = $(this).val();
            });

            console.log(writer);

            $(nzr).trigger('FirmaFormView.updateWriter',writer);
        }

    });

    ns.FirmaFormView = FirmaFormView;

})(nzr.view);
