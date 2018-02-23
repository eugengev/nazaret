nzr.view = nzr.view || {};
(function(ns){

    function ClientFormView(ClientModel, ClientsModel) {
        /** @type КууіекList */
        this.className = "ClientFormView";
        this.Client = ClientModel || null;
        this.Clients = ClientsModel || null;
        this.init();
    }
    _.extend(ClientFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(ClientFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.getButtonList = $('#js-client-list');
            this.buttonAddClient = null;
            this.autoNomDog = null;
            this.formAddClient = null;
            this.modalSpr = $('#sprModalCenter');

            // this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            this.getButtonList.on('click', _.bind(this.onClickClientsList, this));
            $(nzr).on('ClientFormController.getClientInfoInit', _.bind(this.getClientInfoInit, this));
            $(nzr).on('ClientFormController.getClientList', _.bind(this.getClientList, this));
            $(nzr).on('ClientFormController.getClientEdit', _.bind(this.getClientEdit, this));

        },

        getClientInfoInit: function(event, Client) {
            this.Client = Client;
            console.log(this.Client);
            this.Clientfio.text(this.Client.fio);
        },

        onClickClientsList: function(event) {
            $('#loader').show();
            $(nzr).trigger('ClientFormView.getClientList');
        },

        getClientList: function(event, clients){
            var template = this.renderTemplate('ClientView-List',{"items": clients.items});
            this.container.html(template);

            this.buttonAddClient = this.container.find('.js-add-client');
            this.buttonAddClient.on('click', _.bind(this.addFormClient, this));

            this.buttonDeleteClient = this.container.find('.js-delete-client');
            this.buttonDeleteClient.on('click', _.bind(this.onClickDeleteClients, this));

            this.buttonEditClient = this.container.find('.js-edit-client');
            this.buttonEditClient.on('click', _.bind(this.onClickEditClient, this));
        },

        addFormClient: function() {
            var template = this.renderTemplate('ClientViewForm-Add'),
                self = this;
            this.container.html(template);

            this.buttonAddClient = this.container.find('.js-save-client-cancel');
            this.buttonAddClient.on('click', _.bind(this.onClickClientsList, this));

            this.formAddClient = this.container.find('#js-add-client-form');

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                }
            });

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.buttonClientSaveForm = this.container.find('.js-save-client-form');
            this.buttonClientSaveForm.click(function(){
                self.formAddClient.submit();
            });

            this.formAddClient.validate({
                rules: {
                    name: {
                        required: true
                    },
                    pravforma: {
                        required: true
                    },
                    dir_fio: {
                        required: true
                    },
                    buh_fio: {
                        required: true
                    },
                    dover: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    adres1: {
                        required: true
                    },
                    adres2: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    phone1: {
                        required: true
                    },
                    inn: {
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
                    }
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var client = new Client();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        client[nameInput] = $(this).val();
                    });
                    $(nzr).trigger('ClientFormView.saveClientForm',client);
                }
            });

        },

        onClickEditClient: function() {
            $('#loader').show();
            var clientId = $(event.target).data('clientid');
            $(nzr).trigger('ClientFormView.editClientInfo', clientId);
        },

        getClientEdit: function(event, client) {
            console.log(client);
            var template = this.renderTemplate('ClientViewForm-Edit', client.items[0]),
                self = this;
            this.container.html(template);

            this.buttonCancelClient = this.container.find('.js-edit-client-cancel');
            this.buttonCancelClient.on('click', _.bind(this.onClickClientsList, this));

            this.formEditClient = this.container.find('#js-edit-client-form');

            this.container.find('.js-date').datepicker({
                dateFormat: 'dd.mm.yy',
                onSelect: function (selectedDate) {
                    var datea = selectedDate.split('.');
                    $($(this).data('id')).val(datea[2]+'-'+datea[1]+'-'+datea[0]);
                }
            });

            this.buttonClientEditForm = this.container.find('.js-edit-client-form');
            this.buttonClientEditForm.click(function(){
                self.formEditClient.submit();
            });

            this.formEditClient.validate({
                rules: {
                    name: {
                        required: true
                    },
                    pravforma: {
                        required: true
                    },
                    dir_fio: {
                        required: true
                    },
                    buh_fio: {
                        required: true
                    },
                    dover: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    adres1: {
                        required: true
                    },
                    adres2: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    phone1: {
                        required: true
                    },
                    inn: {
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
                    }
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var client = new Client();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        client[nameInput] = $(this).val();
                    });
                    console.log(client);
                    $(nzr).trigger('ClientFormView.updateClientForm',client);
                }
            });

        },

        onClickDeleteClients: function(event) {
            $('#loader').show();
            var clientId = $(event.target).data('clientid');
            $(nzr).trigger('ClientFormView.deleteClientInfo', clientId);
        },

        onModalSprClick: function(event){
            $('#loader').show();
            this.modalSpr.data('name', event.currentTarget.dataset.name);
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


    });

    ns.ClientFormView = ClientFormView;

})(nzr.view);
