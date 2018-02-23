nzr.controller = nzr.controller || {};
(function(ns){
    function UserFormController(UserModel, UsersModel) {
        /** @type OrganizList */
        this.user = UserModel || null;
        this.users = UserModel || null;
        this.init();
    }
    _.extend(UserFormController.prototype, {
        _ajaxRequest: null,
        _ajaxSprRequest: null,
        _ajaxUpdate: null,
        _ajaxAddNew: null,
        _ajaxEditSave: null,
        _ajaxDelete: null,
        _getUserInfoApi: '/api/getuser.php',
        _getUserListApi: '/api/getuserlist.php',
        _saveUserApi: '/api/saveuserinfo.php',
        _deleteUserApi: '/api/deleteuserinfo.php',

        init: function() {
            var self = this;

            // Запрашиваем заказы при инициализации!
            setTimeout(_.bind(this.getUserInfo, this), 0);
            $(nzr).on('UserFormView.getUserList',  _.bind(this.getUserList, this));
            $(nzr).on('UserFormView.saveUserForm',  _.bind(this.saveUserInfo, this));
            $(nzr).on('UserFormView.deleteUserInfo',  _.bind(this.deleteUserInfo, this));
        },

        getUserInfo: function(){
            if (this._ajaxRequest) {
                this._ajaxRequest.abort();
                this._ajaxRequest = null;
            }

            var self = this;
            this._ajaxRequest = $.ajax({
                url: this._getUserInfoApi,
                success: function(data){
                    self._requestgetUserInfoSuccess(data);
                },
                error: _.bind(this._requestgetUserInfoError, this),
                complete: _.bind(this._requestgetUserInfoComplete, this)
            });
        },
        _requestgetUserInfoSuccess: function (data) {
            this.user = data;
            console.log('_requestgetUserInfoSuccess');
            $(nzr).trigger('UserFormController.getUserInfoInit', this.user);
        },
        _requestgetUserInfoError: function (data) {
            console.log(data);
            console.log('_requestgetUserInfoError');
        },
        _requestgetUserInfoComplete: function (data) {
            console.log('_requestgetUserInfoComplete');
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
            $(nzr).trigger('UserFormController.getUserList', usersList);
        },
        _requestgetUserListError: function (data) {
            console.log(data);
            console.log('_requestgetUserListError');
        },
        _requestgetUserListComplete: function (data) {
            console.log('_requestgetUserListComplete');
            $('#loader').hide();
        },

        saveUserInfo: function(event, userInfo){
            if (this._ajaxAddNew) {
                this._ajaxAddNew.abort();
                this._ajaxAddNew = null;
            }

            this.user = userInfo;

            console.log(userInfo);
            console.log(this.user);

            var dataUser = {
                staus:       'adduser',
                login_user:  this.user.login,
                passwd_user: this.user.password,
                passwd_re:   this.user.repassword,
                mail_user:   this.user.mail_user,
                role:        this.user.role,
                fio:         this.user.fio
            };

            console.log(dataUser);

            var self = this;
            this._ajaxAddNew = $.ajax({
                type: "POST",
                data: dataUser,
                url: this._saveUserApi,
                success: function(data){
                    self._requestSaveUserInfoSuccess(data);
                },
                error: _.bind(this._requestSaveUserInfoError, this),
                complete: _.bind(this._requestSaveUserInfoComplete, this)
            });
        },
        _requestSaveUserInfoSuccess: function (data) {
            var usersList = new UsersList(data);
            $(nzr).trigger('UserFormController.getUserList', usersList);
        },
        _requestSaveUserInfoError: function (data) {
            console.log(data);
            console.log('_requestgetUserInfoError');
        },
        _requestSaveUserInfoComplete: function (data) {
            console.log('_requestgetUserInfoComplete');
            $('#loader').hide();
        },

        deleteUserInfo: function(event, userId){
            if (this._ajaxDelete) {
                this._ajaxDelete.abort();
                this._ajaxDelete = null;
            }

            var self = this;
            this._ajaxDelete = $.ajax({
                type: "POST",
                data: {userid: userId},
                url: this._deleteUserApi,
                success: function(data){
                    self._requestDeleteUserInfoSuccess(data);
                },
                error: _.bind(this._requestDeleteUserInfoError, this),
                complete: _.bind(this._requestDeleteUserInfoComplete, this)
            });
        },
        _requestDeleteUserInfoSuccess: function (data) {
            var usersList = new UsersList(data);
            $(nzr).trigger('UserFormController.getUserList', usersList);
        },
        _requestDeleteUserInfoError: function (data) {
            console.log(data);
            console.log('_requestgetUserInfoError');
        },
        _requestDeleteUserInfoComplete: function (data) {
            console.log('_requestgetUserInfoComplete');
            $('#loader').hide();
        },


    });

    ns.UserFormController = UserFormController;

})(nzr.controller);
