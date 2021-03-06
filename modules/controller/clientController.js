nzr.controller = nzr.controller || {};
(function(ns){
    function ClientFormController(ClientModel, ClientsModel) {
        /** @type OrganizList */
        this.Client = ClientModel || null;
        this.Clients = ClientModel || null;
        this.init();
    }
    _.extend(ClientFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _listSpravApi: '/api/listspr.php',
        _getClientListApi: '/api/get_client_list.php',
        _saveClientApi: '/api/save_client.php',
        _saveClientReestrApi: '/api/save_client_reestr.php',
        _updateClientApi: '/api/save_client.php',
        _deleteClientApi: '/api/delete_client.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            // setTimeout(_.bind(this.getClientInfo, this), 0);
            $(nzr).on('ClientFormView.getClientList',  _.bind(this.getClientList, this));
            $(nzr).on('ClientFormView.saveClientForm',  _.bind(this.saveClientInfo, this));
            $(nzr).on('ClientFormView.addClientFormReestr',  _.bind(this.addClientReestrInfo, this));
            $(nzr).on('ClientFormView.saveClientFormReestr',  _.bind(this.saveClientReestrInfo, this));
            $(nzr).on('ClientFormView.updateClientForm',  _.bind(this.updateClientInfo, this));
            $(nzr).on('ClientFormView.deleteClientInfo',  _.bind(this.deleteClientInfo, this));
            $(nzr).on('ClientFormView.getListSpr',  _.bind(this.getSpravList, this));
            $(nzr).on('ClientFormView.editClientInfo',  _.bind(this.editClientInfo, this));
        },

        getClientList: function() {
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getClientListApi,
                success: function(data){
                    self._requestgetClientListSuccess(data);
                },
                error: _.bind(this._requestgetClientListError, this),
                complete: _.bind(this._requestgetClientListComplete, this)
            });
        },
        _requestgetClientListSuccess: function (data) {
            var clientList = new ClientList(data['client']);
            $(nzr).trigger('ClientFormController.getClientList', clientList);
        },
        _requestgetClientListError: function () {
            console.log('_requestgetClientListError');
        },
        _requestgetClientListComplete: function () {
            console.log('_requestgetClientListComplete');
            $('#loader').hide();
        },

        saveClientInfo: function(event, ClientInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.Client = ClientInfo;

            var dataClient = {
                staus:         'addClient',
                name:          this.Client.name,
                type:          this.Client.type,
                phone:         this.Client.phone,
                email:         this.Client.email,
                inn:           this.Client.inn,
                pasport:       this.Client.pasport,
                pasp_nom:      this.Client.pasp_nom,
                pasp_ser:      this.Client.pasp_ser,
                pasp_data:     this.Client.pasp_data,
                pasp_vidan:    this.Client.pasp_vidan,
                svid_date:     this.Client.svid_date,
                svid_nomer:    this.Client.svid_nomer,
                pravforma:     this.Client.pravforma,
                dir_role:      this.Client.dir_role,
                dir_fio:       this.Client.dir_fio,
                buh_fio:       this.Client.buh_fio,
                dover:         this.Client.dover,
                osoba_fio:     this.Client.osoba_fio,
                osoba_email:   this.Client.osoba_email,
                osoba_telefon: this.Client.osoba_telefon,
                osoba_posada:  this.Client.osoba_posada,
                adres1:        this.Client.adres1,
                adres2:        this.Client.adres2,
                phone1:        this.Client.phone1,
                ras:           this.Client.ras,
                bank:          this.Client.bank,
                mfo:           this.Client.mfo,
                buh_email:     this.Client.buh_email,
                buh_phone:     this.Client.buh_phone,
                buh_phone1:    this.Client.buh_phone1,
                delivertype:   this.Client.delivertype
            };

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataClient,
                url: this._saveClientApi,
                success: function(data){
                    self._requestSaveClientInfoSuccess(data);
                },
                error: _.bind(this._requestSaveClientInfoError, this),
                complete: _.bind(this._requestSaveClientInfoComplete, this)
            });
        },
        _requestSaveClientInfoSuccess: function (data) {
            var clientList = new ClientList(data);
            $(nzr).trigger('ClientFormController.getClientList', clientList);
        },
        _requestSaveClientInfoError: function (data) {
            console.log(data);
            console.log('_requestgetClientInfoError');
        },
        _requestSaveClientInfoComplete: function (data) {
            console.log('_requestgetClientInfoComplete');
            $('#loader').hide();
        },

        updateClientInfo: function(event, ClientInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.Client = ClientInfo;

            var dataClient = {
                staus:         'updateClient',
                id:            this.Client.id,
                name:          this.Client.name,
                type:          this.Client.type,
                phone:         this.Client.phone,
                email:         this.Client.email,
                inn:           this.Client.inn,
                pasport:       this.Client.pasport,
                pasp_nom:      this.Client.pasp_nom,
                pasp_ser:      this.Client.pasp_ser,
                pasp_data:     this.Client.pasp_data,
                pasp_vidan:    this.Client.pasp_vidan,
                svid_date:     this.Client.svid_date,
                svid_nomer:    this.Client.svid_nomer,
                pravforma:     this.Client.pravforma,
                dir_role:      this.Client.dir_role,
                dir_fio:       this.Client.dir_fio,
                buh_fio:       this.Client.buh_fio,
                dover:         this.Client.dover,
                osoba_fio:     this.Client.osoba_fio,
                osoba_email:   this.Client.osoba_email,
                osoba_telefon: this.Client.osoba_telefon,
                osoba_posada:  this.Client.osoba_posada,
                adres1:        this.Client.adres1,
                adres2:        this.Client.adres2,
                phone1:        this.Client.phone1,
                ras:           this.Client.ras,
                bank:          this.Client.bank,
                mfo:           this.Client.mfo,
                buh_email:     this.Client.buh_email,
                buh_phone:     this.Client.buh_phone,
                buh_phone1:    this.Client.buh_phone1,
                delivertype:   this.Client.delivertype
            };

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataClient,
                url: this._updateClientApi,
                success: function(data){
                    self._requestUpdateClientInfoSuccess(data);
                },
                error: _.bind(this._requestUpdateClientInfoError, this),
                complete: _.bind(this._requestUpdateClientInfoComplete, this)
            });
        },
        _requestUpdateClientInfoSuccess: function (data) {
            var clientList = new ClientList(data);
            $(nzr).trigger('ClientFormController.getClientList', clientList);
        },
        _requestUpdateClientInfoError: function (data) {
            console.log('_requestUpdateClientInfoError');
        },
        _requestUpdateClientInfoComplete: function (data) {
            console.log('_requestUpdateClientInfoComplete');
            $('#loader').hide();
        },

        deleteClientInfo: function(event, clientId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {clientid: clientId},
                url: this._deleteClientApi,
                success: function(data){
                    self._requestDeleteClientInfoSuccess(data);
                },
                error: _.bind(this._requestDeleteClientInfoError, this),
                complete: _.bind(this._requestDeleteClientInfoComplete, this)
            });
        },
        _requestDeleteClientInfoSuccess: function (data) {
            var clientList = new ClientList(data);
            $(nzr).trigger('ClientFormController.getClientList', clientList);
        },
        _requestDeleteClientInfoError: function (data) {
            console.log(data);
            console.log('_requestgetClientInfoError');
        },
        _requestDeleteClientInfoComplete: function (data) {
            console.log('_requestgetClientInfoComplete');
            $('#loader').hide();
        },

        editClientInfo: function(event, clientId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {clientid: clientId},
                url: this._getClientListApi,
                success: function(data){
                    self._requestEditClientInfoSuccess(data);
                },
                error: _.bind(this._requestEditClientInfoError, this),
                complete: _.bind(this._requestEditClientInfoComplete, this)
            });
        },
        _requestEditClientInfoSuccess: function (data) {
            var clientone = new ClientList(data['client']),
                adress1   = new Adress(data['adress1']),
                adress2   = new Adress(data['adress2']),
                adress3   = new Adress(data['adress3']),
                adress4   = new Adress(data['adress4']);
            $(nzr).trigger('ClientFormController.getClientEdit', {'c':clientone, 'a1': adress1 , 'a2' : adress2, 'a3': adress3 , 'a4' : adress4 });
        },
        _requestEditClientInfoError: function () {
            console.log('_requestEditClientInfoError');
        },
        _requestEditClientInfoComplete: function () {
            console.log('_requestEditClientInfoComplete');
            $('#loader').hide();
        },

        getSpravList: function(event, field){
            console.log('click modal');
            if (this._ajaxSprRequest) {
                this._ajaxSprRequest.abort();
                this._ajaxSprRequest = null;
            }

            console.log(field);

            var self = this;
            this._ajaxSprRequest = $.ajax({
                url: this._listSpravApi,
                type: 'POST',
                data: {'table': field.table, 'idcity' : field.idCity},
                success: function(data){
                    console.log(data);
                    self._requestSpravSuccess(data);
                },
                error: _.bind(this._requestSpravError, this),
                complete: _.bind(this._requestSpravComplete, this)
            });
        },
        _requestSpravSuccess: function (data) {
            var firmaList = new ClientList(data);
            console.log(firmaList);
            $(nzr).trigger('ReestrFormController.sprModal', firmaList);
        },
        _requestSpravError: function (data) {
        },
        _requestSpravComplete: function (data) {
            $('#loader').hide();
        },

        saveClientReestrInfo: function(event, ClientInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.Client = ClientInfo;

            var dataClient = {
                staus:         'updClient',
                name:          this.Client.name,
                type:          this.Client.type,
                phone:         this.Client.phone,
                email:         this.Client.email,
                inn:           this.Client.inn,
                pasport:       this.Client.pasport,
                pasp_nom:      this.Client.pasp_nom,
                pasp_ser:      this.Client.pasp_ser,
                pasp_data:     this.Client.pasp_data,
                pasp_vidan:    this.Client.pasp_vidan,
                svid_date:     this.Client.svid_date,
                svid_nomer:    this.Client.svid_nomer,
                pravforma:     this.Client.pravforma,
                dir_role:      this.Client.dir_role,
                dir_fio:       this.Client.dir_fio,
                buh_fio:       this.Client.buh_fio,
                dover:         this.Client.dover,
                osoba_fio:     this.Client.osoba_fio,
                osoba_email:   this.Client.osoba_email,
                osoba_telefon: this.Client.osoba_telefon,
                osoba_posada:  this.Client.osoba_posada,
                adres1:        this.Client.adres1,
                adres2:        this.Client.adres2,
                phone1:        this.Client.phone1,
                ras:           this.Client.ras,
                bank:          this.Client.bank,
                mfo:           this.Client.mfo,
                buh_email:     this.Client.buh_email,
                buh_phone:     this.Client.buh_phone,
                buh_phone1:    this.Client.buh_phone1,
                delivertype:   this.Client.delivertype
            };

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataClient,
                url: this._saveClientReestrApi,
                success: function(data){
                    self._requestSaveClientReestrInfoSuccess(data);
                },
                error: _.bind(this._requestSaveClientReestrInfoError, this),
                complete: _.bind(this._requestSaveClientReestrInfoComplete, this)
            });
        },
        _requestSaveClientReestrInfoSuccess: function (data) {
            var clientList = new ClientList(data);
            $(nzr).trigger('ClientFormController.onClientSaveShow', clientList);
        },
        _requestSaveClientReestrInfoError: function (data) {
            console.log(data);
            console.log('_requestgetClientInfoError');
        },
        _requestSaveClientReestrInfoComplete: function (data) {
            console.log('_requestgetClientInfoComplete');
            $('#loader').hide();
        },


        addClientReestrInfo: function(event){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            var dataClient = {
                staus:         'addClient'
            };

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataClient,
                url: this._saveClientReestrApi,
                success: function(data){
                    self._requestaddClientReestrInfoSuccess(data);
                },
                error: _.bind(this._requestaddClientReestrInfoError, this),
                complete: _.bind(this._requestaddClientReestrInfoComplete, this)
            });
        },
        _requestaddClientReestrInfoSuccess: function (data) {
            var clientone = new ClientList(data['client']),
                adress1   = new Adress(data['adress1']),
                adress2   = new Adress(data['adress2']),
                adress3   = new Adress(data['adress3']),
                adress4   = new Adress(data['adress4']);
            $(nzr).trigger('ClientFormController.addFormClientFromReestr', {'c':clientone, 'a1': adress1 , 'a2' : adress2, 'a3': adress3 , 'a4' : adress4 });
        },
        _requestaddClientReestrInfoError: function (data) {
            console.log(data);
            console.log('_requestaddClientReestrInfoError');
        },
        _requestaddClientReestrInfoComplete: function (data) {
            console.log(data);
            console.log('_requestaddClientReestrInfoComplete');
            $('#loader').hide();
        },

    });

    ns.ClientFormController = ClientFormController;

})(nzr.controller);
