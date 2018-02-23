nzr.view = nzr.view || {};
(function(ns){

    function UserFormView(UserModel, UsersModel) {
        /** @type КууіекList */
        this.className = "UserFormView";
        this.user = UserModel || null;
        this.users = UsersModel || null;
        this.init();
    }
    _.extend(UserFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(UserFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.userfio = $('#userfio');
            this.getButtonList = $('#js-user-list');
            this.buttonAddUser = null;
            this.autoNomDog = null;
            this.formAddUser = null;

            // this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            this.getButtonList.on('click', _.bind(this.onClickUsersList, this));
            $(nzr).on('UserFormController.getUserInfoInit', _.bind(this.getUserInfoInit, this));
            $(nzr).on('UserFormController.getUserList', _.bind(this.getUserList, this));

        },

        getUserInfoInit: function(event, user) {
            this.user = user;
            console.log(this.user);
            this.userfio.text(this.user.fio);
        },

        onClickUsersList: function(event) {
            $('#loader').show();
            $(nzr).trigger('UserFormView.getUserList');
        },

        getUserList: function(event, users){
            this.users = users;
            console.log(users);
            var template = this.renderTemplate('UsersView-List',{"items": users.items});
            this.container.html(template);

            this.buttonAddUser = this.container.find('.js-add-user');
            this.buttonAddUser.on('click', _.bind(this.addFormUser, this));

            this.buttonDeleteUser = this.container.find('.js-delete-user');
            this.buttonDeleteUser.on('click', _.bind(this.onClickDeleteUsers, this));
        },

        addFormUser: function() {
            var template = this.renderTemplate('UsersViewForm-Add'),
                self = this;
            this.container.html(template);

            this.buttonAddUser = this.container.find('.js-save-user-cancel');
            this.buttonAddUser.on('click', _.bind(this.onClickUsersList, this));

            this.formAddUser = this.container.find('#js-add-user-form');

            this.buttonUserSaveForm = this.container.find('.js-save-user-form');
            this.buttonUserSaveForm.click(function(){
                self.formAddUser.submit();
            });

            this.formAddUser.validate({
                rules: {
                    fio: {
                        required: true
                    },
                    login: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    repassword: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    mail_user: {
                        required: true,
                        email: true
                    }
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var user = new User();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        user[nameInput] = $(this).val();
                    });
                    $(nzr).trigger('UserFormView.saveUserForm',user);
                }
            });

        },

        onClickDeleteUsers: function(event) {
            var userId = $(event.target).data('iduser');
            $(nzr).trigger('UserFormView.deleteUserInfo',userId);
        },

    });

    ns.UserFormView = UserFormView;

})(nzr.view);
