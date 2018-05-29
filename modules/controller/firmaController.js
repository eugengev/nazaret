nzr.controller = nzr.controller || {};
(function(ns){
    function FirmaFormController(FirmaModel, FirmasModel) {
        /** @type OrganizList */
        this.Firma = FirmaModel || null;
        this.Firmas = FirmaModel || null;
        this.init();
    }
    _.extend(FirmaFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxUpdateAdress: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _ajaxUpdateBank: null,
        _getFirmaListApi: '/api/get_firma_list.php',
        _getFirmaListByNameApi: '/api/get_firma_by_name.php',
        _saveFirmaApi: '/api/save_firma.php',
        _addBankApi: '/api/add_bank.php',
        _addWriterApi: '/api/firma/add_writer.php',
        _saveAdressApi: '/api/save_adress.php',
        _saveBankApi: '/api/save_bank.php',
        _saveWriterApi: '/api/firma/save_writer.php',
        _deleteFirmaApi: '/api/delete_firma.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            // setTimeout(_.bind(this.getFirmaInfo, this), 0);
            $(nzr).on('FirmaFormView.getFirmaList',  _.bind(this.getFirmaList, this));
            $(nzr).on('FirmaFormView.saveFirmaForm',  _.bind(this.saveFirmaInfo, this));
            $(nzr).on('FirmaFormView.deleteFirmaInfo',  _.bind(this.deleteFirmaInfo, this));
            $(nzr).on('FirmaFormView.editFirmaInfo',  _.bind(this.editFirmaList, this));
            $(nzr).on('FirmaFormView.updateFirmaForm',  _.bind(this.updateFirmaInfo, this));
            $(nzr).on('FirmaFormView.updateAdress',  _.bind(this.updateAdress, this));
            $(nzr).on('FirmaFormView.addBank',  _.bind(this.addBankFirm, this));
            $(nzr).on('FirmaFormView.addWriter',  _.bind(this.addWriterFirm, this));
            $(nzr).on('FirmaFormView.updateBank',  _.bind(this.updateBank, this));
            $(nzr).on('FirmaFormView.updateWriter',  _.bind(this.updateWriter, this));

            $(nzr).on('ReestrFormView.showBankListReestr',  _.bind(this.showBankListReestr, this));
        },

        getFirmaList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getFirmaListApi,
                success: function(data){
                    self._requestgetFirmaListSuccess(data);
                },
                error: _.bind(this._requestgetFirmaListError, this),
                complete: _.bind(this._requestgetFirmaListComplete, this)
            });
        },
        _requestgetFirmaListSuccess: function (data) {
            var firmaList = new FirmaList(data['firma']);
            $(nzr).trigger('FirmaFormController.getFirmaList', firmaList);
        },
        _requestgetFirmaListError: function (data) {
            console.log(data);
            console.log('_requestgetFirmaListError');
        },
        _requestgetFirmaListComplete: function () {
            console.log('_requestgetFirmaListComplete');
            $('#loader').hide();
        },

        saveFirmaInfo: function(event, FirmaInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.Firma = FirmaInfo;

            var dataFirma = {
                staus:       'addFirma',
                name:      this.Firma.name,
                autonomer: this.Firma.autonomer,
                lastnomer: this.Firma.lastnomer,
                firstchar: this.Firma.firstchar,
                okpo:      this.Firma.okpo,
                tel:       this.Firma.tel,
                ras:       this.Firma.ras,
                bank:      this.Firma.bank,
                mfo:       this.Firma.mfo,
                adress:    this.Firma.adress,
                email:     this.Firma.email,
                full_name:    this.Firma.full_name,
                dir_role:     this.Firma.dir_role,
                dir_fio:      this.Firma.dir_fio,
                buh_fio:      this.Firma.buh_fio,
                adres_yur:    this.Firma.adres_yur,
                tel1:         this.Firma.tel1,
                svidot_nomer: this.Firma.svidot_nomer,
                svidot_date:  this.Firma.svidot_date,
                svidot_organ: this.Firma.svidot_organ
            };

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataFirma,
                url: this._saveFirmaApi,
                success: function(data){
                    self._requestSaveFirmaInfoSuccess(data);
                },
                error: _.bind(this._requestSaveFirmaInfoError, this),
                complete: _.bind(this._requestSaveFirmaInfoComplete, this)
            });
        },
        _requestSaveFirmaInfoSuccess: function (data) {
            var firmaList = new FirmaList(data);
            $(nzr).trigger('FirmaFormController.getFirmaList', firmaList);
        },
        _requestSaveFirmaInfoError: function (data) {
            console.log(data);
            console.log('_requestgetFirmaInfoError');
        },
        _requestSaveFirmaInfoComplete: function (data) {
            console.log('_requestgetFirmaInfoComplete');
            $('#loader').hide();
        },

        deleteFirmaInfo: function(event, firmaId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {firmaid: firmaId},
                url: this._deleteFirmaApi,
                success: function(data){
                    self._requestDeleteFirmaInfoSuccess(data);
                },
                error: _.bind(this._requestDeleteFirmaInfoError, this),
                complete: _.bind(this._requestDeleteFirmaInfoComplete, this)
            });
        },
        _requestDeleteFirmaInfoSuccess: function (data) {
            var firmaList = new FirmaList(data);
            $(nzr).trigger('FirmaFormController.getFirmaList', firmaList);
        },
        _requestDeleteFirmaInfoError: function (data) {
            console.log(data);
            console.log('_requestDeleteFirmaInfoError');
        },
        _requestDeleteFirmaInfoComplete: function (data) {
            console.log('_requestDeleteFirmaInfoComplete');
            $('#loader').hide();
        },

        editFirmaList: function(event, firmaId){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: {firmaid: firmaId},
                url: this._getFirmaListApi,
                success: function(data){
                    self._requestEditFirmaListSuccess(data);
                },
                error: _.bind(this._requestEditFirmaListError, this),
                complete: _.bind(this._requestEditFirmaListComplete, this)
            });
        },
        _requestEditFirmaListSuccess: function (data) {
            var firmaList = new FirmaList(data['firma']),
                adress1   = new Adress(data['adress1']),
                adress2   = new Adress(data['adress2']),
                banki     = new BankList(data['bank']);
                writer    = new WriterList(data['writer']);
                console.log(data['writer']);
            $(nzr).trigger('FirmaFormController.EditFirmaList', {'f':firmaList, 'a1': adress1, 'a2': adress2, 'b': banki, 'w': writer});
        },
        _requestEditFirmaListError: function () {
            console.log('_requestEditFirmaListError');
        },
        _requestEditFirmaListComplete: function () {
            console.log('_requestEditFirmaListComplete');
            $('#loader').hide();
        },

        updateFirmaInfo: function(event, FirmaInfo){
            if (this._ajaxUpdate) {
                this._ajaxUpdate.abort();
                this._ajaxUpdate = null;
            }

            this.Firma = FirmaInfo;

            var dataFirma = {
                staus:       'editFirma',
                id:        this.Firma.id,
                name:      this.Firma.name,
                autonomer: this.Firma.autonomer,
                lastnomer: this.Firma.lastnomer,
                firstchar: this.Firma.firstchar,
                okpo:      this.Firma.okpo,
                tel:       this.Firma.tel,
                ras:       this.Firma.ras,
                bank:      this.Firma.bank,
                mfo:       this.Firma.mfo,
                email:     this.Firma.email,
                full_name:    this.Firma.full_name,
                dir_role:     this.Firma.dir_role,
                dir_fio:      this.Firma.dir_fio,
                buh_fio:      this.Firma.buh_fio,
                tel1:         this.Firma.tel1,
                svidot_nomer: this.Firma.svidot_nomer,
                svidot_date:  this.Firma.svidot_date,
                svidot_organ: this.Firma.svidot_organ
            };

            var self = this;
            this._ajaxUpdate = $.ajax({
                type: "POST",
                data: dataFirma,
                url: this._saveFirmaApi,
                success: function(data){
                    self._requestUpdateFirmaInfoSuccess(data);
                },
                error: _.bind(this._requestUpdateFirmaInfoError, this),
                complete: _.bind(this._requestUpdareFirmaInfoComplete, this)
            });
        },
        _requestUpdateFirmaInfoSuccess: function (data) {
            var firmaList = new FirmaList(data);
            $(nzr).trigger('FirmaFormController.getFirmaList', firmaList);
        },
        _requestUpdateFirmaInfoError: function (data) {
            console.log('_requestUpdateFirmaInfoError');
        },
        _requestUpdareFirmaInfoComplete: function (data) {
            console.log('_requestUpdareFirmaInfoComplete');
            $('#loader').hide();
        },

        updateAdress: function(event, adressInfo){
            if (this._ajaxUpdateAdress) {
                this._ajaxUpdateAdress.abort();
                this._ajaxUpdateAdress = null;
            }

            var dataAdress = {
                staus:    'updateAdress',
                id:       adressInfo.id,
                zip:      adressInfo.zip,
                oblast:   adressInfo.oblast,
                raion:    adressInfo.raion,
                t_pynkt:  adressInfo.t_pynkt,
                pynkt:    adressInfo.pynkt,
                t_street: adressInfo.t_street,
                street:   adressInfo.street,
                dom:      adressInfo.dom,
                kv:      adressInfo.kv,
                np:      adressInfo.np,
            };

            var self = this;
            this._ajaxUpdateAdress = $.ajax({
                type: "POST",
                data: dataAdress,
                url: this._saveAdressApi,
                success: function(data){
                    self._requestUpdateAdressSuccess(data);
                },
                error: _.bind(this._requestUpdateAdressError, this),
                complete: _.bind(this._requestUpdateAdressComplete, this)
            });
        },
        _requestUpdateAdressSuccess: function (data) {
            // var firmaList = new FirmaList(data['firma']);
            // $(nzr).trigger('FirmaFormController.getFirmaList', firmaList);
        },
        _requestUpdateAdressError: function (data) {
            console.log('_requestUpdateFirmaInfoError');
        },
        _requestUpdateAdressComplete: function (data) {
            console.log('_requestUpdareFirmaInfoComplete');
            $('#loader').hide();
        },

        addBankFirm: function(event, data){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: data,
                url: this._addBankApi,
                success: function(data){
                    self._requestAddBankFirmSuccess(data);
                },
                error: _.bind(this._requestAddBankFirmError, this),
                complete: _.bind(this._requestAddBankFirmComplete, this)
            });
        },
        _requestAddBankFirmSuccess: function (data) {
            var banklist = new BankList(data);
            $(nzr).trigger('FirmaFormController.bankList', banklist);
        },
        _requestAddBankFirmError: function () {
            console.log('_requestEditFirmaListError');
        },
        _requestAddBankFirmComplete: function () {
            console.log('_requestEditFirmaListComplete');
            $('#loader').hide();
        },

        addWriterFirm: function(event, data){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: data,
                url: this._addWriterApi,
                success: function(data){
                    self._requestAddWriterFirmSuccess(data);
                },
                error: _.bind(this._requestAddWriterFirmError, this),
                complete: _.bind(this._requestAddWriterFirmComplete, this)
            });
        },
        _requestAddWriterFirmSuccess: function (data) {
            var writerlist = new WriterList(data);
            $(nzr).trigger('FirmaFormController.writerList', writerlist);
        },
        _requestAddWriterFirmError: function () {
            console.log('_requestEditFirmaListError');
        },
        _requestAddWriterFirmComplete: function () {
            console.log('_requestEditFirmaListComplete');
            $('#loader').hide();
        },

        updateBank: function(event, bankInfo){
            if (this._ajaxUpdateBank) {
                this._ajaxUpdateBank.abort();
                this._ajaxUpdateBank = null;
            }

            var dataBank = {
                staus:     'updateBank',
                id:        bankInfo.id,
                mfo:       bankInfo.mfo,
                bank:      bankInfo.bank,
                ras:       bankInfo.ras,
                parent_id: bankInfo.parent_id,
                type:      bankInfo.type,
            };

            var self = this;
            this._ajaxUpdateBank = $.ajax({
                type: "POST",
                data: dataBank,
                url: this._saveBankApi,
                success: function(data){
                    self._requestUpdateBankSuccess(data);
                },
                error: _.bind(this._requestUpdateBankError, this),
                complete: _.bind(this._requestUpdateBankComplete, this)
            });
        },
        _requestUpdateBankSuccess: function (data) {
            var banklist = new BankList(data);
            $(nzr).trigger('FirmaFormController.bankList', banklist);
        },
        _requestUpdateBankError: function (data) {
            console.log('_requestUpdateFirmaInfoError');
        },
        _requestUpdateBankComplete: function (data) {
            console.log('_requestUpdareFirmaInfoComplete');
            $('#loader').hide();
        },


        showBankListReestr: function(event, firmaName){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: {firmaname: firmaName},
                url: this._getFirmaListByNameApi,
                success: function(data){
                    self._requestshowBankListReestrSuccess(data);
                },
                error: _.bind(this._requestshowBankListReestrError, this),
                complete: _.bind(this._requestshowBankListReestrComplete, this)
            });
        },
        _requestshowBankListReestrSuccess: function (data) {
            var firmaList = new FirmaList(data['firma']),
                adress1   = new Adress(data['adress1']),
                adress2   = new Adress(data['adress2']),
                banki     = new BankList(data['bank']);
            $(nzr).trigger('FirmaFormController.showBankList', {'f':firmaList, 'a1': adress1, 'a2': adress2, 'b': banki});
        },
        _requestshowBankListReestrError: function () {
            console.log('_requestEditFirmaListError');
        },
        _requestshowBankListReestrComplete: function () {
            console.log('_requestEditFirmaListComplete');
            $('#loader').hide();
        },

        updateWriter: function(event, writerInfo){
            if (this._ajaxUpdateBank) {
                this._ajaxUpdateBank.abort();
                this._ajaxUpdateBank = null;
            }

            var dataWriter = {
                staus:      'updateWriter',
                id:         writerInfo.id,
                fio:        writerInfo.fio,
                dolg:       writerInfo.dolg,
                sert_date:  writerInfo.sert_date,
                sert_nomer: writerInfo.sert_nomer,
                firma_id:   writerInfo.firma_id
            };

            var self = this;
            this._ajaxUpdateBank = $.ajax({
                type: "POST",
                data: dataWriter,
                url: this._saveWriterApi,
                success: function(data){
                    self._requestUpdateWriterSuccess(data);
                },
                error: _.bind(this._requestUpdateWriterError, this),
                complete: _.bind(this._requestUpdateWriterComplete, this)
            });
        },
        _requestUpdateWriterSuccess: function (data) {
            // var banklist = new BankList(data);
            // $(nzr).trigger('FirmaFormController.bankList', banklist);
        },
        _requestUpdateWriterError: function (data) {
            console.log(data);
            console.log('_requestUpdateFirmaInfoError');
        },
        _requestUpdateWriterComplete: function (data) {
            console.log('_requestUpdareFirmaInfoComplete');
            $('#loader').hide();
        },

    });

    ns.FirmaFormController = FirmaFormController;

})(nzr.controller);
