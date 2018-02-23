nzr.view = nzr.view || {};
(function(ns){

    function BaseView() { }

    _.extend(BaseView.prototype, {
        compileTemplates: function(templateMap) {
            this.templates = {};
            for(var name in templateMap) {
                if (!templateMap.hasOwnProperty(name)){
                    continue;
                }
                var selector = templateMap[name];
                this.templates[name] = nzr.core.compileTemplate($(selector));
            }
        },

        find: function(selector) {
            return this.element ? this.element.find(selector) : $();
        },

        pluralize: function() {
            return nzr.utils.pluralize.apply(null, arguments);
        },

        setElement: function(element) {
            this.element = element || $('.j-'+this.className) ;
        },

        _findTemplateElement: function(templateName) {
            var templateSelector = '#'+this.className+'-'+templateName;
            var templateElement = $(templateSelector);

            if (templateElement.length == 0) {
                templateSelector = /^#/.test(templateName) ? templateName : '#'+templateName;
                templateElement = $(templateSelector);
            }

            if (templateElement.length == 0) {
                throw new Error('Template for view '+this.className+' with name \''+templateName+'\' not found');
            }

            return templateElement;
        },

        _compileTemplate: function(templateName) {

            var templateElement = this._findTemplateElement(templateName);

            var compiled = templateElement.data('compiled');

            if (!compiled) {
                compiled = doT.template(templateElement.html());
                templateElement.data('compiled', compiled);
            }

            return compiled;
        },

        renderTemplate: function(templateName, data) {

            data = data || {};

            var compiled = this._compileTemplate(templateName);

            return compiled(data);
        }

    });

    ns.BaseView = BaseView;

})(nzr.view);
