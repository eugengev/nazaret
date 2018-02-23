nzr.controller = nzr.controller || {};
(function(ns){
    function MessageFormController(UserModel, UsersModel) {
        /** @type OrganizList */
        this.message = UserModel || null;
        this.messages = UserModel || null;
        this.init();
    }
    _.extend(MessageFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _getUserListApi: '/api/getuserlist.php',
        _getMessagesApi: '/api/get_messages.php',
        _getNewMessagesApi: '/api/get_new_messages.php',
        _getViewMessagesApi: '/api/get_view_messages.php',
        _deleteMessageApi: '/api/delete_messages.php',
        _saveNewMessagesApi: '/api/save_new_messag.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            setTimeout(_.bind(this.getNewMessageList, this), 0);
            $(nzr).on('MessageFormView.getMessageList',  _.bind(this.getMessageList, this));
            $(nzr).on('MessageFormView.getUsersList',  _.bind(this.getUserList, this));
            $(nzr).on('MessageFormView.saveNewMessage',  _.bind(this.saveNewMessage, this));
            $(nzr).on('MessageFormView.deleteMessage',  _.bind(this.deleteMessage, this));
            $(nzr).on('MessageFormView.viewMessage',  _.bind(this.viewMessage, this));
        },

        viewMessage: function(event, messageId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {messageid: messageId},
                url: this._getViewMessagesApi,
                success: function(data){
                    self._requestViewMessageSuccess(data);
                },
                error: _.bind(this._requestViewMessageError, this),
                complete: _.bind(this._requestViewMessageComplete, this)
            });
        },
        _requestViewMessageSuccess: function (data) {
            var messages = new MessagesList(data);
            $(nzr).trigger('MessageFormController.getMessageParent', messages);
        },
        _requestViewMessageError: function (data) {
            console.log(data);
            console.log('_requestViewMessageError');
        },
        _requestViewMessageComplete: function () {
            console.log('_requestViewMessageComplete');
            $('#loader').hide();
        },


        getNewMessageList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getNewMessagesApi,
                success: function(data){
                    self._requestgetNewMessageListSuccess(data);
                },
                error: _.bind(this._requestgetNewMessageListError, this),
                complete: _.bind(this._requestgetNewMessageListComplete, this)
            });
        },
        _requestgetNewMessageListSuccess: function (data) {
            var messages = new MessagesList(data);
            console.log('_requestgetUserInfoSuccess');
            $(nzr).trigger('MessageFormController.getNewMessageList', messages);
        },
        _requestgetNewMessageListError: function (data) {
            console.log(data);
            console.log('_requestgetMessageListError');
        },
        _requestgetNewMessageListComplete: function (data) {
            $('#loader').hide();
        },


        deleteMessage: function(event, messageId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {messageid: messageId},
                url: this._deleteMessageApi,
                success: function(data){
                    self._requestDeleteMessageSuccess(data);
                },
                error: _.bind(this._requestDeleteMessageError, this),
                complete: _.bind(this._requestDeleteMessageComplete, this)
            });
        },
        _requestDeleteMessageSuccess: function (data) {
            var messages = new MessagesList(data);
            $(nzr).trigger('MessageFormController.getMessageList', messages);
        },
        _requestDeleteMessageError: function (data) {
            console.log(data);
            console.log('_requestDeleteMessageError');
        },
        _requestDeleteMessageComplete: function (data) {
            console.log('_requestDeleteMessageComplete');
            $('#loader').hide();
        },


        saveNewMessage: function(event, messageInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.message = messageInfo;


            var dataMessage = {
                staus:      'addmessage',
                user_id_to: this.message.user_id_to,
                message:    this.message.message,
            };

            console.log(dataMessage);

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataMessage,
                url: this._saveNewMessagesApi,
                success: function(data){
                    self._requestSaveNewMessageSuccess(data);
                },
                error: _.bind(this._requestSaveNewMessageError, this),
                complete: _.bind(this._requestSaveNewMessageComplete, this)
            });
        },
        _requestSaveNewMessageSuccess: function (data) {
            var messages = new MessagesList(data);
            console.log('_requestgetUserInfoSuccess');
            $(nzr).trigger('MessageFormController.getMessageList', messages);

        },
        _requestSaveNewMessageError: function (data) {
            console.log(data);
            console.log('_requestgetUserInfoError');
        },
        _requestSaveNewMessageComplete: function (data) {
            $('#loader').hide();
        },


        getMessageList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getMessagesApi,
                success: function(data){
                    self._requestgetMessageListSuccess(data);
                },
                error: _.bind(this._requestgetMessageListError, this),
                complete: _.bind(this._requestgetMessageListComplete, this)
            });
        },
        _requestgetMessageListSuccess: function (data) {
            var messages = new MessagesList(data);
            console.log('_requestgetUserInfoSuccess');
            $(nzr).trigger('MessageFormController.getMessageList', messages);
        },
        _requestgetMessageListError: function (data) {
            console.log(data);
            console.log('_requestgetMessageListError');
        },
        _requestgetMessageListComplete: function (data) {
            $('#loader').hide();
        },

        getUserList: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getUserListApi,
                success: function(data){
                    self._requestgetUserListSuccess(data);
                },
                error: _.bind(this._requestgetUserListError, this),
                complete: _.bind(this._requestgetUserListComplete, this)
            });
        },
        _requestgetUserListSuccess: function (data) {
            var usersList = new UsersList(data);
            $(nzr).trigger('MessageFormController.showAddFormMessage', usersList);
        },
        _requestgetUserListError: function (data) {
            console.log(data);
            console.log('_requestgetUserListError');
        },
        _requestgetUserListComplete: function (data) {
            console.log('_requestgetUserListComplete');
            $('#loader').hide();
        },


    });

    ns.MessageFormController = MessageFormController;

})(nzr.controller);
