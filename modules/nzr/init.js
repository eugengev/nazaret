$(document).ready(function() {
    // Создаем модели
    var reestrForm = new Reestr();
    var reestrListForm = new ReestrList();

    var clientAuto = new Client();
    var clientListAuto = new ClientList();
    var settings = new Settings();

    var settingController = new nzr.controller.SettingsFormController(settings);

    // Создаем все главные вьюхи
    var reestrView = new nzr.view.ReestrFormView(reestrForm, clientListAuto);



    //  И теперь контроллеры!
    var reestrListController = new nzr.controller.ReestrFormController(reestrListForm, reestrForm);

    var mainoForm = new Maino();
    var mainoListForm = new MainoList();

    var sprPriceList = new SpravPriceList();

    // Создаем все главные вьюхи
    var mainoView = new nzr.view.MainoFormView(mainoForm, sprPriceList, mainoListForm);

    //  И теперь контроллеры!
    var mainoListController = new nzr.controller.MainoFormController(mainoListForm);

    var userForm = new User();
    var usersListForm = new UsersList();

    // Создаем все главные вьюхи
    var userView = new nzr.view.UserFormView(userForm, usersListForm);

    //  И теперь контроллеры!
    var userController = new nzr.controller.UserFormController(userForm, usersListForm);


    var podpisantForm = new Podpisant();
    var podpisantsListForm = new PodpisantsList();

    // Создаем все главные вьюхи
    var podpisantView = new nzr.view.PodpisantFormView(podpisantForm, podpisantsListForm);

    //  И теперь контроллеры!
    var podpisantController = new nzr.controller.PodpisantFormController(podpisantForm, podpisantsListForm);


    var firmaForm = new Firma();
    var firmaListForm = new FirmaList();
    var adressForm = new Adress();
    var adressListForm = new AdressList();
    // Создаем все главные вьюхи
    var firmaView = new nzr.view.FirmaFormView(firmaForm, firmaListForm);
    //  И теперь контроллеры!
    var firmaController = new nzr.controller.FirmaFormController(firmaForm, firmaListForm);

    var clientForm = new Client();
    var clientListForm = new ClientList();
    var clientView = new nzr.view.ClientFormView(clientForm, clientListForm);
    var clientController = new nzr.controller.ClientFormController(clientForm, clientListForm);

    var ocenkaForm = new Ocenka();
    var ocenkaListForm = new OcenkaList();
    var ocenkaInitForm = new OcenkaInit();
    var ocenkaInitListForm = new OcenkaInitList();
    // Создаем все главные вьюхи
    var ocenkaView = new nzr.view.OcenkaFormView(ocenkaForm, ocenkaListForm);
    //  И теперь контроллеры!
    var ocenkaController = new nzr.controller.OcenkaFormController(ocenkaForm, ocenkaListForm);


    var messageForm = new Message();
    var messagesListForm = new MessagesList();
    // Создаем все главные вьюхи
    var messageView = new nzr.view.MessageFormView(messageForm, messagesListForm);
    //  И теперь контроллеры!
    var messageController = new nzr.controller.MessageFormController(messageForm, messagesListForm);


    var spravochForm = new Spravoch();
    var spravochListForm = new SpravochList();
    var spravochView = new nzr.view.SpravochFormView(spravochForm, spravochListForm);
    var spravochController = new nzr.controller.SpravochFormController(spravochForm, spravochListForm);


    var ocencaautoView = new nzr.view.OcencaAutoFormView(ocenkaForm, ocenkaListForm);
    //  И теперь контроллеры!
    var ocencaautoController = new nzr.controller.OcencaAutoFormController(ocenkaForm, ocenkaListForm);



});