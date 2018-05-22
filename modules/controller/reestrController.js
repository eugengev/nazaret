nzr.controller = nzr.controller || {};
(function(ns){
    function ReestrFormController(ReestrListModel, modelOne) {
        /** @type OrganizList */
        this.ordersList = ReestrListModel || null;
        this.reestrOne = modelOne || null;
        this.init();
    }
    _.extend(ReestrFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxSprRequestf: null,
        _ajaxSprRequestc: null,
        _ajaxSprRequests: null,
        _ajaxSprRequestb: null,
        _ajaxSprRequestn: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _listSpravApi: '/api/listspr.php',
        _listNomFirmApi: '/api/nomfirm.php',
        _listReestrApi: '/api/listreestr.php',
        _listclientApi: '/api/listclient.php',
        _listFirmaApi: '/api/listfirma.php',
        _listCityApi: '/api/listcity.php',
        _listBankApi: '/api/listbank.php',
        _deleteReestrApi: '/api/delete_reestr.php',
        _listManagerApi: '/api/listmanager.php',
        _listSaveActDataNomer: '/api/save_act.php',
        _listReestrSaveFirst: '/api/listreestrsavefirst.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            setTimeout(_.bind(this.getReestr, this), 0);
            $(nzr).on('ReestrFormView.listReestr', _.bind(this.getReestr, this));
            $(nzr).on('ReestrFormView.listClient', _.bind(this.getSprFirstList, this));
            $(nzr).on('ReestrFormView.listFirma',  _.bind(this.getSprFirstList, this));
            $(nzr).on('ReestrFormView.saveFirstForm',  _.bind(this.saveFirstForm, this));
            $(nzr).on('ReestrFormView.EditReestr',  _.bind(this.getReestrOne, this));
            $(nzr).on('ReestrFormView.ViewEditReestr',  _.bind(this.getViewReestrOne, this));
            $(nzr).on('ReestrFormView.DeleteReestr',  _.bind(this.deleteReestrOne, this));
            $(nzr).on('ReestrFormView.getListSpr',  _.bind(this.getSpravList, this));
            $(nzr).on('ReestrFormView.getListNomFirm',  _.bind(this.getListNomFirm, this));
            $(nzr).on('ReestrFormView.saveActDateNomer',  _.bind(this.saveActDateNomer, this));
            $(nzr).on('ReestrFormView.sendEmail',  _.bind(this.sendAjaxEmail, this));
            $(nzr).on('ReestrFormView.getReestrPage',  _.bind(this.getReestrPage, this));
        },

        sendAjaxEmail: function(event, dataLink) {
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }
            console.log(dataLink);
            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                url: dataLink.link,
                success: function(data){
                    console.log(data);
                    self._requestSuccesssaveSendEmail(data);
                },
                error: _.bind(this._requestErrorsaveSendEmail, this),
                complete: _.bind(this._requestCompletesaveSendEmail, this)
            });
        },
        _requestSuccesssaveSendEmail: function (data) {
            console.log(data);
            $('#sprModalEmail').modal('show');
            // var nomer = data['nomer'];
            // if (nomer != '0') {
            //     $(nzr).trigger('ReestrFormController.nomerDog', nomer);
            // }
        },
        _requestErrorsaveSendEmail: function (data) {
        },
        _requestCompletesaveSendEmail: function (data) {
        },

        saveActDateNomer: function(event, dataAct){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var dataAddnew = {
                nomer: dataAct.nomer,
                date:  dataAct.date,
                idr:   dataAct.idr
            };

            console.log(dataAddnew);

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: dataAddnew,
                url: this._listSaveActDataNomer,
                success: function(data){
                    console.log(data);
                    self._requestSuccesssaveActDateNomer(data);
                },
                error: _.bind(this._requestErrorsaveActDateNomer, this),
                complete: _.bind(this._requestCompletesaveActDateNomer, this)
            });
        },
        _requestSuccesssaveActDateNomer: function (data) {
            console.log(data);
            // var nomer = data['nomer'];
            // if (nomer != '0') {
            //     $(nzr).trigger('ReestrFormController.nomerDog', nomer);
            // }
        },
        _requestErrorsaveActDateNomer: function (data) {
        },
        _requestCompletesaveActDateNomer: function (data) {
        },

        getListNomFirm: function(event, nomFirm){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: {'nomfirm':nomFirm},
                url: this._listNomFirmApi,
                success: function(data){
                    console.log(data);
                    self._requestSuccessNomFirm(data);
                },
                error: _.bind(this._requestErrorNomFirm, this),
                complete: _.bind(this._requestCompleteNomFirm, this)
            });
        },
        _requestSuccessNomFirm: function (data) {
            console.log(data['nomer']);
            var nomer = data['nomer'];
            if (nomer != '0') {
                $(nzr).trigger('ReestrFormController.nomerDog', nomer);
            }
            // $(nzr).trigger('ReestrFormController.requestListSuccess', reestrList);
        },
        _requestErrorNomFirm: function (data) {
        },
        _requestCompleteNomFirm: function (data) {
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
                data: {'table': field.table, 'idcity' : field.idCity, 'idmarka' : field.idmarka},
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
            $(nzr).trigger('SpravochFormView.sprModal', firmaList);
        },
        _requestSpravError: function (data) {
        },
        _requestSpravComplete: function (data) {
            $('#loader').hide();
        },

        getReestr: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({

                url: this._listReestrApi,
                success: function(data){
                    self._requestSuccess(data);
                },
                error: _.bind(this._requestError, this),
                complete: _.bind(this._requestComplete, this)
            });
        },
        _requestSuccess: function (data) {
            var reestrList = new ReestrList(data);
            $(nzr).trigger('ReestrFormController.requestListSuccess', reestrList);
        },
        _requestError: function (data) {
        },
        _requestComplete: function (data) {
        },

        getReestrPage: function(event, page){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: {pagenom: page},
                url: this._listReestrApi,
                success: function(data){
                    self._requestPageSuccess(data);
                },
                error: _.bind(this._requestPageError, this),
                complete: _.bind(this._requestPageComplete, this)
            });
        },
        _requestPageSuccess: function (data) {
            var reestrList = new ReestrList(data);
            $(nzr).trigger('ReestrFormController.requestListSuccess', reestrList);
        },
        _requestPageError: function (data) {
        },
        _requestPageComplete: function (data) {
            $('#loader').hide();
        },

        getSprFirstList: function () {
            var self = this;
            self.getClientList();
            self.getFirmaList();
            self.getCityList();
            self.getBankList();
            self.getManagerList();
        },

        getFirmaList: function(){
            console.log('getFirmaList');
            if (this._ajaxSprRequestf) {
                this._ajaxSprRequestf.abort();
                this._ajaxSprRequestf = null;
            }

            var self = this;
            this._ajaxSprRequestf = $.ajax({
                url: this._listFirmaApi,
                success: function(data){
                    self._requestSuccessFirma(data);
                },
                error: _.bind(this._requestErrorFirma, this),
                complete: _.bind(this._requestCompleteFirma, this)
            });
        },
        _requestSuccessFirma: function (data) {
            var firmaList = new ClientList(data);
            $(nzr).trigger('ReestrFormController.listFirmaSuccess', firmaList);
        },
        _requestErrorFirma: function (data) {
        },
        _requestCompleteFirma: function (data) {
            $('#loader').hide();
        },


        getClientList: function(){
            console.log('getClientList');
            if (this._ajaxSprRequestc) {
                this._ajaxSprRequestc.abort();
                this._ajaxSprRequestc = null;
            }

            var self = this;
            this._ajaxSprRequestc = $.ajax({
                url: this._listclientApi,
                success: function(data){
                    self._requestSuccessClient(data);
                },
                error: _.bind(this._requestErrorClient, this),
                complete: _.bind(this._requestCompleteClient, this)
            });
        },
        _requestSuccessClient: function (data) {
            var clientList = new ClientList(data);
            $(nzr).trigger('ReestrFormController.listClientSuccess', clientList);
        },
        _requestErrorClient: function (data) {
        },
        _requestCompleteClient: function (data) {
            $('#loader').hide();
        },

        getCityList: function(){
            console.log('getCityList');
            if (this._ajaxSprRequests) {
                this._ajaxSprRequests.abort();
                this._ajaxSprRequests = null;
            }

            var self = this;
            this._ajaxSprRequests = $.ajax({
                url: this._listCityApi,
                success: function(data){
                    self._requestSuccessCity(data);
                },
                error: _.bind(this._requestErrorCity, this),
                complete: _.bind(this._requestCompleteCity, this)
            });
        },
        _requestSuccessCity: function (data) {
            var cityList = new ClientList(data);
            $(nzr).trigger('ReestrFormController.listCitySuccess', cityList);
        },
        _requestErrorCity: function (data) {
        },
        _requestCompleteCity: function (data) {
            $('#loader').hide();
        },

        getBankList: function(){
            console.log('getBankList');
            if (this._ajaxSprRequestb) {
                this._ajaxSprRequestb.abort();
                this._ajaxSprRequestb = null;
            }

            var self = this;
            this._ajaxSprRequestb = $.ajax({
                url: this._listBankApi,
                success: function(data){
                    self._requestSuccessBank(data);
                },
                error: _.bind(this._requestErrorBank, this),
                complete: _.bind(this._requestCompleteBank, this)
            });
        },
        _requestSuccessBank: function (data) {
            var bankList = new ClientList(data);
            $(nzr).trigger('ReestrFormController.listBankSuccess', bankList);
        },
        _requestErrorBank: function (data) {
        },
        _requestCompleteBank: function (data) {
            $('#loader').hide();
        },

        getManagerList: function(){
            console.log('getBankList');
            if (this._ajaxSprRequestm) {
                this._ajaxSprRequestm.abort();
                this._ajaxSprRequestm = null;
            }

            var self = this;
            this._ajaxSprRequestm = $.ajax({
                url: this._listManagerApi,
                success: function(data){
                    self._requestSuccessManager(data);
                },
                error: _.bind(this._requestErrorManager, this),
                complete: _.bind(this._requestCompleteManager, this)
            });
        },
        _requestSuccessManager: function (data) {
            var managerList = new ClientList(data);
            $(nzr).trigger('ReestrFormController.listManagerSuccess', managerList);
        },
        _requestErrorManager: function (data) {
        },
        _requestCompleteManager: function (data) {
            $('#loader').hide();
        },

        saveFirstForm: function (event, model) {
            $('#loader').show();
            this.reestr = model;
            console.log('begin save');
            console.log(this.reestr);

            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            var dataAddnew = {
                status:     'addfirstform',
                nomber:     this.reestr.nomber,
                date:       this.reestr.date,
                datework:   this.reestr.datework,
                old_nomber: this.reestr.old_nomber,
                client:     this.reestr.client,
                firma:      this.reestr.firma,
                city:       this.reestr.city,
                bank:       this.reestr.bank,
                meta:       this.reestr.meta,
                manager:    this.reestr.manager
            };

            console.log(dataAddnew);

            var self = this;
            this._ajaxAddNew = $.ajax({
                url: this._listReestrSaveFirst,
                type: "POST",
                data: dataAddnew,
                success: function(data){
                    console.log(data);
                    self._saveFirstFormSuccess(data);
                },
                error: _.bind(this._saveFirstFormError, this),
                complete: _.bind(this._saveFirstFormComplete, this)
            });

        },

        _saveFirstFormSuccess: function(data) {
            $(nzr).trigger('ReestrFormController.addForm', data);
        },

        _saveFirstFormError: function(data) {
            console.log('begin error', data);
        },

        _saveFirstFormComplete: function() {
            $('#loader').hide();
        },

        getReestrOne: function(event, id){
            if (this._ajaxEditSave) {
                this._ajaxEditSave.abort();
                this._ajaxEditSave = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                data: {'id':id},
                type: "POST",
                url: this._listReestrApi,
                success: function(data){
                    console.log(data);
                    self._requestSuccessOne(data);
                },
                error: _.bind(this._requestErrorOne, this),
                complete: _.bind(this._requestCompleteOne, this)
            });
        },
        _requestSuccessOne: function (data) {
            var reestrOne = new ReestrList(data);
            $(nzr).trigger('ReestrFormController.addForm', reestrOne.items[0]);
        },
        _requestErrorOne: function (data) {
            console.log(data);
            console.log('_requestErrorOne');
        },
        _requestCompleteOne: function (data) {
            $('#loader').hide();
        },

        getViewReestrOne: function(event, id){
            if (this._ajaxEditSave) {
                this._ajaxEditSave.abort();
                this._ajaxEditSave = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                data: {'id':id},
                type: "POST",
                url: this._listReestrApi,
                success: function(data){
                    console.log(data);
                    self._requestViewSuccessOne(data);
                },
                error: _.bind(this._requestViewErrorOne, this),
                complete: _.bind(this._requestViewCompleteOne, this)
            });
        },
        _requestViewSuccessOne: function (data) {
            var reestrOne = new ReestrList(data);
            $(nzr).trigger('ReestrFormController.editForm', reestrOne.items[0]);
        },
        _requestViewErrorOne: function (data) {
            console.log(data);
            console.log('_requestErrorOne');
        },
        _requestViewCompleteOne: function (data) {
            $('#loader').hide();
        },

        deleteReestrOne: function(event, id){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                data: {'id':id},
                type: "POST",
                url: this._deleteReestrApi,
                success: function(data){
                    console.log(data);
                    self._requestDeleteSuccessOne(data);
                },
                error: _.bind(this._requestDeleteErrorOne, this),
                complete: _.bind(this._requestDeleteCompleteOne, this)
            });
        },
        _requestDeleteSuccessOne: function (data) {
            var reestrList = new ReestrList(data);
            $(nzr).trigger('ReestrFormController.requestListSuccess', reestrList);
        },
        _requestDeleteErrorOne: function (data) {
            console.log(data);
            console.log('_requestErrorOne');
        },
        _requestDeleteCompleteOne: function (data) {
            $('#loader').hide();
        },
    });

    ns.ReestrFormController = ReestrFormController;

})(nzr.controller);
