nzr.controller = nzr.controller || {};
(function(ns){
    function OcencaAutoFormController(OcencaModel, OcencasModel) {
        /** @type OrganizList */
        this.Ocenca = OcencaModel || null;
        this.Ocencas = OcencasModel || null;
        this.init();
    }
    _.extend(OcencaAutoFormController.prototype, {
        _ajaxRequest: null,
        _ajaxRequestAnalog: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _idOcenca: null,
        _getOcencaInfoApi: '/api/auto_ocenca/get_info.php',
        _getOcencaInfoOneApi: '/api/auto_ocenca/get_info_one.php',
        _getOcencaUpdApi: '/api/auto_ocenca/upd_info.php',
        _getAnalogInfoApi: '/api/auto_ocenca/get_analog.php',
        _getAddAnalogAutoApi: '/api/auto_ocenca/add_analog.php',
        _getAnalogUpdApi: '/api/auto_ocenca/upd_analog.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            // setTimeout(_.bind(this.getOcencaInitList, this), 0);
            $(nzr).on('OcencaAutoFormView.getOcencaInfo', _.bind(this.getOcencaInfo, this));
            $(nzr).on('OcencaAutoFormView.addOcencaZero', _.bind(this.addOcencaZero, this));
            $(nzr).on('OcencaAutoFormView.getOcencaAutoOneInfo', _.bind(this.getOcencaAutoOneInfo, this));
            $(nzr).on('OcencaAutoFormView.updOcencaInfo', _.bind(this.updOcencaInfo, this));
            $(nzr).on('OcencaAutoFormView.getAnalogInfo', _.bind(this.getAnalogInfo, this));
            $(nzr).on('OcencaAutoFormView.addAnaloAuto', _.bind(this.addAnaloAuto, this));
            $(nzr).on('OcencaAutoFormView.updAnalogInfo', _.bind(this.updAnalogInfo, this));
        },

        getOcencaInfo: function(event, data) {
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: 'POST',
                data: data,
                url: this._getOcencaInfoApi,
                success: function(data){
                    self._request_getOcencaInfoSuccess(data);
                },
                error: _.bind(this._request_getOcencaInfoError, this),
                complete: _.bind(this._request_getOcencaInfoComplete, this)
            });
        },
        _request_getOcencaInfoSuccess: function (data) {
            console.log(data);
            var ocenсaAuto = new OcencaAuto(data);
            $(nzr).trigger('OcencaAutoFormView.getOcencaShow', ocenсaAuto);
        },
        _request_getOcencaInfoError: function (data) {
            console.log('_request_getOcencaInfoError');
            console.log(data);
        },
        _request_getOcencaInfoComplete: function () {
            console.log('_request_getOcencaInfoComplete');
            $('#loader').hide();
        },

        addOcencaZero: function(event, data) {
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: 'POST',
                data: data,
                url: this._getOcencaInfoApi,
                success: function(data){
                    self._request_addOcencaZeroSuccess(data);
                },
                error: _.bind(this._request_addOcencaZeroError, this),
                complete: _.bind(this._request_addOcencaZeroComplete, this)
            });
        },
        _request_addOcencaZeroSuccess: function (data) {
            console.log(data);
            var ocenсaAuto = new OcencaAuto(data);
            $(nzr).trigger('OcencaAutoFormView.showOcencaAddZero', ocenсaAuto);
        },
        _request_addOcencaZeroError: function (data) {
            console.log('_request_addOcencaZeroError');
            console.log(data);
        },
        _request_addOcencaZeroComplete: function () {
            console.log('_request_addOcencaZeroComplete');
            $('#loader').hide();
        },

        addAnaloAuto: function(event, data) {
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this._idOcenca = data.id;

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: 'POST',
                data: data,
                url: this._getAddAnalogAutoApi,
                success: function(data){
                    self._request_addAnaloAutoSuccess(data);
                },
                error: _.bind(this._request_addAnaloAutoError, this),
                complete: _.bind(this._request_addAnaloAutoComplete, this)
            });
        },
        _request_addAnaloAutoSuccess: function (data) {
            // console.log(data);
            // var ocencaAutoAnalogList = new OcencaAutoAnalogList(data);
            // $(nzr).trigger('OcencaAutoFormView.showOcencaAnalogAuto', ocencaAutoAnalogList);
            data = {
                id : this._idOcenca
            };
            $(nzr).trigger('OcencaAutoFormView.getAnalogInfo', data);
        },
        _request_addAnaloAutoError: function (data) {
            console.log('_request_addOcencaZeroError');
            console.log(data);
        },
        _request_addAnaloAutoComplete: function () {
            console.log('_request_addOcencaZeroComplete');
            $('#loader').hide();
        },

        getOcencaAutoOneInfo: function(event, data) {
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                type: 'POST',
                data: data,
                url: this._getOcencaInfoOneApi,
                success: function(data){
                    self._request_getOcencaAutoOneInfoSuccess(data);
                },
                error: _.bind(this._request_getOcencaAutoOneInfoError, this),
                complete: _.bind(this._request_getOcencaAutoOneInfoComplete, this)
            });
        },
        _request_getOcencaAutoOneInfoSuccess: function (data) {
            console.log(data);
            var ocenсaAutoOne = new OcencaAutoItem(data);
            $(nzr).trigger('OcencaAutoFormView.showOcencaAutoOne', ocenсaAutoOne);
        },
        _request_getOcencaAutoOneInfoError: function (data) {
            console.log('_request_getOcencaInfoError');
            console.log(data);
        },
        _request_getOcencaAutoOneInfoComplete: function () {
            console.log('_request_getOcencaInfoComplete');
            $('#loader').hide();
        },

        getAnalogInfo: function(event, data) {
            if (this._ajaxRequestAnalog) {
                this._ajaxRequestAnalog.abort();
                this._ajaxRequestAnalog = null;
            }

            var self = this;
            this._ajaxRequestAnalog = $.ajax({
                type: 'POST',
                data: data,
                url: this._getAnalogInfoApi,
                success: function(data){
                    self._request_getAnalogInfoSuccess(data);
                },
                error: _.bind(this._request_getAnalogInfoError, this),
                complete: _.bind(this._request_getAnalogInfoComplete, this)
            });
        },
        _request_getAnalogInfoSuccess: function (data) {
            console.log(data);
            var ocencaAutoAnalogList = new OcencaAutoAnalogList(data);
            $(nzr).trigger('OcencaAutoFormView.showOcencaAnalogAuto', ocencaAutoAnalogList);
        },
        _request_getAnalogInfoError: function (data) {
            console.log('_request_getAnalogInfoError');
            console.log(data);
        },
        _request_getAnalogInfoComplete: function () {
            console.log('_request_getAnalogInfoComplete');
            $('#loader').hide();
        },

        updOcencaInfo: function(event, data) {
            if (this._ajaxUpdate) {
                this._ajaxUpdate.abort();
                this._ajaxUpdate = null;
            }

            datta = {id : ''};
            for (var prop in data) {
                if (prop != 'init') {
                    datta[prop] = data[prop];
                }
            }

            console.log(datta);

            var self = this;
            this._ajaxUpdate = $.ajax({
                type: 'POST',
                data: datta,
                url: this._getOcencaUpdApi,
                success: function(data){
                    self._request_gupdOcencaInfoSuccess(data);
                },
                error: _.bind(this._request_updOcencaInfoError, this),
                complete: _.bind(this._request_updOcencaInfoComplete, this)
            });
        },
        _request_gupdOcencaInfoSuccess: function (data) {
            console.log(data);
            var ocenсaAuto = new OcencaAutoItem(data);
            $(nzr).trigger('OcencaAutoFormView.showOcencaAutoOneUpd', ocenсaAuto);
        },
        _request_updOcencaInfoError: function (data) {
            console.log('_request_getOcencaInfoError');
            console.log(data);
        },
        _request_updOcencaInfoComplete: function () {
            console.log('_request_getOcencaInfoComplete');
            $('#loader').hide();
        },


        updAnalogInfo: function(event, data) {
            if (this._ajaxUpdate) {
                this._ajaxUpdate.abort();
                this._ajaxUpdate = null;
            }

            datta = {items : []};
            for (var prop in data) {
                if (prop != 'init') {
                    for (var pr in data[prop]) {
                        if (pr != 'init') {
                            dat = {items : ''};
                            for (var pro in data[prop][pr]) {
                                if (pro != 'init') {
                                    dat[pro] = data[prop][pr][pro];
                                }
                            }
                        }
                        datta['items'].push(dat);
                    }
                }
            }

            var self = this;
            this._ajaxUpdate = $.ajax({
                type: 'POST',
                data: datta,
                url: this._getAnalogUpdApi,
                success: function(data){
                    self._request_updAnalogInfoSuccess(data);
                },
                error: _.bind(this._request_updAnalogInfoError, this),
                complete: _.bind(this._request_updAnalogInfoComplete, this)
            });
        },
        _request_updAnalogInfoSuccess: function (data) {
            console.log(data);
            var ocencaAutoAnalogList = new OcencaAutoAnalogList(data);
            $(nzr).trigger('OcencaAutoFormView.showOcencaAnalogAuto', ocencaAutoAnalogList);

            // data = {
            //     idoa : ocencaAutoAnalogList.items[0].ocenca_auto_id
            // };
            // $(nzr).trigger('OcencaAutoFormView.getOcencaAutoOneInfo', data);

        },
        _request_updAnalogInfoError: function (data) {
            console.log('_request_getOcencaInfoError');
            console.log(data);
        },
        _request_updAnalogInfoComplete: function () {
            console.log('_request_getOcencaInfoComplete');
            $('#loader').hide();
        },

    });

    ns.OcencaAutoFormController = OcencaAutoFormController;

})(nzr.controller);