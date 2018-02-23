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
            // this.getButtonList.on('click', _.bind(this.onClickSpravochsList, this));
            // $(nzr).on('SpravochFormController.getSpravochInfoInit', _.bind(this.getSpravochInfoInit, this));
            // $(nzr).on('SpravochFormController.getSpravochList', _.bind(this.getSpravochList, this));
        },

        onSearchClick: function() {

        }

    });

    ns.SpravochFormView = SpravochFormView;

})(nzr.view);
