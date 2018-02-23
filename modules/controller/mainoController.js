nzr.controller = nzr.controller || {};
(function(ns){
    function MainoFormController(modelList) {
        /** @type OrganizList */
        this.mainoList = modelList || null;
        this.init();
    }
    _.extend(MainoFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _listSprMainoApi: '/api/listsprmainorow.php',
        _listRowMainoApi: '/api/listmainorow.php',
        _listRowFileMainoApi: '/api/list_file_maino.php',
        _listLoadFileMainoApi: '/api/load_file_maino.php',
        _saveRowMainoApi: '/api/saverowsmaino.php',
        _listSprMainoPriceApi: '/api/listsprmainoprice.php',
        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            // setTimeout(_.bind(this.getReestr, this), 0);
            $(nzr).on('MainoFormView.listSprMaino', _.bind(this.getSprMainoList, this));
            $(nzr).on('MainoFormView.getListSprPrice', _.bind(this.getListSprPrice, this));
            $(nzr).on('MainoFormView.onSaveMainoRows', _.bind(this.saveRowMaino, this));
            $(nzr).on('MainoFormView.onGetFileMainoRows', _.bind(this.onGetFileMainoRows, this));
            $(nzr).on('MainoFormView.onLoadFiles', _.bind(this.onLoadFiles, this));
            $(nzr).on('ReestrFormView.getListRowMaino', _.bind(this.getRowMainoList, this));
        },
        onLoadFiles: function(event, field){
            if (this._ajaxUpdate) {
                this._ajaxUpdate.abort();
                this._ajaxUpdate = null;
            }

            var form_data = new FormData();
            var ins = document.getElementById(field).files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById(field).files[x]);
            }

            var id = $('#'+field).data('idmaino'), retid = $('#'+field).data('reestrid'), type = $('#'+field).data('type');
            form_data.append("id", id);
            form_data.append("retid", retid);
            form_data.append("type", type);

            var self = this;
            this._ajaxUpdate = $.ajax({
                contentType:false,
                cache:false,
                processData:false,
                data: form_data,
                type: 'post',
                url: this._listLoadFileMainoApi,
                success: function(data){
                    self._requestLoadFilesSuccess(data, field);
                },
                error: _.bind(this._requestLoadFilesoError, this),
                complete: _.bind(this._requestLoadFilesComplete, this)
            });
        },
        _requestLoadFilesSuccess: function (data, field) {
            console.log('_requestLoadFilesSuccess');
            console.log(data);
            var block = $('#'+field).data('block');
            // $(block).text(data);

            var arraydata = {'items':data, 'block': block};

            $(nzr).trigger('MainoControlerView.showTableMainoListFileRow', arraydata);
        },
        _requestLoadFilesoError: function (data) {
            console.log('_requestLoadFilesoError');
            console.log(data);
        },
        _requestLoadFilesComplete: function (data) {
            console.log('_requestLoadFilesComplete');
            $('#loader').hide();
        },

        onGetFileMainoRows: function(event, field){
            if (this._ajaxSprRequest) {
                this._ajaxSprRequest.abort();
                this._ajaxSprRequest = null;
            }
            console.log(field);
            var self = this;
            this._ajaxSprRequest = $.ajax({
                type: 'POST',
                data: {'reestrid':field},
                url: this._listRowFileMainoApi,
                success: function(data){
                    self._requestGetFileMainoSuccess(data);
                },
                error: _.bind(this._requestGetFileMainoError, this),
                complete: _.bind(this._requestGetFileMainoComplete, this)
            });
        },
        _requestGetFileMainoSuccess: function (data) {
            console.log(data);
            $(nzr).trigger('MainoControlerView.listTabFileShow', data);
        },
        _requestGetFileMainoError: function (data) {
            console.log(data);
        },
        _requestGetFileMainoComplete: function (data) {
            $('#loader').hide();
        },

        saveRowMaino: function(event, data){
            if (this._ajaxUpdate) {
                this._ajaxUpdate.abort();
                this._ajaxUpdate = null;
            }

            var dats = [];

            data.items.forEach(function(element){
                var dataAddnew = {
                    id         : element.id,
                    reestr_id  : element.reestr_id,
                    vid_id     : element.vid_id,
                    opis       : element.opis,
                    count      : element.count,
                    price      : element.price,
                    vartist    : element.vartist,
                    vikon      : element.vikon
                };
                dats.push(dataAddnew);
            });


            var self = this;
            this._ajaxUpdate = $.ajax({
                type: 'POST',
                data: {'items': dats},
                url: this._saveRowMainoApi,
                success: function(data){
                    self._requestSaveRowMainoSuccess(data);
                },
                error: _.bind(this._requestSaveRowMainoError, this),
                complete: _.bind(this._requestSaveRowMainoComplete, this)
            });
        },
        _requestSaveRowMainoSuccess: function (data) {
            console.log(data);
            $(nzr).trigger('MainoControlerView.listRowTableShow', data);
        },
        _requestSaveRowMainoError: function (data) {
            console.log(data);
        },
        _requestSaveRowMainoComplete: function (data) {
            $('#loader').hide();
        },

        getRowMainoList: function(event, field){
            if (this._ajaxSprRequest) {
                this._ajaxSprRequest.abort();
                this._ajaxSprRequest = null;
            }
            console.log(field);
            var self = this;
            this._ajaxSprRequest = $.ajax({
                type: 'POST',
                data: {'reestrid':field},
                url: this._listRowMainoApi,
                success: function(data){
                    self._requestRowMainoSuccess(data);
                },
                error: _.bind(this._requestRowMainoError, this),
                complete: _.bind(this._requestRowMainoComplete, this)
            });
        },
        _requestRowMainoSuccess: function (data) {
            console.log(data);
            $(nzr).trigger('MainoControlerView.listRowTableShow', data);
        },
        _requestRowMainoError: function (data) {
            console.log(data);
        },
        _requestRowMainoComplete: function (data) {
            $('#loader').hide();
        },

        getSprMainoList: function(event, field){
            if (this._ajaxSprRequest) {
                this._ajaxSprRequest.abort();
                this._ajaxSprRequest = null;
            }
            console.log(field);
            var self = this;
            this._ajaxSprRequest = $.ajax({
                type: 'POST',
                data: {'reestrid':field},
                url: this._listSprMainoApi,
                success: function(data){
                    console.log(data);
                    self._requestSprMainoSuccess(data);
                },
                error: _.bind(this._requestSprMainoError, this),
                complete: _.bind(this._requestSprMainoComplete, this)
            });
        },
        _requestSprMainoSuccess: function (data) {
            console.log(data);
            $(nzr).trigger('MainoControlerView.addRowTableShow', data);
        },
        _requestSprMainoError: function (data) {
            console.log(data);
        },
        _requestSprMainoComplete: function (data) {
            $('#loader').hide();
        },

        getListSprPrice: function(event, field){
            if (this._ajaxSprRequest) {
                this._ajaxSprRequest.abort();
                this._ajaxSprRequest = null;
            }

            var self = this;
            this._ajaxSprRequest = $.ajax({
                url: this._listSprMainoPriceApi,
                success: function(data){
                    console.log(data);
                    self._requestListSprPriceSuccess(data);
                },
                error: _.bind(this._requestListSprPriceError, this),
                complete: _.bind(this._requestListSprPriceComplete, this)
            });
        },
        _requestListSprPriceSuccess: function (data) {
            console.log(data);
            var priceList = new SpravPriceList(data);
            $(nzr).trigger('MainoControlerView.sprModal', priceList);
        },
        _requestListSprPriceError: function (data) {
        },
        _requestListSprPriceComplete: function (data) {
            $('#loader').hide();
        },
    });

    ns.MainoFormController = MainoFormController;

})(nzr.controller);
