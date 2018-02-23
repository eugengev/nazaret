function Message(data) {
    this.id   = 0;
    this.user_id_from = 0;
    this.user_id_to = 0;
    this.message = '';
    this.parent_id = 0;
    this.status = 0;
    this.date = '2001-01-01';
    this.time = '00:00:--';
    this.fromname = '';
    this.toname = '';
    this.dayago = '';

    if (data) {
        this.init(data);
    }
};

Message.prototype.init = function(data) {
    this.id           = data.id;
    this.user_id_from = data.user_id_from;
    this.user_id_to   = data.user_id_to;
    this.message      = data.message;
    this.parent_id    = data.parent_id;
    this.status       = data.status;
    this.date         = data.date;
    this.time         = data.time;
    this.fromname     = data.fromname;
    this.toname       = data.toname;
    this.dayago       = data.dayago;
};

function MessagesList(data) {
    this.items = [];
    if (data) {
        this.init(data);
    }
};

MessagesList.prototype.init = function(data) {
    this.items = [];
    if (data.length) {
        for (var i = 0; i < data.length; i++) {
            var item = new Message(data[i]);
            this.items[i] = item;
        }
    }
};