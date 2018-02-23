window.nzr = window.nzr || {};
nzr = nzr || {};
nzr.core = nzr.core || {};
(function(ns){
    var Core = {
        ns: function(namespace) {
            var subspaces = namespace.split('.');
            var global = (function(){return this}());
            var prevSubspace = global;
            for (var i = 0; i < subspaces.length; i++) {
                var subspaceName = subspaces[i];
                if (typeof prevSubspace[subspaceName] === 'undefined') {
                    prevSubspace[subspaceName] = {};
                }
                prevSubspace = prevSubspace[subspaceName];
            }
            return prevSubspace;
        },

        compileTemplate: function (selector) {
            return doT.template($(selector).html());
        }
    };

    ns = Core;
})(nzr.core);