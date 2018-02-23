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
    this.adress = '';
    this.email = '';
    this.full_name = '';
    this.dir_role = '';
    this.dir_fio = '';
    this.buh_fio = '';
    this.adres_yur = '';
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
