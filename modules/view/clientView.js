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

            $(nzr).on('ClientFormController.addFormClientFromReestr', _.bind(this.addFormClientFromReestr, this));
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

            this.buttonsVidZam = this.container.find('.js-vid-zamov');
            this.buttonsVidZam.on('change', _.bind(this.onVidZamFormChange, this));

            this.onVidZamFormChange();

            this.container.find('.js-osoba-dir').click(function () {
                var fio = self.container.find('input[name=dir_fio]').val(),
                    posada = self.container.find('input[name=dir_role]').val();
                self.container.find('input[name=osoba_fio]').val(fio);
                self.container.find('input[name=osoba_posada]').val(posada);
            });

            this.container.find('.js-osoba-buh').click(function () {
                var fio = self.container.find('input[name=buh_fio]').val();
                self.container.find('input[name=osoba_fio]').val(fio);
                self.container.find('input[name=osoba_posada]').val('Бухгалтер');
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
                    client['id'] = $('input[name=idc]').val();
                    $(nzr).trigger('ClientFormView.saveClientForm',client);
                }
            });

        },

        onClickEditClient: function() {
            $('#loader').show();
            var clientId = $(event.target).data('clientid');
            $(nzr).trigger('ClientFormView.editClientInfo', clientId);
        },

        getClientEdit: function(event, data) {
            var client = data['c'],
                adress1 = data['a1'],
                adress2 = data['a2'],
                adress3 = data['a3'],
                adress4 = data['a4'];
            var template = this.renderTemplate('ClientViewForm-Edit', {"client": client.items[0], "adf": adress1, "ad2": adress2, "ady": adress3, "adn": adress4}),
                self = this;
            this.container.html(template);

            this.buttonCancelClient = this.container.find('.js-edit-client-cancel');
            this.buttonCancelClient.on('click', _.bind(this.onClickClientsList, this));

            this.formEditClient = this.container.find('#js-edit-client-form');

            this.buttonSaveAddr = this.container.find('.js-save-addr-firma-form');
            this.buttonSaveAddr.on('click', _.bind(this.onSaveAdress, this));

            this.onVidZamFormChange();

            this.buttonClientEditForm = this.container.find('.js-edit-client-form');
            this.buttonClientEditForm.click(function(){
                self.formEditClient.submit();
            });

            this.onInitEditClient();

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
                    client['id'] = $('input[name=idc]').val();

                    $(nzr).trigger('ClientFormView.updateClientForm',client);
                }
            });

        },

        onInitEditClient: function() {
            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.buttonsVidZam = this.container.find('.js-vid-zamov');
            this.buttonsVidZam.on('change', _.bind(this.onVidZamFormChange, this));

            this.container.find('.js-osoba-dir').click(function () {
                var fio = self.container.find('input[name=dir_fio]').val(),
                    posada = self.container.find('input[name=dir_role]').val();
                self.container.find('input[name=osoba_fio]').val(fio);
                self.container.find('input[name=osoba_posada]').val(posada);
            });

            this.container.find('.js-osoba-buh').click(function () {
                var fio = self.container.find('input[name=buh_fio]').val();
                self.container.find('input[name=osoba_fio]').val(fio);
                self.container.find('input[name=osoba_posada]').val('Бухгалтер');
            });

            this.container.find('.js-oblast').autocomplete({
                source: "/api/search_adres.php?getoblastf",
                minLength: 2,
                dataType: "jsonp",
                select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                }
            });

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

            this.container.find('.js-raion').autocomplete({
                source: function(request, response) {
                    var oblf = $(this)[0].element.parents('.js-tr').find('.js-oblast').val();
                    $.ajax({
                        url : "/api/search_adres.php?getraionf&oblast=" + oblf + "&term="+request.term,
                        type : "GET",
                        dataType : "json",
                        success : function(data) {
                            response($.map(data, function(item) {
                                return {
                                    id    : item.id,
                                    value : item.value,
                                    label : item.label
                                }
                            }));
                        }
                    });
                },
                minLength: 2,
                dataType: "jsonp",
                select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                }
            });

            this.container.find('.js-city').autocomplete({
                source: function(request, response) {
                    var oblf  = $(this)[0].element.parents('.js-tr').find('.js-oblast').val(),
                        raion = $(this)[0].element.parents('.js-tr').find('.js-raion').val();
                    $.ajax({
                        url : "/api/search_adres.php?getmisto&oblast=" + oblf + "&raion=" + raion + "&term="+request.term,
                        type : "GET",
                        dataType : "json",
                        success : function(data) {
                            response($.map(data, function(item) {
                                return {
                                    id    : item.id,
                                    value : item.value,
                                    label : item.label
                                }
                            }));
                        }
                    });
                },
                minLength: 2,
                dataType: "jsonp",
                select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                }
            });

            this.container.find('.js-street').autocomplete({
                source: function(request, response) {
                    var oblf  = $(this)[0].element.parents('.js-tr').find('.js-oblast').val(),
                        raion = $(this)[0].element.parents('.js-tr').find('.js-raion').val(),
                        misto = $(this)[0].element.parents('.js-tr').find('.js-city').val();

                    $.ajax({
                        url : "/api/search_adres.php?getstreet&oblast=" + oblf + "&raion=" + raion + "&misto=" + misto + "&term="+request.term,
                        type : "GET",
                        dataType : "json",
                        success : function(data) {
                            response($.map(data, function(item) {
                                return {
                                    id    : item.id,
                                    value : item.value,
                                    label : item.label
                                }
                            }));
                        }
                    });
                },
                minLength: 2,
                dataType: "jsonp",
                select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                }
            });

            this.container.find('.js-dom').autocomplete({
                source: function(request, response) {
                    var oblf  = $(this)[0].element.parents('.js-tr').find('.js-oblast').val(),
                        raion = $(this)[0].element.parents('.js-tr').find('.js-raion').val(),
                        misto = $(this)[0].element.parents('.js-tr').find('.js-city').val(),
                        street = $(this)[0].element.parents('.js-tr').find('.js-street').val();

                    $.ajax({
                        url : "/api/search_adres.php?getdom&oblast=" + oblf + "&raion=" + raion + "&misto=" + misto + "&street=" + street + "&term="+request.term,
                        type : "GET",
                        dataType : "json",
                        success : function(data) {
                            response($.map(data, function(item) {
                                return {
                                    id    : item.id,
                                    value : item.value,
                                    label : item.label
                                }
                            }));
                        }
                    });
                },
                dataType: "jsonp",
                select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
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

            var trForm = $(event.target).parents('tr, .js-tr'),
                adress = new Adress();

            trForm.find('input,select').each(function(){
                var nameInput = $(this).attr('name'),
                    dname = $(this).data('name');
                if (dname != null) {
                    nameInput = $(this).data('name');
                }
                adress[nameInput] = $(this).val();
            });

            $(nzr).trigger('FirmaFormView.updateAdress',adress);
        },

        onVidZamFormChange: function (event) {
            var that = this.container.find('.js-vid-zamov'),
                chose = that.val();
            this.container.find('.js-vid-hide').hide();
            this.container.find('.js-'+chose).show();
        },

        addFormClientFromReestr: function(event, data) {
            var client = data['c'],
                adress1 = data['a1'],
                adress2 = data['a2'],
                adress3 = data['a3'],
                adress4 = data['a4'];
            var template = this.renderTemplate('ClientViewForm-Edit', {"client": client.items[0], "adf": adress1, "ad2": adress2, "ady": adress3, "adn": adress4}),
                self = this;
            this.container.html(template);
            console.log('ddddffddddddddddddfffffff');

            this.buttonCancelClient = this.container.find('.js-edit-client-cancel');
            this.buttonCancelClient.click(function(){
                $(nzr).trigger('ClientFormController.onClientCancelShow');
            });

            this.formEditClient = this.container.find('#js-edit-client-form');

            this.buttonSaveAddr = this.container.find('.js-save-addr-firma-form');
            this.buttonSaveAddr.on('click', _.bind(this.onSaveAdress, this));

            this.onVidZamFormChange();

            // this.buttonClientEditForm = this.container.find('.js-edit-client-form');
            // this.buttonClientEditForm.click(function(){
            //     self.formEditClient.submit();
            // });

            this.formAddClient = this.container.find('#js-edit-client-form');

            this.buttonClientSaveForm = this.container.find('.js-edit-client-form');
            this.buttonClientSaveForm.click(function(){
                self.formAddClient.submit();
            });

            this.formAddClient.validate({
                rules: {
                    name: {
                        required: true
                    },

                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var client = new Client();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        client[nameInput] = $(this).val();
                    });
                    client['id'] = $('input[name=idc]').val();
                    console.log('dddd');
                    $(nzr).trigger('ClientFormView.saveClientFormReestr',client);
                }
            });

            this.onInitEditClient();


        },

    });

    ns.ClientFormView = ClientFormView;

})(nzr.view);
