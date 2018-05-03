nzr.view = nzr.view || {};
(function(ns){

    function MainoFormView(model, modelPriceList, mainoList) {
        this.model = model || null;
        this.mainoList = mainoList || null;
        this.modelPriceList = modelPriceList || null;
        this.init();
    }
    _.extend(MainoFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(MainoFormView.prototype, {

        init: function() {
            this.setElement();
            this.container = $('#content');
            this.tableMaino = null;
            this.tabFileMaino = null;
            this.modalSpr = $('#sprModalCenter');

            $(nzr).on('ReestrFormView.addRowTable', _.bind(this.addRowTable, this));
            $(nzr).on('ReestrFormView.onSaveMaino', _.bind(this.onSaveMaino, this));
            $(nzr).on('ReestrFormView.openTabFile', _.bind(this.openTabFile, this));
            $(nzr).on('MainoControlerView.addRowTableShow', _.bind(this.addRowTableShow, this));
            $(nzr).on('MainoControlerView.sprModal', _.bind(this.onModalSprOpen, this));
            $(nzr).on('MainoControlerView.listRowTableShow', _.bind(this.listRowTableShow, this));
            $(nzr).on('MainoControlerView.listTabFileShow', _.bind(this.listTabFileShow, this));
            $(nzr).on('MainoControlerView.showTableMainoListFileRow', _.bind(this.showTableMainoListFileRow, this));
        },

        showTableMainoListFileRow: function(event, arraydata) {
            console.log(arraydata);
            var tempMainoFileFormRow = this.renderTemplate('ReestrFormView-TableMainoListFileRow', {"items": arraydata.items});
            this.tabFileMainoRow = this.container.find(arraydata.block);
            this.tabFileMainoRow.html(tempMainoFileFormRow);
        },

        openTabFile: function(){
            $('#loader').show();
            var id = $('#reestrid').val();
            $(nzr).trigger('MainoFormView.onGetFileMainoRows', id);

            // var tempMainoFileForm = this.renderTemplate('ReestrFormView-TableMainoListFile');
            // this.tabFileMaino = this.container.find('.js-block-files');
            // this.tabFileMaino.html(tempMainoFileForm);
        },

        listTabFileShow: function(event, data) {
            console.log(data);
            var tempMainoFileForm = this.renderTemplate('ReestrFormView-TableMainoListFile', {"items": data.items, "files": data.files, "maino": data.maino});
            this.tabFileMaino = this.container.find('.js-block-files');
            this.tabFileMaino.html(tempMainoFileForm);

            var inputFile = this.tabFileMaino.find('.js-file-input-excel');
            inputFile.on('change', _.bind(this.loadFileMino, this));
        },

        loadFileMino: function(event) {
            $('#loader').show();
            var idForm = $(event.target).attr('id');

            console.log('Loadfile',idForm);

            $(nzr).trigger('MainoFormView.onLoadFiles', idForm);
        },

        onSaveMaino: function() {
            $('#loader').show();
            var tBody = this.tableMaino,
                dr = [],
                dataRows = [];
            tBody.find('.js-maino-row').each(function(){
                var  dataRow = [];
                $(this).find('input,select').each(function(){
                    var nameInput = $(this).attr('name');
                    dataRow[nameInput] = $(this).val();
                });
                dataRows.push(dataRow);
            });
            console.log(dataRows);
            drr = {'items':dataRows};
            console.log(drr);
            $(nzr).trigger('MainoFormView.onSaveMainoRows', drr);
        },

        addRowTable: function() {
            $('#loader').show();
            var id = $('#reestrid').val();
            $(nzr).trigger('MainoFormView.listSprMaino', id);
        },

        addRowTableShow: function(event, data) {
            var tempMainoRowForm = this.renderTemplate('ReestrFormView-TableMainoOneRow', {"typemaino": data.maino, "viconav": data.viconav, "idd": data.idrow, "idr": $('#reestrid').val()});
            this.tableMaino = this.container.find('.js-maino-table-row');
            this.tableMaino.append(tempMainoRowForm);
            var inputPrice = this.tableMaino.find('.js-maino-one-count, .js-maino-one-price, .js-maino-price');
            inputPrice.on('keyup', _.bind(this.onCountPrice, this));

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));
        },

        listRowTableShow: function(event, data) {
            var tempMainoRowForm = this.renderTemplate('ReestrFormView-TableMainoListRow', {"typemaino": data.maino, "viconav": data.viconav, "rowws": data.mainorow});
            this.tableMaino = this.container.find('.js-maino-table-row');
            this.tableMaino.html(tempMainoRowForm);
            var inputPrice = this.tableMaino.find('.js-maino-one-count, .js-maino-one-price, .js-maino-price');
            inputPrice.on('keyup', _.bind(this.onCountPrice, this));

            this.buttonsModalSpr = this.container.find('.js-modal-sprv');
            this.buttonsModalSpr.on('click', _.bind(this.onModalSprClick, this));

            this.onAllCountPrice();
        },


        onCountPrice: function (event) {
            var trRow = $(event.target).parents('.js-maino-row'),
                allSumm = 0;
                count = parseInt(trRow.find('.js-maino-one-count').val()),
                price = parseInt(trRow.find('.js-maino-one-price').val()),
                pricev = parseInt(trRow.find('.js-maino-price').data('price'));

            trRow.find('.js-maino-one-summ').val(count*price);
            trRow.find('.js-maino-price').val(count*pricev);

            this.tableMaino.find('.js-maino-one-summ').each(function(){
                allSumm = allSumm + parseInt($(this).val());
            });

            console.log(allSumm);

            this.container.find('.js-maino-all-summ').val(allSumm);
        },

        onAllCountPrice: function (event) {
            this.tableMaino.find('.js-maino-row').each(function(){
                var trRow = $(this),
                    count = parseInt(trRow.find('.js-maino-one-count').val()),
                    price = parseInt(trRow.find('.js-maino-one-price').val());

                trRow.find('.js-maino-one-summ').val(count*price);
            });

            var allSumm = 0;

            this.tableMaino.find('.js-maino-one-summ').each(function(){
                allSumm = allSumm + parseInt($(this).val());
            });

            console.log(allSumm);

            this.container.find('.js-maino-all-summ').val(allSumm);
        },

        onModalSprClick: function(event){
            $('#loader').show();
            this.modalSpr.data('target', $(event.target).parents('.input-group').find('input'));
            var field = {
                'idCity': this.container.find('input[name="city"]').data('id'),
                'table': event.currentTarget.dataset.spr
            };

            $(nzr).trigger('MainoFormView.getListSprPrice', field);
        },

        onModalSprOpen: function(event, priceList){
            this.modelPriceList = priceList;
            var tempReestrFormFirst = this.renderTemplate('ReestrFormView-TableSprPrice', this.modelPriceList ), self = this;
            this.modalSpr.find('.modal-body').html(tempReestrFormFirst);
            var trClick = this.modalSpr.find('.js-Spr-Items-click');
            trClick.on('click', _.bind(this.onTrClickSpr, this));
            $('#sprModalCenter').modal('show')
        },

        onTrClickSpr: function (event) {
            console.log('click tr', this.modalSpr.data('target'));
            var id = event.currentTarget.dataset.id,
                name = event.currentTarget.dataset.value,
                price = event.currentTarget.dataset.price,
                input = this.modalSpr.data('target');
            input.val(price);
            input.data('id',id);
            input.data('name',name);
            input.data('price',price);
            input.keyup();
            $('#sprModalCenter').modal('hide')
        },

    });

    ns.MainoFormView = MainoFormView;

})(nzr.view);