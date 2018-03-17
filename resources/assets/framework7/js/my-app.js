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
        $('.todo-item').on('change', function() {
            var _this = $(this);
            var id = $(this).attr('data-id');
            var take = "";
            if ($(this).prop('checked')) {
                take = "take";
            } else {
                take = "untake";
            }
            $$.post('todo/chk_todo_item', {
                id: id,
                take: take,
                _token: $('input[name="_token"]').val()
            }, function(data) {
                console.log(data.status);
                if (data.status == "200") {
                    if (take == "take") {
                        _this.closest('div').find('.taker-name').html(" (" + data.msg + ")");
                    } else {
                        _this.closest('div').find('.taker-name').html(" ");
                        console.log(_this.closest('div').find('.taker-name'));
                    }
                } else {
                    myApp.alert(data.msg);
                }
            }, 'json');
        });

        $('.remove_todo').on('click', function() {
            var _this = $(this);
            var id = $(this).closest('.card-footer').attr('data-id');
            $$.post('todo/remove', {
                id: id,
                _token: $('input[name=_token]').val()
            }, function(data) {
                if (data.status == "200") {
                    _this.closest('.card').fadeOut();
                } else {
                    myApp.alert(data.msg);
                }
            }, 'json');
        });

        $('.done_todo').on('click', function() {
            var _this = $(this);
            var id = $(this).closest('.card-footer').attr('data-id');
            $$.post('todo/done', {
                id: id,
                _token: $('input[name=_token]').val()
            }, function(data) {
                if (data.status == "200") {
                    _this.closest('.card').fadeOut();
                } else {
                    myApp.alert(data.msg);
                }
            }, 'json');
        });

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
                        location.href = "/washDoctor";
                    }
                });
            }, 'json');
        });

    });

    myApp.onPageInit('about', function(page) {
        console.log('about');
        var fruits = ['apple', 'banana', 'watermelon', 'peach', 'pineapple', 'grape'];
        var autocompleteDropdownAll = myApp.autocomplete({
            input: '#autocomplete-dropdown-all',
            openIn: 'dropdown',
            source: function(autocomplete, query, render) {
                var results = [];
                // Find matched items
                for (var i = 0; i < fruits.length; i++) {
                    if (fruits[i].toLowerCase().indexOf(query.toLowerCase()) >= 0) results.push(fruits[i]);
                }
                // Render items by passing array with result items
                render(results);
            }
        });
    });

    myApp.onPageInit('personnel-list', function(page) {
        $('.remove-personnel-item').on('click', function() {
            var id = $(this).closest('li').attr('data-id');
            var _token = $('input[name="_token"]').val();
            var target_li = $(this).closest('li');
            myApp.alert('确认要删除吗?', function(e) {
                $$.post('personnel/remove', {
                    id: id,
                    _token: _token
                }, function(data) {
                    if (data.status == '200') {
                        myApp.swipeoutDelete(target_li);
                    } else {
                        myApp.alert(data.msg);
                    }
                }, 'json');
            });
        });
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

    myApp.onPageInit('customer-list', function(page) {
        $('.remove-customer-item').on('click', function() {
            var id = $(this).closest('li').attr('data-id');
            var _token = $('input[name="_token"]').val();
            var target_li = $(this).closest('li');
            myApp.alert('确认要删除吗?', function(e) {
                $$.post('customer/remove', {
                    id: id,
                    _token: _token
                }, function(data) {
                    if (data.status == '200') {
                        myApp.swipeoutDelete(target_li);
                    } else {
                        myApp.alert(data.msg);
                    }
                }, 'json');
            });
        });
    });

    myApp.onPageInit('customer-add', function(page) {
        $('.add-customer-submit').on('click', function() {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var mobile = $('#mobile').val();
            var addr = $('#addr').val();
            var notice = $('#notice').val();
            var chk = chkform('customer-form');
            var _token = $('input[name=_token]').val();
            var type = $('input[name=type]').val();
            var customerId = $('input[name=customerId]').val();
            var url = "";
            if (chk.status) {
                if (type == 'add') {
                    url = "customer/add";
                } else if (type == "edit") {
                    url = "customer/edit";
                }
                $$.post(url, {
                    id: customerId,
                    name: name,
                    phone: phone,
                    mobile: mobile,
                    addr: addr,
                    notice: notice,
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


    // 待办事项
    myApp.onPageInit('todo-add', function(page) {
        $$.post('customer/get_customer', {
            _token: $('input[name=_token]').val()
        }, function(data) {
            console.log(data);
            var fruits = data;
            var autocompleteDropdownAll = myApp.autocomplete({
                input: '#customer',
                openIn: 'dropdown',
                source: function(autocomplete, query, render) {
                    var results = [];
                    // Find matched items
                    for (var i = 0; i < fruits.length; i++) {
                        if (fruits[i].toLowerCase().indexOf(query.toLowerCase()) >= 0) results.push(fruits[i]);
                    }
                    // Render items by passing array with result items
                    render(results);
                }
            });
        }, 'json');

        $('.add-todo-submit').on('click', function() {
            var start_at = $('#start_at').val();
            var customer = $('#customer').val();
            var content = $('#content').val();
            var notice = $('#notice').val();
            var todoId = $('#todoId').val();
            var chk = chkform('todo-form');
            var type = $('input[name=type]').val();
            var url = "";
            if (chk.status) {
                if (type == 'add') {
                    url = "todo/add_todo";
                } else if (type == "edit") {
                    url = "todo/edit_todo";
                }
                $$.post(url, {
                    _token: $('input[name=_token]').val(),
                    start_at: start_at,
                    customer: customer,
                    content: content,
                    notice: notice,
                    todoId: todoId
                }, function(data) {
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

    $$(document).on('ajaxStart', function(e) {
        myApp.showIndicator();
    });
    $$(document).on('ajaxComplete', function(e) {
        // $('.load-page').addClass('hidden');
        // $('.data-page').removeClass('hidden');
        // setTimeout(function() {
        //     $('.page-on-center .load-page').addClass('hidden');
        //     $('.page-on-center .data-page').removeClass('hidden');
        // }, '500');
        myApp.hideIndicator();
    });


    myApp.init();
})();