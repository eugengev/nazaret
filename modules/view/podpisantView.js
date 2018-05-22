nzr.view = nzr.view || {};
(function(ns){

    function PodpisantFormView(PodpisantModel, PodpisantsModel) {
        /** @type КууіекList */
        this.className = "PodpisantFormView";
        this.podpisant = PodpisantModel || null;
        this.podpisants = PodpisantsModel || null;
        this.init();
    }
    _.extend(PodpisantFormView.prototype, nzr.view.BaseView.prototype);
    _.extend(PodpisantFormView.prototype, {


        init: function() {
            this.setElement();
            this.formFirst = null;
            this.container = $('#content');
            this.podpisantfio = $('#podpisantfio');
            this.getButtonList = $('#js-podpisant-list');
            this.buttonAddPodpisant = null;
            this.autoNomDog = null;
            this.formAddPodpisant = null;

            // this.menuOrganiz.on('click', _.bind(this.onClickMenu, this));
            this.getButtonList.on('click', _.bind(this.onClickPodpisantsList, this));
            $(nzr).on('PodpisantFormController.getPodpisantInfoInit', _.bind(this.getPodpisantInfoInit, this));
            $(nzr).on('PodpisantFormController.getPodpisantList', _.bind(this.getPodpisantList, this));

        },

        getPodpisantInfoInit: function(event, podpisant) {
            this.podpisant = podpisant;
            console.log(this.podpisant);
            this.podpisantfio.text(this.podpisant.fio);
        },

        onClickPodpisantsList: function(event) {
            $('#loader').show();
            $(nzr).trigger('PodpisantFormView.getPodpisantList');
        },

        getPodpisantList: function(event, podpisants){
            this.podpisants = podpisants;
            console.log(podpisants);
            var template = this.renderTemplate('PodpisantsView-List',{"items": podpisants.items});
            this.container.html(template);

            this.buttonAddPodpisant = this.container.find('.js-add-podpisant');
            this.buttonAddPodpisant.on('click', _.bind(this.addFormPodpisant, this));

            this.buttonDeletePodpisant = this.container.find('.js-delete-podpisant');
            this.buttonDeletePodpisant.on('click', _.bind(this.onClickDeletePodpisants, this));
        },

        addFormPodpisant: function() {
            var template = this.renderTemplate('PodpisantsViewForm-Add'),
                self = this;
            this.container.html(template);

            this.buttonAddPodpisant = this.container.find('.js-save-podpisant-cancel');
            this.buttonAddPodpisant.on('click', _.bind(this.onClickPodpisantsList, this));

            this.formAddPodpisant = this.container.find('#js-add-podpisant-form');

            this.buttonPodpisantSaveForm = this.container.find('.js-save-podpisant-form');
            this.buttonPodpisantSaveForm.click(function(){
                self.formAddPodpisant.submit();
            });

            this.formAddPodpisant.validate({
                rules: {
                    fio: {
                        required: true
                    },
                    login: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    repassword: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    mail_podpisant: {
                        required: true,
                        email: true
                    }
                },
                submitHandler: function(form) {
                    $('#loader').show();
                    var podpisant = new Podpisant();
                    $(form).find('input,select').each(function(){
                        var nameInput = $(this).attr('name');
                        podpisant[nameInput] = $(this).val();
                    });
                    $(nzr).trigger('PodpisantFormView.savePodpisantForm',podpisant);
                }
            });

        },

        onClickDeletePodpisants: function(event) {
            var podpisantId = $(event.target).data('idpodpisant');
            $(nzr).trigger('PodpisantFormView.deletePodpisantInfo',podpisantId);
        },

    });

    ns.PodpisantFormView = PodpisantFormView;

})(nzr.view);
