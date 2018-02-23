function User(data) {
    this.id   = 0;
    this.login = '';
    this.mail_user = '';
    this.role = '';
    this.password = '';
    this.repassword = '';
    this.fio = '';

    if (data) {
        this.init(data);
    }
};

User.prototype.init = function(data) {
    this.id        = data.id;
    this.login     = data.login;
    this.mail_user = data.mail_user;
    this.role      = data.role;
    this.password  = data.password;
    this.repassword= data.repassword;
    this.fio       = data.fio;

};

function UsersList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

UsersList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new User(data[i]);
            this.items[i] = item;
        }
    }
};
