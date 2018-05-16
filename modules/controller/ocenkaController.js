nzr.controller = nzr.controller || {};
(function(ns){
    function OcenkaFormController(OcenkaModel, OcenkasModel) {
        /** @type OrganizList */
        this.Ocenka = OcenkaModel || null;
        this.Ocenkas = OcenkasModel || null;
        this.init();
    }
    _.extend(OcenkaFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _getOcenkaListApi: '/api/get_ocenka_list.php',
        _getOcenkaInitApi: '/api/get_ocenka_list_init.php',
        _saveOcenkaApi: '/api/ocenca/save_ocenka.php',
        _deleteOcenkaApi: '/api/delete_ocenka.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            setTimeout(_.bind(this.getOcenkaInitList, this), 0);
            $(nzr).on('OcenkaFormView.getOcenkaList', _.bind(this.getOcenkaList, this));
            $(nzr).on('OcenkaFormView.saveOcenkaInfo', _.bind(this.saveOcenkaInfo, this));
        },

        getOcenkaInitList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getOcenkaInitApi,
                success: function(data){
                    self._requestgetOcenkaInitListSuccess(data);
                },
                error: _.bind(this._requestgetOcenkaInitListError, this),
                complete: _.bind(this._requestgetOcenkaInitListComplete, this)
            });
        },
        _requestgetOcenkaInitListSuccess: function (data) {
            var ocenkaInit = new OcenkaInitList(data);
            $(nzr).trigger('OcenkaFormController.showOcenkaInit', ocenkaInit);
        },
        _requestgetOcenkaInitListError: function () {
            console.log('_requestgetOcenkaListError');
        },
        _requestgetOcenkaInitListComplete: function () {
            console.log('_requestgetOcenkaListComplete');
            $('#loader').hide();
        },

        getOcenkaList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getOcenkaListApi,
                success: function(data){
                    self._requestgetOcenkaListSuccess(data);
                },
                error: _.bind(this._requestgetOcenkaListError, this),
                complete: _.bind(this._requestgetOcenkaListComplete, this)
            });
        },
        _requestgetOcenkaListSuccess: function (data) {
            var ocenkaList = new OcenkaList(data);
            $(nzr).trigger('OcenkaFormController.getOcenkaList', ocenkaList);
        },
        _requestgetOcenkaListError: function () {
            console.log('_requestgetOcenkaListError');
        },
        _requestgetOcenkaListComplete: function () {
            console.log('_requestgetOcenkaListComplete');
            $('#loader').hide();
        },


        saveOcenkaInfo: function(event, datta){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            console.log(datta);

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: datta,
                url: this._saveOcenkaApi,
                success: function(data){
                    self._requestSaveOcenkaInfoSuccess(data);
                },
                error: _.bind(this._requestSaveOcenkaInfoError, this),
                complete: _.bind(this._requestSaveOcenkaInfoComplete, this)
            });
        },
        _requestSaveOcenkaInfoSuccess: function (data) {
            // var ocenkaList = new OcenkaList(data);
            // $(nzr).trigger('OcenkaFormController.getOcenkaList', ocenkaList);
        },
        _requestSaveOcenkaInfoError: function () {
            console.log('_requestgetOcenkaListError');
        },
        _requestSaveOcenkaInfoComplete: function () {
            console.log('_requestgetOcenkaListComplete');
            $('#loader').hide();
        },

   });

    ns.OcenkaFormController = OcenkaFormController;

})(nzr.controller);
