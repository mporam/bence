<?php
// Routes

//     return $response->withStatus(200)->withHeader('Location', '/'); // redirect

$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/login', function ($request, $response, $args) {
    $args['breadcrumbs'] = ['/'=>'Home', '/login'=>'Login'];
    return $this->renderer->render($response, 'login.phtml', $args);
});


$app->post('/login', function ($request, $response, $args) {
    $data = $request->getParsedBody();
    $email = filter_var($data['email'], FILTER_SANITIZE_STRING);
    $password = $data['password'];
    $user = new \Bence\User();
    $loggedIn = $user->login($email, $password);

    if ($loggedIn) {
        return $this->renderer->render($response, 'login.phtml', $args);
    }

    $args['breadcrumbs'] = ['/'=>'Home', '/login'=>'Login'];
    $args['login'] = false;
    return $this->renderer->render($response, 'login.phtml', $args);

});

$app->get('/account', function ($request, $response, $args) {
    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account'];
    return $this->renderer->render($response, 'account.phtml', $args);
});