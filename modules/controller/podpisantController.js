nzr.controller = nzr.controller || {};
(function(ns){
    function PodpisantFormController(PodpisantModel, PodpisantsModel) {
        /** @type OrganizList */
        this.podpisant = PodpisantModel || null;
        this.podpisants = PodpisantModel || null;
        this.init();
    }
    _.extend(PodpisantFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _getPodpisantInfoApi: '/api/get_podpisant.php',
        _getPodpisantListApi: '/api/get_podpisant_list.php',
        _savePodpisantApi: '/api/save_podpisant_info.php',
        _deletePodpisantApi: '/api/delete_podpisant_info.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            $(nzr).on('PodpisantFormView.getPodpisantList',  _.bind(this.getPodpisantList, this));
            $(nzr).on('PodpisantFormView.savePodpisantForm',  _.bind(this.savePodpisantInfo, this));
            $(nzr).on('PodpisantFormView.deletePodpisantInfo',  _.bind(this.deletePodpisantInfo, this));
        },

        getPodpisantInfo: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getPodpisantInfoApi,
                success: function(data){
                    self._requestgetPodpisantInfoSuccess(data);
                },
                error: _.bind(this._requestgetPodpisantInfoError, this),
                complete: _.bind(this._requestgetPodpisantInfoComplete, this)
            });
        },
        _requestgetPodpisantInfoSuccess: function (data) {
            this.podpisant = data;
            console.log('_requestgetPodpisantInfoSuccess');
            $(nzr).trigger('PodpisantFormController.getPodpisantInfoInit', this.podpisant);
        },
        _requestgetPodpisantInfoError: function (data) {
            console.log(data);
            console.log('_requestgetPodpisantInfoError');
        },
        _requestgetPodpisantInfoComplete: function (data) {
            console.log('_requestgetPodpisantInfoComplete');
            $('#loader').hide();
        },

        getPodpisantList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getPodpisantListApi,
                success: function(data){
                    self._requestgetPodpisantListSuccess(data);
                },
                error: _.bind(this._requestgetPodpisantListError, this),
                complete: _.bind(this._requestgetPodpisantListComplete, this)
            });
        },
        _requestgetPodpisantListSuccess: function (data) {
            var podpisantsList = new PodpisantsList(data);
            $(nzr).trigger('PodpisantFormController.getPodpisantList', podpisantsList);
        },
        _requestgetPodpisantListError: function (data) {
            console.log(data);
            console.log('_requestgetPodpisantListError');
        },
        _requestgetPodpisantListComplete: function (data) {
            console.log('_requestgetPodpisantListComplete');
            $('#loader').hide();
        },

        savePodpisantInfo: function(event, podpisantInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.podpisant = podpisantInfo;

            console.log(podpisantInfo);
            console.log(this.podpisant);

            var dataPodpisant = {
                staus:       'addpodpisant',
                login_podpisant:  this.podpisant.login,
                passwd_podpisant: this.podpisant.password,
                passwd_re:   this.podpisant.repassword,
                mail_podpisant:   this.podpisant.mail_podpisant,
                role:        this.podpisant.role,
                fio:         this.podpisant.fio
            };

            console.log(dataPodpisant);

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataPodpisant,
                url: this._savePodpisantApi,
                success: function(data){
                    self._requestSavePodpisantInfoSuccess(data);
                },
                error: _.bind(this._requestSavePodpisantInfoError, this),
                complete: _.bind(this._requestSavePodpisantInfoComplete, this)
            });
        },
        _requestSavePodpisantInfoSuccess: function (data) {
            var podpisantsList = new PodpisantsList(data);
            $(nzr).trigger('PodpisantFormController.getPodpisantList', podpisantsList);
        },
        _requestSavePodpisantInfoError: function (data) {
            console.log(data);
            console.log('_requestgetPodpisantInfoError');
        },
        _requestSavePodpisantInfoComplete: function (data) {
            console.log('_requestgetPodpisantInfoComplete');
            $('#loader').hide();
        },

        deletePodpisantInfo: function(event, podpisantId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {podpisantid: podpisantId},
                url: this._deletePodpisantApi,
                success: function(data){
                    self._requestDeletePodpisantInfoSuccess(data);
                },
                error: _.bind(this._requestDeletePodpisantInfoError, this),
                complete: _.bind(this._requestDeletePodpisantInfoComplete, this)
            });
        },
        _requestDeletePodpisantInfoSuccess: function (data) {
            var podpisantsList = new PodpisantsList(data);
            $(nzr).trigger('PodpisantFormController.getPodpisantList', podpisantsList);
        },
        _requestDeletePodpisantInfoError: function (data) {
            console.log(data);
            console.log('_requestgetPodpisantInfoError');
        },
        _requestDeletePodpisantInfoComplete: function (data) {
            console.log('_requestgetPodpisantInfoComplete');
            $('#loader').hide();
        },


    });

    ns.PodpisantFormController = PodpisantFormController;

})(nzr.controller);
