function OcencaAutoItem(data) {
    this.id                 = 0;
    this.maino_id           = 0;
    this.name               = '';
    this.model              = '';
    this.marka              = '';
    this.year               = '1901';
    this.vin                = '';
    this.sale_price         = '';
    this.proiz              = '';
    this.dizelbenzinelectro = '';
    this.obem               = '';
    this.datesvidet         = '';
    this.datektsproiz       = '';
    this.fullyear           = '';
    this.fullmonth          = '';
    this.reg_nom_tran       = '';
    this.reg_nom_tran_val   = '';
    this.svid_reg_tran      = '';
    this.svid_reg_tran_val  = '';
    this.vin_nom_kyz        = '';
    this.vin_nom_kyz_val    = '';
    this.nom_dvig           = '';
    this.nom_shasi          = '';
    this.nom_rami           = '';
    this.color              = '';
    this.vladel_kts         = '';
    this.vladel_adres       = '';
    this.vlad_tot           = '';
    this.kts                = '';
    this.kyzov              = '';

    if (data) {
        this.init(data);
    }
};

OcencaAutoItem.prototype.init = function(data) {
    this.id                 = data.id;
    this.maino_id           = data.maino_id;
    this.name               = data.name;
    this.model              = data.model;
    this.marka              = data.marka;
    this.year               = data.year;
    this.vin                = data.vin;
    this.sale_price         = data.sale_price;
    this.proiz              = data.proiz;
    this.dizelbenzinelectro = data.dizelbenzinelectro;
    this.obem               = data.obem;
    this.datesvidet         = data.datesvidet;
    this.datektsproiz       = data.datektsproiz;
    this.fullyear           = data.fullyear;
    this.fullmonth          = data.fullmonth;
    this.reg_nom_tran       = data.reg_nom_tran;
    this.reg_nom_tran_val   = data.reg_nom_tran_val;
    this.svid_reg_tran      = data.svid_reg_tran;
    this.svid_reg_tran_val  = data.svid_reg_tran_val ;
    this.vin_nom_kyz        = data.vin_nom_kyz;
    this.vin_nom_kyz_val    = data.vin_nom_kyz_val;
    this.nom_dvig           = data.nom_dvig;
    this.nom_shasi          = data.nom_shasi;
    this.nom_rami           = data.nom_rami;
    this.color              = data.color;
    this.vladel_kts         = data.vladel_kts;
    this.vladel_adres       = data.vladel_adres;
    this.vlad_tot           = data.vlad_tot;
    this.kts                = data.kts;
    this.kyzov              = data.kyzov;
};


function OcencaAutoAnalog(data) {
    this.id               = 0;
    this.ocenca_auto_id   = 0;
    this.url              = '';
    this.link_pic         = '';
    this.name             = '';
    this.year             = '1901';
    this.curency          = '';
    this.price            = '';
    this.price_bez        = '';
    this.pdv              = '0';
    this.kor_torg         = '';
    this.kor_year         = '';
    this.kor_tech         = '';
    this.kor_model        = '';
    this.vartis           = '';
    this.avgsum           = 0;


    if (data) {
        this.init(data);
    }
}

OcencaAutoAnalog.prototype.init = function(data) {
    this.id               = data.id;
    this.ocenca_auto_id   = data.ocenca_auto_id;
    this.url              = data.url;
    this.link_pic         = data.link_pic;
    this.name             = data.name;
    this.year             = data.year;
    this.curency          = data.curency;
    this.price            = data.price;
    this.price_bez        = data.price_bez;
    this.pdv              = data.pdv;
    this.kor_torg         = data.kor_torg;
    this.kor_year         = data.kor_year;
    this.kor_tech         = data.kor_tech;
    this.kor_model        = data.kor_model;
    this.vartis           = data.vartis;
    this.avgsum           = data.avgsum;
}


function OcencaAutoAnalogList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

OcencaAutoAnalogList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new OcencaAutoAnalog(data[i]);
            this.items[i] = item;
        }
    }
};


function OcencaAutoItems(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

OcencaAutoItems.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new OcencaAutoItem(data[i]);
            this.items[i] = item;
        }
    }
};

function OcencaAuto(data) {
    this.id   = 0;
    this.rid  = 0;
    this.reestr = new Reestr();
    this.ocenca = new Ocenka();
    this.items = new OcencaAutoItems();

    if (data) {
        this.init(data);
    }
};

OcencaAuto.prototype.init = function(data) {
    this.reestr = new Reestr(data.reestr);
    this.ocenca = new Ocenka(data.ocenca);
    this.items  = new OcencaAutoItems(data.items);
};
