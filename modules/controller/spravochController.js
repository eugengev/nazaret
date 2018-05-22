nzr.controller = nzr.controller || {};
(function(ns){
    function SpravochFormController(SpravochModel, SpravochsModel) {
        /** @type OrganizList */
        this.spravoch = SpravochModel || null;
        this.spravochs = SpravochModel || null;
        this.init();
    }
    _.extend(SpravochFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _getSearchSprApi: '/api/get_search_spr.php',
        _addSpravochApi: '/api/add_to_spr.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            $(nzr).on('SpravochFormView.getSearchSpr', _.bind(this.getSearchSpr, this));
            $(nzr).on('SpravochFormView.getAddSpr',    _.bind(this.getAddSpr, this));
            // $(nzr).on('SpravochFormView.saveSpravochForm',  _.bind(this.saveSpravochInfo, this));
            // $(nzr).on('SpravochFormView.deleteSpravochInfo',  _.bind(this.deleteSpravochInfo, this));
        },

        getSearchSpr: function(event, data){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: "POST",
                data: data,
                url: this._getSearchSprApi,
                success: function(data){
                    self._requestSearchSuccess(data);
                },
                error: _.bind(this._requestSearchError, this),
                complete: _.bind(this._requestSearchComplete, this)
            });
        },
        _requestSearchSuccess: function (data) {
            console.log(data);
            var sprList = new SpravochList(data);
            // $(nzr).trigger('SpravochFormController.onShowResultSearhc', sprList);
            $(nzr).trigger('ReestrFormController.sprModal', sprList);
        },
        _requestSearchError: function (data) {
        },
        _requestSearchComplete: function (data) {
            $('#loader').hide();
        },

        getAddSpr: function(event, data){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: data,
                url: this._addSpravochApi,
                success: function(data){
                    self._requestAddSuccess(data);
                },
                error: _.bind(this._requestAddError, this),
                complete: _.bind(this._requestAddComplete, this)
            });
        },
        _requestAddSuccess: function (data) {
            console.log(data);
            var sprList = new SpravochList(data);
            // $(nzr).trigger('SpravochFormController.onShowResultSearhc', sprList);
            $(nzr).trigger('SpravochFormView.sprModal', sprList);
        },
        _requestAddError: function (data) {
        },
        _requestAddComplete: function (data) {
            $('#loader').hide();
        },

    });

    ns.SpravochFormController = SpravochFormController;

})(nzr.controller);
