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
        _getSpravochListApi: '/api/get_spravoch_list.php',
        _saveSpravochApi: '/api/save_spravoch_info.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            // $(nzr).on('SpravochFormView.getSpravochList',  _.bind(this.getSpravochList, this));
            // $(nzr).on('SpravochFormView.saveSpravochForm',  _.bind(this.saveSpravochInfo, this));
            // $(nzr).on('SpravochFormView.deleteSpravochInfo',  _.bind(this.deleteSpravochInfo, this));
        },

    });

    ns.SpravochFormController = SpravochFormController;

})(nzr.controller);
