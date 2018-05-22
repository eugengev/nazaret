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
            $(nzr).on('SpravochFormView.sprModal', _.bind(this.onModalSprOpen, this));

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
        },

        onModalSprOpen: function(event, sprList){
            this.modelList = sprList;
            var tempReestrFormFirst = this.renderTemplate('ReestrFormView-TableSpr', this.modelList), self = this;
            this.modalSpr.find('.js-modal-body').html(tempReestrFormFirst);
            var trClick = this.modalSpr.find('.js-Spr-Items-click');
            trClick.on('click', _.bind(this.onTrClickSpr, this));
            var btEditSprClick = this.modalSpr.find('.js-edit-spr-item');
            btEditSprClick.on('click', _.bind(this.onClickSprEdit, this));
            var btDeleteSprClick = this.modalSpr.find('.js-delete-spr-item');
            btDeleteSprClick.on('click', _.bind(this.onClickSprDel, this));
            $('#sprModalCenter').modal('show')
        },

        onClickSprEdit: function (event) {
            var that = $(event.currentTarget);
            that.parents('tr').find('span').hide();
            that.parents('tr').find('.js-edit-spr-item').hide();
            that.parents('tr').find('.js-save-spr-item').show();
            that.parents('tr').find('.js-Spr-Items-click').unbind('click');
            that.parents('tr').find('.js-save-spr-item').on('click', _.bind(this.onClickSprSave, this));
            that.parents('tr').find('input').attr('type','text');
        },

        onClickSprSave: function(event) {
            var id = event.currentTarget.dataset.id,
                that = $(event.currentTarget);
            var data = {
                table: this.modalSpr.data('table'),
                id: id,
                val_new: that.parents('tr').find('input').val(),
                val_ser: '',
                type: 'editspr'
            };
            $(nzr).trigger('SpravochFormView.getAddSpr', data);
        },

        onClickSprDel: function(event) {
            var id = event.currentTarget.dataset.id;
            var data = {
                table: this.modalSpr.data('table'),
                id: id,
                val_new: '',
                val_ser: '',
                type: 'delspr'
            };
            $(nzr).trigger('SpravochFormView.getAddSpr', data);
        },

        onTrClickSpr: function (event) {
            var id = event.currentTarget.dataset.id,
                name = event.currentTarget.dataset.value,
                nameImput = this.modalSpr.data('name');
            var input = this.container.find('input[name="'+nameImput+'"]');
            console.log(name, id, nameImput);
            input.val(name);
            input.data('id',id);
            input.change();
            $('#sprModalCenter').modal('hide')
        },


        // onShowResultSearhc: function (event , list) {
        //     var tempReestrFormFirst = this.renderTemplate('ReestrFormView-TableSpr', this.modelList), self = this;
        //     this.modalSpr.find('.js-modal-body').html(tempReestrFormFirst);
        //     var trClick = this.modalSpr.find('.js-Spr-Items-click');
        //     trClick.on('click', _.bind(this.onTrClickSpr, this));
        // }

    });

    ns.SpravochFormView = SpravochFormView;

})(nzr.view);
