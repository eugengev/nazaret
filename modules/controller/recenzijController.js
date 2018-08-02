nzr.controller = nzr.controller || {};
(function(ns){
    function RecenzijFormController(RecenzijModel, RecenzijsModel) {
        /** @type OrganizList */
        this.Recenzij = RecenzijModel || null;
        this.Recenzijs = RecenzijsModel || null;
        this.init();
    }
    _.extend(RecenzijFormController.prototype, {
        _ajaxRequest: null,
        _ajaxRequestAnalog: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _idRecenzij: null,
        _getRecenzijInfoApi: '/api/recenzij/get_info.php',
        _getRecenzijSaveApi: '/api/recenzij/saveinfo.php',


        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            // setTimeout(_.bind(this.getRecenzijInitList, this), 0);
            $(nzr).on('RecenzijFormView.getRecenzijInfo', _.bind(this.getRecenzijInfo, this));
            $(nzr).on('RecenzijFormView.saveRecenzijForm', _.bind(this.getRecenzijSave, this));
        },

        getRecenzijInfo: function(event, data) {
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: 'POST',
                data: data,
                url: this._getRecenzijInfoApi,
                success: function(data){
                    self._request_getRecenzijInfoSuccess(data);
                },
                error: _.bind(this._request_getRecenzijInfoError, this),
                complete: _.bind(this._request_getRecenzijInfoComplete, this)
            });
        },
        _request_getRecenzijInfoSuccess: function (data) {
            console.log(data);
            var recenzijAuto = new Recenzij(data);
            $(nzr).trigger('RecenzijFormView.getRecenzijShow', recenzijAuto);
        },
        _request_getRecenzijInfoError: function (data) {
            console.log('_request_getRecenzijInfoError');
            console.log(data);
        },
        _request_getRecenzijInfoComplete: function () {
            console.log('_request_getRecenzijInfoComplete');
            $('#loader').hide();
        },

        getRecenzijSave: function(event, fdata) {
            if (this._ajaxUpdate) {
                this._ajaxUpdate.abort();
                this._ajaxUpdate = null;
            }

            var self = this;
            this._ajaxUpdate = $.ajax({
                type: 'POST',
                processData: false,
                contentType: false,
                data: fdata,
                url: this._getRecenzijSaveApi,
                success: function(data){
                    self._request_getRecenzijSaveSuccess(data);
                },
                error: _.bind(this._request_getRecenzijSaveError, this),
                complete: _.bind(this._request_getRecenzijSaveComplete, this)
            });
        },
        _request_getRecenzijSaveSuccess: function (data) {
            console.log(data);
            // var recenzijAuto = new Recenzij(data);
            // $(nzr).trigger('RecenzijFormView.getRecenzijShow', recenzijAuto);
        },
        _request_getRecenzijSaveError: function (data) {
            console.log('_request_getRecenzijInfoError');
            console.log(data);
        },
        _request_getRecenzijSaveComplete: function () {
            console.log('_request_getRecenzijInfoComplete');
            $('#loader').hide();
        },

    });

    ns.RecenzijFormController = RecenzijFormController;

})(nzr.controller);