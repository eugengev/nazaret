
function Settings(data) {
    if (data) {
        this.init(data);
    }
};

Settings.prototype.init = function(data) {
    this.name = data.name;
    this.id = data.id;
    this.subscribe = data.subscribe;
};


function PaymentList(data) {
    this.paymentSystem = 0;
    this.invoice = '';
    this.card = '';
    this.list =[];
    this.itemsCount = 0;

    if (data) {
        this.init(data);
    }
};

PaymentList.prototype.init = function(data) {
    this.paymentSystem = data.payment_system;
    this.invoice = data.subscribe_data.invoice;
    var card = data.subscribe_data.card;
    card = card.substring(0, 4) + ' ' + card.substring(4);
    card = card.replace('|', '** **** ');
    this.card = card;
    this.itemsCount = data.length;
    this.list =[];

    if (data.list.length) {
        for (var i = 0; i < data.list.length; i++){
            var item = new Settings(data.list[i]);
            this.list[i] = item;
        }
    }

};

PaymentList.prototype.getItemById = function(data) {
    for (var i = 0; i < this.list.length; i++){
        if (this.list[i].id == data) {
            var item = new Settings(this.list[i]);
        }
    }
    return item;
};
