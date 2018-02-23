function Client(data) {
    this.id   = 0;
    this.name = '';
    this.phone = '';
    this.email = '';
    this.inn = '';
    this.pasport = '';
    this.pravforma = '';
    this.dir_role = '';
    this.dir_fio = '';
    this.buh_fio = '';
    this.dover = '';
    this.adres1 = '';
    this.adres2 = '';
    this.phone1 = '';
    this.ras = '';
    this.mfo = '';
    this.bank = '';


    if (data) {
        this.init(data);
    }
};

Client.prototype.init = function(data) {
    this.id        = data.id;
    this.name      = data.name;
    this.phone     = data.phone;
    this.email     = data.email;
    this.inn       = data.inn;
    this.pasport   = data.pasport;
    this.pravforma = data.pravforma;
    this.dir_role  = data.dir_role;
    this.dir_fio   = data.dir_fio;
    this.buh_fio   = data.buh_fio;
    this.dover     = data.dover;
    this.adres1    = data.adres1;
    this.adres2    = data.adres2;
    this.phone1    = data.phone1;
    this.dir_role  = data.dir_role;
    this.ras       = data.ras;
    this.mfo       = data.mfo;
    this.bank      = data.bank;

};

function ClientList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

ClientList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Client(data[i]);
            this.items[i] = item;
        }
    }
};
