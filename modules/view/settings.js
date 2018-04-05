nzr.view = nzr.view || {};
(function(ns){

    function SettingsView(model) {
        this.className = "SettingsView";
        this.model = model || null;
        this.init();
    }
    _.extend(SettingsView.prototype, nzr.view.BaseView.prototype);
    _.extend(SettingsView.prototype, {

        init: function() {
            this.setElement();

        },

        listOrg: function () {
            
        }

    });

    ns.SettingsView = SettingsView;

})(nzr.view);
