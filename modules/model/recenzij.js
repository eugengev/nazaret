function RecenzijItem(data) {
    this.id          = 0;
    this.maino_id    = 0;
    this.reestr_id   = '';
    this.nazva       = '';
    this.zamov       = '';
    this.obekt       = '';
    this.vikonav     = '';
    this.ocenchiki   = 0;
    this.pidstava    = 0;
    this.meta        = 0;
    this.vid         = '';
    this.data_ocenka = '';
    this.pidhodi     = '';
    this.vartist     = '';
    this.pidstavaoc  = '';
    this.visnov1     = '';
    this.visnov2     = '';
    this.visnov3     = '';
    this.visnov3_list     = '';
    this.visnov4     = '';
    this.visnov4_list     = '';
    this.obekt_list  = '';
    this.ocenchiki_list  = '';
    this.vartist_list  = '';
    this.data_oforml  = '';
    this.rezenzetami  = '';
    this.rezenzetami_list  = '';
    this.opisobekt  = '';
    this.opisobekt_list  = '';
    this.opisobekt2  = '';
    this.docum  = '';
    this.docum_list  = '';
    this.vizual  = '';
    this.factori  = '';
    this.jakist  = '';
    this.visnov  = '';
    this.obgruntuv  = '';
    this.obgrunt  = '';
    this.vikoroce  = '';
    this.vikoroce_list  = '';
    this.opis  = '';

    if (data) {
        this.init(data);
    }
};

RecenzijItem.prototype.init = function(data) {
    this.id          = data.id;
    this.maino_id    = data.maino_id;
    this.reestr_id   = data.reestr_id;
    this.nazva       = data.nazva;
    this.zamov       = data.zamov;
    this.obekt       = data.obekt;
    this.vikonav     = data.vikonav;
    this.ocenchiki   = data.ocenchiki;
    this.pidstava    = data.pidstava;
    this.meta        = data.meta;
    this.vid         = data.vid;
    this.data_ocenka = data.data_ocenka;
    this.pidhodi     = data.pidhodi;
    this.vartist     = data.vartist;
    this.pidstavaoc  = data.pidstavaoc;
    this.visnov1     = data.visnov1;
    this.visnov2     = data.visnov2;
    this.visnov3     = data.visnov3;
    this.visnov3_list = data.visnov3_list;
    this.visnov4      = data.visnov4;
    this.visnov4_list = data.visnov4_list;
    this.obekt_list   = data.obekt_list;
    this.ocenchiki_list  = data.ocenchiki_list;
    this.vartist_list = data.vartist_list;
    this.data_oforml  = data.data_oforml;
    this.rezenzetami  = data.rezenzetami;
    this.rezenzetami_list  = data.rezenzetami_list;
    this.opisobekt    = data.opisobekt;
    this.opisobekt_list  = data.opisobekt_list;
    this.opisobekt2   = data.opisobekt2;
    this.docum        = data.docum;
    this.docum_list   = data.docum_list;
    this.vizual       = data.vizual;
    this.factori      = data.factori;
    this.jakist       = data.jakist;
    this.obgruntuv    = data.obgruntuv;
    this.visnov       = data.visnov;
    this.obgrunt      = data.obgrunt;
    this.vikoroce     = data.vikoroce;
    this.vikoroce_list  = data.vikoroce_list;
    this.opis     = data.opis;

};

function Recenzij(data) {
    this.id   = 0;
    this.rid  = 0;
    this.reestr = new Reestr();
    this.ocenca = new Ocenka();
    this.items = new OcencaAutoItems();

    if (data) {
        this.init(data);
    }
};

Recenzij.prototype.init = function(data) {
    this.reestr = new Reestr(data.reestr);
    this.ocenca = new Ocenka(data.ocenca);
    this.items  = new RecenzijItem(data.items);
};