function Maino(data) {
    this.id   = 0;
    this.reestr_id = 0;
    this.vid_id = 0;
    this.opis = '';
    this.count = 0;
    this.price = 0;
    this.vartist = 0;
    this.vikon = 0;

    if (data) {
        this.init(data);
    }
};

Maino.prototype.init = function(data) {
    this.id         = data.id;
    this.reestr_id  = data.reestr_id;
    this.vid_id     = data.vid_id;
    this.opis       = data.opis;
    this.count      = data.count;
    this.price      = data.price;
    this.vartist    = data.vartist;
    this.vikon      = data.vikon;
};


function MainoList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

MainoList.prototype.init = function(data) {
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Maino(data[i]);
            this.items[i] = item;
        }
    }
};

function Sprav(data) {
    this.id   = 0;
    this.name = 0;

    if (data) {
        this.init(data);
    }
};

Sprav.prototype.init = function(data) {
    this.id   = data.id;
    this.name = data.name;
};

function SpravList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

SpravList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Sprav(data[i]);
            this.items[i] = item;
        }
    }
};

function SpravPrice(data) {
    this.id   = 0;
    this.name = '';
    this.price = 0;

    if (data) {
        this.init(data);
    }
};

SpravPrice.prototype.init = function(data) {
    this.id    = data.id;
    this.name  = data.name;
    this.price = data.price;
};

function SpravPriceList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

SpravPriceList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new SpravPrice(data[i]);
            this.items[i] = item;
        }
    }
};