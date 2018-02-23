function Spravoch(data) {
    this.id   = 0;
    this.name = '';

    if (data) {
        this.init(data);
    }
};

Spravoch.prototype.init = function(data) {
    this.id   = data.id;
    this.name = data.name;
};

function SpravochList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

SpravochList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++){
            var item = new Spravoch(data[i]);
            this.items[i] = item;
        }
    }
};
