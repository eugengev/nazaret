function Firma(data) {
    this.id   = 0;
    this.name = '';
    this.autonomer = '';
    this.lastnomer = '';
    this.firstchar = '';
    this.okpo = '';
    this.tel = '';
    this.ras = '';
    this.bank = '';
    this.mfo = '';
    this.adress = 0;
    this.email = '';
    this.full_name = '';
    this.dir_role = '';
    this.dir_fio = '';
    this.buh_fio = '';
    this.adres_yur = 0;
    this.tel1 = '';
    this.svidot_nomer = '';
    this.svidot_date = '2001-01-01';
    this.svidot_organ = '';

    if (data) {
        this.init(data);
    }
};

Firma.prototype.init = function(data) {
    this.id           = data.id;
    this.name         = data.name;
    this.autonomer    = data.autonomer;
    this.lastnomer    = data.lastnomer;
    this.firstchar    = data.firstchar;
    this.okpo         = data.okpo;
    this.tel          = data.tel;
    this.ras          = data.ras;
    this.bank         = data.bank;
    this.mfo          = data.mfo;
    this.adress       = data.adress;
    this.email        = data.email;
    this.full_name    = data.full_name;
    this.dir_role     = data.dir_role;
    this.dir_fio      = data.dir_fio;
    this.buh_fio      = data.buh_fio;
    this.adres_yur    = data.adres_yur;
    this.tel1         = data.tel1;
    this.svidot_nomer = data.svidot_nomer;
    this.svidot_date  = data.svidot_date;
    this.svidot_organ = data.svidot_organ;

};

function FirmaList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

FirmaList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Firma(data[i]);
            this.items[i] = item;
        }
    }
};


function Adress(data) {
    this.id   = 0;
    this.zip = '';
    this.oblast = '';
    this.raion = '';
    this.t_pynkt = '';
    this.pynkt = '';
    this.t_street = '';
    this.street = '';
    this.dom = '';

    if (data) {
        this.init(data);
    }
};

Adress.prototype.init = function(data) {
    this.id       = data.id;
    this.zip      = data.zip;
    this.oblast   = data.oblast;
    this.raion    = data.raion;
    this.t_pynkt  = data.t_pynkt;
    this.pynkt    = data.pynkt;
    this.t_street = data.t_street;
    this.street   = data.street;
    this.dom      = data.dom;
};

function AdressList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

AdressList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Adress(data[i]);
            this.items[i] = item;
        }
    }
};


function Bank(data) {
    this.id   = 0;
    this.mfo = '';
    this.bank = '';
    this.ras = '';
    this.type = '';
    this.parent_id = 0;

    if (data) {
        this.init(data);
    }
};

Bank.prototype.init = function(data) {
    this.id        = data.id;
    this.mfo       = data.mfo;
    this.bank      = data.bank;
    this.ras       = data.ras;
    this.type      = data.type;
    this.parent_id = data.parent_id;
};

function BankList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

BankList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Bank(data[i]);
            this.items[i] = item;
        }
    }
};