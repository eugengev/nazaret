nzr.view = nzr.view || {};
(function(ns){

    function SpravochFormView(SpravochModel, SpravochsModel) {
        this.className = "SpravochFormView";
        this.spravoch = SpravochModel || null;
        this.spravochs = SpravochsModel || null;
        this.init();
    }
    _.extend(SpravochFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(SpravochFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.modalSpr = $('#sprModalCenter');
            this.searchButton = $('.js-spr-search-btn');
            this.searchInput = $('.js-spr-search-input');
            this.searchAddButton = $('.js-spr-search-add-btn');
            this.searchAddInput = $('.js-spr-search-add-input');

            this.searchButton.on('click', _.bind(this.onSearchClick, this));
            this.searchAddButton.on('click', _.bind(this.onNewClick, this));
            this.searchInput.on('keyup', _.bind(this.onSearchClick, this));
            // this.getButtonList.on('click', _.bind(this.onClickSpravochsList, this));
            // $(nzr).on('SpravochFormController.onShowResultSearhc', _.bind(this.onShowResultSearhc, this));
            // $(nzr).on('SpravochFormController.getSpravochList', _.bind(this.getSpravochList, this));
        },

        onSearchClick: function() {
            console.log('js-spr-search-btn');
            var data = {
                    table: this.modalSpr.data('table'),
                    val: this.searchInput.val()
                };
            $(nzr).trigger('SpravochFormView.getSearchSpr', data);
        },

        onNewClick: function() {
            console.log('js-spr-search-btn');
            var data = {
                table: this.modalSpr.data('table'),
                val_new: this.searchAddInput.val(),
                val_ser: this.searchInput.val()
            };
            $(nzr).trigger('SpravochFormView.getAddSpr', data);
        }


        // onShowResultSearhc: function (event , list) {
        //     var tempReestrFormFirst = this.renderTemplate('ReestrFormView-TableSpr', this.modelList), self = this;
        //     this.modalSpr.find('.js-modal-body').html(tempReestrFormFirst);
        //     var trClick = this.modalSpr.find('.js-Spr-Items-click');
        //     trClick.on('click', _.bind(this.onTrClickSpr, this));
        // }

    });

    ns.SpravochFormView = SpravochFormView;

})(nzr.view);
