/**
 * Created by  on 29.07.15.
 */
nzr.controller = nzr.controller || {};
(function(ns){
    function SettingsFormController(model) {
        /** @type ProductList */
        this.settings = model || null;
        this.init();
    }
    _.extend(SettingsFormController.prototype, {
        _ajaxRequest: null,
        _ajaxUpdate: null,
        _settingsApi: '/api/settings.php',

        init: function() {
            var self = this;

            setTimeout(_.bind(this.getSettingsInfo, this), 0);
        },

        getSettingsInfo: function(){

            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: self._settingsApi,
                success: function(data){
                    self._requestSuccess(data);
                },
                error: _.bind(this._requestError, this),
                complete: _.bind(this._requestComplete, this)
            });
        },

        _requestSuccess: function(data) {
            // console.log('_requestSuccess');
            // var payment = new SettingsList(data);
            // $(nzr).trigger('SettingsFormController.requestSuccess', Settings);
        },

        _requestError: function(data) {
            // console.log('_requestError');
        },

        _requestComplete: function(data) {
            // console.log('_requestComplete');
            this._ajaxRequest = null;
        },

    });

    ns.SettingsFormController = SettingsFormController;

})(nzr.controller);