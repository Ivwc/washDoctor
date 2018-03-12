var myApp = '',
    api_url = "";
(function() {
    "use strict";
    // Initialize your app
    myApp = new Framework7({
        fastClicks: true,
        modalTitle: '衣博士',
        pushState: true,
        // swipeBackPage: false,
        // cache: false,
        init: false,
        //debug: true,
        smartSelectOpenIn: 'picker',
        animateNavBackIcon: true
    });

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        dynamicNavbar: true
    });

    myApp.onPageInit('index', function(page) {
        console.log('index');

    });

    // Callbacks to run specific code for specific pages, for example for About page:
    myApp.onPageInit('login', function(page) {
        console.log('login');

        $('.login-btn').on('click', function() {
            var token = $('input[name="_token"]').val();
            var account = $('input[name="account"]').val();
            var password = $('input[name="password"]').val();
            $$.post('loginmethods/login', {
                "_token": token,
                account: account,
                password: password
            }, function(data) {
                myApp.alert(data.msg, function() {
                    if (data.status == '200') {
                        location.href = "/washDoctor/login";
                    }
                });
            }, 'json');
        });

    });

    myApp.onPageInit('about', function(page) {
        console.log('about');
        myApp.alert('about');
    });

    myApp.onPageInit('personnel-add', function(page) {
        console.log('personnel-add');

        $('.add-personnel-submit').on('click', function() {
            console.log('click');
            var account = $('#account').val();
            var password = $('#password').val();
            var name = $('#name').val();
            var title = $('#title').val();
            var level = $('#level').val();
            var chk = chkform('personnel-form');
            var _token = $('input[name=_token]').val();
            var type = $('input[name=type]').val();
            var personnelId = $('input[name=personnelId]').val();
            var url = "";
            if (chk.status) {
                if (type == 'add') {
                    url = "personnel/add";
                } else if (type == "edit") {
                    url = "personnel/edit";
                }
                $$.post(url, {
                    id: personnelId,
                    account: account,
                    password: password,
                    name: name,
                    title: title,
                    level: level,
                    _token: _token
                }, function(data) {
                    console.log(data);
                    mainView.router.refreshPreviousPage();
                    myApp.alert(data.msg, function() {
                        if (data.status == '200') {
                            mainView.router.back();
                        }
                    });
                }, 'json');
            } else {
                myApp.alert(chk.error);
            }
        });
    });

    myApp.onPageInit('dynamic-pages', function(page) {
        console.log('dynamic-pages');
    });


    myApp.init();
})();