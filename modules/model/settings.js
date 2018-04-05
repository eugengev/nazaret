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

