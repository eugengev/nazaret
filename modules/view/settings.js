nzr.view = nzr.view || {};
(function(ns){

    function SettingsView(model) {
        this.className = "SettingsView";
        this.model = model || null;
        this.init();
    }
    _.extend(SettingsView.prototype, nzr.view.BaseView.prototype);
    _.extend(SettingsView.prototype, {

        init: function() {
            this.setElement();

            var tempforms = nzr.utils.compileTemplate;
            this.templates = {
                viewNoCard: tempforms('#SettingsView'),
                viewWithCard: tempforms('#SettingsView-card')
            };

            this.listOrg = this.element.find("a.listOrg");
            this.listOrg.on('click', _.bind(this.listOrg, this));
            $(nzr).on('PaymentFormController.requestSuccess', _.bind(this.renderPaymentList, this));
        },

        renderPaymentList: function(event, model) {
            this.model = model;
            this.selectChose.styler('destroy');
            var paymentOption = '';
            var paymentSystem = this.model.paymentSystem;
            for (var i=0; i < this.model.list.length; i++) {
                var item = this.model.list[i];

                if (item.id == paymentSystem) {
                    paymentOption = paymentOption + '<option selected value="'+item.id+'">'+item.name+'</option>';
                    if (item.subscribe) {
                        this.onChoseCreditCard();
                    }
                } else {
                    paymentOption = paymentOption + '<option value="'+item.id+'">'+item.name+'</option>';
                }
            }

            this.selectChose.html(paymentOption);
            this.selectChose.styler();
        },

        onChoseMetod: function(element){
            var selectMethodId = this.selectChose.val();
            var paymetListItem = this.model.getItemById(selectMethodId);
            if (paymetListItem.subscribe) {
                this.onChoseCreditCard();
            } else {
                this.element.find('.j-CreditCard').remove();
            }

            $(nzr).trigger('SettingsView.onChoseMetod', selectMethodId);
        },

        onChoseCreditCard: function(){
            if (this.model.card === null) {
                this.find('.j-CreditCard').remove();
                // var tmpChoseCrediCard = this.templates.viewNoCard;

                var tmpChoseCrediCard = this.renderTemplate('noCard');

                this.element.prepend(tmpChoseCrediCard);
            } else {
                this.find('.j-CreditCard').remove();
                // var tmpChoseCrediCard = this.templates.viewWithCard;

                var tmpChoseCrediCard = this.renderTemplate('card');
                this.element.prepend(tmpChoseCrediCard);
                this.find('.j-cardnumber').text(this.model.card);
            }
        },

        listOrg: function () {
            
        }

    });

    ns.SettingsView = SettingsView;

})(nzr.view);
