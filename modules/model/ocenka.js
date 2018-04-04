function Ocenka(data) {
    this.id   = 0;
    this.opis = '';
    this.nomber = '';
    this.datework = '';
    this.status = '';
    this.city = '';
    this.meta = '';
    this.bank = '';
    this.count = 0;
    this.mname = '';
    this.vid_id = '';
    this.rid = '';

    if (data) {
        this.init(data);
    }
};

Ocenka.prototype.init = function(data) {
    this.id       = data.id;
    this.opis     = data.opis;
    this.nomber   = data.nomber;
    this.datework = data.datework;
    this.status   = data.status;
    this.city     = data.city;
    this.vid_id   = data.vid_id;
    this.mname    = data.mname;
    this.meta     = data.meta;
    this.bank     = data.bank;
    this.count    = data.count;
    this.rid      = data.rid;
};


function OcenkaList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

OcenkaList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Ocenka(data[i]);
            this.items[i] = item;
        }
    }
};

function OcenkaInit(data) {
    this.name  = "";
    this.count = 0;

    if (data) {
        this.init(data);
    }
};

OcenkaInit.prototype.init = function(data) {
    this.name  = data.name;
    this.count = data.count;
};

function OcenkaInitList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

OcenkaInitList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new OcenkaInit(data[i]);
            this.items[i] = item;
        }
    }
};

