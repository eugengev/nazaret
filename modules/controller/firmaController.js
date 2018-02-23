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
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _getFirmaListApi: '/api/get_firma_list.php',
        _saveFirmaApi: '/api/save_firma.php',
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
            var firmaList = new FirmaList(data);
            $(nzr).trigger('FirmaFormController.getFirmaList', firmaList);
        },
        _requestgetFirmaListError: function () {
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
            console.log(firmaList);
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
            var firmaList = new FirmaList(data);
            $(nzr).trigger('FirmaFormController.EditFirmaList', firmaList);
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
                id:      this.Firma.id,
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
    });

    ns.FirmaFormController = FirmaFormController;

})(nzr.controller);
