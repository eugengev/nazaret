nzr.view = nzr.view || {};
(function(ns){

    function MessageFormView(model, modelList) {
        /** @type КууіекList */
        this.className = "MessageFormView";
        this.message = model || null;
        this.messages = modelList || null;
        this.init();
    }
    _.extend(MessageFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(MessageFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.userfio = $('#userfio');
            this.getButtonList = $('#js-all-message');
            this.messagelist = $('#new-message-list');
            this.countmessage = $('#count-new-message');
            this.buttonAddUser = null;
            this.autoNomDog = null;
            this.formAddUser = null;


            $(nzr).on('MessageFormController.getMessageList', _.bind(this.getMessageList, this));
            $(nzr).on('MessageFormController.getMessageParent', _.bind(this.getMessageParent, this));
            $(nzr).on('MessageFormController.showAddFormMessage', _.bind(this.showAddFormMessage, this));
            $(nzr).on('MessageFormController.getNewMessageList', _.bind(this.getNewMessageList, this));
        },

        onClickMessageList: function() {
            $('#loader').show();
            $(nzr).trigger('MessageFormView.getMessageList');
        },

        getMessageList: function(event, messages) {
            var template = this.renderTemplate('MessageView-List',{"items": messages.items});
            this.container.html(template);

            this.buttonAddMessage = this.container.find('.js-new-message');
            this.buttonAddMessage.on('click', _.bind(this.addFormMessage, this));

            this.buttonViewMessage = this.container.find('.js-view-message');
            this.buttonViewMessage.on('click', _.bind(this.viewFormMessage, this));

            this.buttonDeleteMessage = this.container.find('.js-delete-message');
            this.buttonDeleteMessage.on('click', _.bind(this.deleteMessage, this));
        },

        getMessageParent: function(event, messages) {
            var template = this.renderTemplate('MessageView-Parent',{"items": messages.items});
            this.container.html(template);

            this.buttonAddMessage = this.container.find('.js-new-message');
            this.buttonAddMessage.on('click', _.bind(this.addFormMessage, this));

            this.buttonViewMessage = this.container.find('.js-view-message');
            this.buttonViewMessage.on('click', _.bind(this.viewFormMessage, this));

            this.buttonDeleteMessage = this.container.find('.js-delete-message');
            this.buttonDeleteMessage.on('click', _.bind(this.deleteMessage, this));
        },

        getNewMessageList: function(event, messages) {
            console.log(messages);
            this.countmessage.html(messages.items.length);
            var template = this.renderTemplate('NewMessageView-List', {"items": messages.items});
            this.messagelist.html(template);

            this.getButtonList = $('#js-all-message');
            this.getButtonList.on('click', _.bind(this.onClickMessageList, this));
        },

        showAddFormMessage: function(event, userslist) {
            var template = this.renderTemplate('MessageForm-New',{"items": userslist.items}),
                self = this;
            this.container.html(template);

            this.buttonCancelMessage = this.container.find('.js-show-message');
            this.buttonCancelMessage.on('click', _.bind(this.onClickMessageList, this));

            this.formNewMessage = this.container.find('#js-new-message-form');

            this.formNewMessage.validate({
                rules: {
                    message: {
                        required: true
                    }
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var message = new Message();
                    message['user_id_to'] = [];
                    $(form).find('input:checked').each(function(){
                        message['user_id_to'].push($(this).val());
                    });

                    $(form).find('textarea').each(function(){
                        var nameInput = $(this).attr('name');
                        message[nameInput] = $(this).val();
                    });
                    $(nzr).trigger('MessageFormView.saveNewMessage',message);
                }
            });

            this.buttonSaveMessage = this.container.find('.js-save-message');
            this.buttonSaveMessage.on('click',function(){
                console.log('click');
                self.formNewMessage.submit();
            });

        },

        addFormMessage: function() {
            $('#loader').show();
            $(nzr).trigger('MessageFormView.getUsersList');
        },

        viewFormMessage: function() {
            $('#loader').show();
            var messageId = $(event.target).data('idmesage');
            $(nzr).trigger('MessageFormView.viewMessage',messageId);
        },

        deleteMessage: function(event) {
            $('#loader').show();
            var messageId = $(event.target).data('idmesage');
            $(nzr).trigger('MessageFormView.deleteMessage',messageId);
        }

    });

    ns.MessageFormView = MessageFormView;

})(nzr.view);
