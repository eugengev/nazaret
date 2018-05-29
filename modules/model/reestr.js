function Reestr(data) {
    this.id   = 0;
    this.nomber = '';
    this.date = '2010-01-01';
    this.datework = '2010-01-01';
    this.cifr_nomer = 0;
    this.old_nomber = '';
    this.client = 0;
    this.firma = '';
    this.city = 0;
    this.meta = 0;
    this.bank = 0;
    this.manager = 0;
    this.nomer_act  = '';
    this.date_act   = '';
    this.countpage = 0;
    this.vidygodi = 0;
    this.nomerygodi = '';
    this.dateygodi = '2010-01-01';

    if (data) {
        this.init(data);
    }
};

Reestr.prototype.init = function(data) {
    this.id         = data.id;
    this.nomber     = data.nomber;
    this.date       = data.date;
    this.datework   = data.datework;
    this.old_nomber = data.old_nomber;
    this.cifr_nomer = data.cifr_nomer;
    this.client     = data.client;
    this.firma      = data.firma;
    this.city       = data.city;
    this.meta       = data.meta;
    this.bank       = data.bank;
    this.manager    = data.manager;
    this.nomer_act  = data.nomer_act;
    this.date_act   = data.date_act;
    this.countpage  = data.countpage;
    this.vidygodi  = data.vidygodi;
    this.nomerygodi  = data.nomerygodi;
    this.dateygodi  = data.dateygodi;
};

function ReestrList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

ReestrList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Reestr(data[i]);
            this.items[i] = item;
        }
    }
};

function Client(data) {
    this.id   = 0;
    this.name = '';

    if (data) {
        this.init(data);
    }
};

Client.prototype.init = function(data) {
    this.id   = data.id;
    this.name = data.name;
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

function Firma(data) {
    this.id   = 0;
    this.name = '';
    this.autonomer = '';
    this.lastnomer = '';
    this.firstchar = '';

    if (data) {
        this.init(data);
    }
};

Firma.prototype.init = function(data) {
    this.id   = data.id;
    this.name = data.name;
    this.autonomer = data.autonomer;
    this.lastnomer = data.lastnomer;
    this.firstchar = data.firstchar;
};
