function Client(data) {
    this.id   = 0;
    this.type = '';
    this.name = '';
    this.phone = '';
    this.email = '';
    this.inn = '';
    this.pasport = '';
    this.pasp_nom = '';
    this.pasp_ser = '';
    this.pasp_data = '';
    this.pasp_vidan = '';
    this.svid_date = '';
    this.svid_nomer = '';
    this.dir_role = '';
    this.dir_fio = '';
    this.buh_fio = '';
    this.dover = '';
    this.osoba_fio = '';
    this.osoba_email = '';
    this.osoba_telefon = '';
    this.osoba_posada = '';
    this.adres1 = '';
    this.adres2 = '';
    this.phone1 = '';
    this.ras = '';
    this.mfo = '';
    this.bank = '';
    this.buh_email   = '';
    this.buh_phone   = '';
    this.buh_phone1  = '';

    this.delivertype = '';


    if (data) {
        this.init(data);
    }
};

Client.prototype.init = function(data) {
    this.id        = data.id;
    this.type      = data.type;
    this.name      = data.name;
    this.phone     = data.phone;
    this.email     = data.email;
    this.inn       = data.inn;
    this.pasport   = data.pasport;
    this.pasp_nom     = data.pasp_nom;
    this.pasp_ser     = data.pasp_ser;
    this.pasp_data    = data.pasp_data;
    this.pasp_vidan   = data.pasp_vidan;
    this.svid_date    = data.svid_date;
    this.svid_nomer   = data.svid_nomer;
    this.pravforma    = data.pravforma;
    this.dir_role     = data.dir_role;
    this.dir_fio      = data.dir_fio;
    this.buh_fio      = data.buh_fio;
    this.dover         = data.dover;
    this.osoba_fio     = data.osoba_fio;
    this.osoba_email   = data.osoba_email;
    this.osoba_telefon = data.osoba_telefon;
    this.osoba_posada  = data.osoba_posada;
    this.adres1      = data.adres1;
    this.adres2      = data.adres2;
    this.phone1      = data.phone1;
    this.dir_role    = data.dir_role;
    this.ras         = data.ras;
    this.mfo         = data.mfo;
    this.bank        = data.bank;
    this.buh_email   = data.buh_email;
    this.buh_phone   = data.buh_phone;
    this.buh_phone1  = data.buh_phone1;
    this.delivertype = data.delivertype;

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
