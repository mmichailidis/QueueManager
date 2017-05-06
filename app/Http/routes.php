<?php

$this->group(['namespace' => 'Auth'], function () {
    $this->get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    $this->post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
    $this->get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
    $this->get('register', ['as' => 'auth.register', 'uses' => 'AuthController@showRegistrationForm']);
    $this->post('register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
});

$this->group(['middleware' => 'auth'], function () {

    $this->group(['middleware' => 'employee'], function () {
        $this->group(['namespace' => 'Employee', 'prefix' => 'employee'], function () {
            $this->get('profile', ['as' => 'employee.profile', 'uses' => 'EmployeeController@myProfile']);
            $this->get('overview', ['as' => 'employee.overview', 'uses' => 'EmployeeController@myJob']);
            $this->get('work', ['as' => 'employee.work', 'uses' => 'EmployeeController@work']);

            $this->post('inner/number', ['as' => 'employee.getNumber', 'uses' => 'EmployeeController@getNumber']);
            $this->get('inner/chat', ['as' => 'employee.getChat', 'uses' => 'EmployeeController@getChatHistory']);
            $this->post('inner/chat', ['as' => 'employee.post', 'uses' => 'EmployeeController@postMessage']);

//            $this->get('inner/number',['as' => 'employee.getNumber' , 'uses' => 'EmployeeController@getNumber']); //TEST ROUTE
//            $this->get('inner/chat',['as' => 'employee.getChat' , 'uses' => 'EmployeeController@getChatHistory']); //TEST ROUTE
//            $this->get('inner/chat/{post}',['as' => 'employee.post' , 'uses' => 'EmployeeController@postMessage']); //TEST ROUTE
        });
    });

    $this->group(['middleware' => 'admin'], function () {
        $this->group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
            $this->get('/', ['as' => 'admin.show', 'uses' => 'AdminController@show']);
            $this->put('/', ['as' => 'admin.update', 'uses' => 'AdminController@update']);
            $this->get('/edit', ['as' => 'admin.edit', 'uses' => 'AdminController@edit']);

            $this->group(['prefix' => 'jobs'], function () {
                $this->get('/', ['as' => 'admin.job.index', 'uses' => 'AdminJobController@index']);
                $this->get('/create', ['as' => 'admin.job.create', 'uses' => 'AdminJobController@create']);
                $this->post('/', ['as' => 'admin.job.store', 'uses' => 'AdminJobController@store']);
                $this->get('/{jobId}', ['as' => 'admin.job.show', 'uses' => 'AdminJobController@show']);
                $this->get('/{jobId}/edit', ['as' => 'admin.job.edit', 'uses' => 'AdminJobController@edit']);
                $this->put('/{jobId}', ['as' => 'admin.job.update', 'uses' => 'AdminJobController@update']);
                $this->delete('/{jobId}', ['as' => 'admin.job.destroy', 'uses' => 'AdminJobController@destroy']);
            });

            $this->group(['prefix' => 'employee'], function () {
                $this->get('/', ['as' => 'admin.employee.index', 'uses' => 'AdminEmployeeController@index']);
                $this->get('/create', ['as' => 'admin.employee.create', 'uses' => 'AdminEmployeeController@create']);
                $this->post('/', ['as' => 'admin.employee.store', 'uses' => 'AdminEmployeeController@store']);
                $this->get('/{employeeId}', ['as' => 'admin.employee.show', 'uses' => 'AdminEmployeeController@show']);
                $this->get('/{employeeId}/edit', ['as' => 'admin.employee.edit', 'uses' => 'AdminEmployeeController@edit']);
                $this->put('/{employeeId}', ['as' => 'admin.employee.update', 'uses' => 'AdminEmployeeController@update']);
                $this->delete('/{employeeId}', ['as' => 'admin.employee.destroy', 'uses' => 'AdminEmployeeController@destroy']);
            });

            $this->group(['prefix' => 'member'], function () {
                $this->get('/', ['as' => 'admin.member.index', 'uses' => 'AdminMemberController@index']);
                $this->get('/create', ['as' => 'admin.member.create', 'uses' => 'AdminMemberController@create']);
                $this->post('/', ['as' => 'admin.member.store', 'uses' => 'AdminMemberController@store']);
                $this->get('/{verificationId}', ['as' => 'admin.member.show', 'uses' => 'AdminMemberController@show']);
                $this->delete('/{verificationId}', ['as' => 'admin.member.destroy', 'uses' => 'AdminMemberController@destroy']);
            });

        });
    });

    $this->group(['namespace' => 'Member', 'prefix' => 'member'], function () {
        $this->post('number', ['as' => 'member.request.number', 'uses' => 'MemberController@requestTicket']);
        $this->get('ticket/{ticketId}', ['as' => 'member.ticket.show', 'uses' => 'MemberController@show']);
        $this->delete('ticket/{ticketId}', ['as' => 'member.ticket.destroy', 'uses' => 'MemberController@destroy']);

        $this->get('/', ['as' => 'member.profile', 'uses' => 'MemberController@myProfile']);
        $this->get('/edit', ['as' => 'member.edit', 'uses' => 'MemberController@edit']);
        $this->put('/', ['as' => 'member.update', 'uses' => 'MemberController@update']);
    });
//    $this->group(['prefix' => '/show/{categoryName}/{companyName}'], function () {
//        $this->get('/chat', ['as' => 'company.chat', 'uses' => 'ChatController@index']);
//        $this->get('/chat/{threadId}', ['as' => 'chat.fetch', 'uses' => 'ChatController@fetch']);
//        $this->post('/chat', ['as' => 'chat.send', 'uses' => 'ChatController@send']);
//        $this->post('/chat/requestThread', ['as' => 'chat.create', 'uses' => 'ChatController@createThread']);
//        $this->delete('/chat/{threadId}', ['as' => 'chat.destroy', 'uses' => 'ChatController@destroyThread']);
//    });
});

$this->get('contact', ['as' => 'contact.index', 'uses' => 'ContactController@index']);
$this->get('about', ['as' => 'contact.about', 'uses' => 'ContactController@about']);

$this->get('/', ['as' => 'categories.index', 'uses' => 'GeneralController@index']);
$this->get('/show/{categoryName}', ['as' => 'categories.show', 'uses' => 'GeneralController@show']);
$this->get('/show/{categoryName}/{companyName}', ['as' => 'company.index', 'uses' => 'GeneralController@companyIndex']);

