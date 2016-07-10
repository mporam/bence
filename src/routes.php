<?php
// Routes

//     return $response->withStatus(200)->withHeader('Location', '/'); // redirect

$app->get('/', function ($request, $response, $args) {
    $promotions = new \Bence\Promotions($this->db);
    $args['promos'] = $promotions->getPromotions(3);

    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/login', function ($request, $response, $args) {
    $user = new \Bence\User($this->db);
    if ($user->attemptLogin()) {
        return $response->withStatus(200)->withHeader('Location', '/account');
    }

    $args['breadcrumbs'] = ['/' => 'Home', '/login' => 'Login'];
    return $this->renderer->render($response, 'login.phtml', $args);
});


$app->post('/login', function ($request, $response, $args) {
    $data = $request->getParsedBody();
    $email = filter_var($data['email'], FILTER_SANITIZE_STRING);
    $password = $data['password'];
    $remember = false;
    if (!empty($data['remember'])) {
        $remember = $data['remember'];
    }

    $user = new \Bence\User($this->db);
    $loggedIn = $user->login($email, $password, $remember);

    if ($loggedIn) {
        return $response->withStatus(200)->withHeader('Location', '/account');
    }

    $args['breadcrumbs'] = ['/' => 'Home', '/login' => 'Login'];
    $args['login'] = false;
    return $this->renderer->render($response, 'login.phtml', $args);

});

$app->get('/logout', function ($request, $response, $args) {
    $_SESSION['loggedIn'] = false; // just in case
    $_SESSION = [];
    setcookie(\Bence\User::COOKIENAME);
    unset($_COOKIE[\Bence\User::COOKIENAME]); // they are 100% logged out now!

    return $response->withStatus(200)->withHeader('Location', '/');
});

$app->get('/login/reset', function ($request, $response, $args) {
    $get = $request->getQueryParams();
    $user = new \Bence\User($this->db);
    if (!empty($get['user'])) {
        $args['user'] = false;
        if ($user->validateReset($get['user'])) {
            $args['user'] = $get['user'];
        }
    }
    return $this->renderer->render($response, 'loginReset.phtml', $args);
});

$app->post('/login/reset', function ($request, $response, $args) {
    $post = $request->getParsedBody();
    $get = $request->getQueryParams();
    $user = new Bence\User($this->db);

    if (!empty($post['email']) && empty($get['user'])) {
        require __DIR__ . "/passwordreset.php";
        return $this->renderer->render($response, 'loginReset.phtml', $args);
    }

    if (!empty($get['user']) && !empty($post['password'])) {
        if ($user->resetPassword($get['user'], $post['password'])) {
            $args['breadcrumbs'] = ['/' => 'Home', '/login' => 'Login'];
            $args['loginReset'] = true;
            return $this->renderer->render($response, 'login.phtml', $args);
        }
    }

    return $this->renderer->render($response, 'loginReset.phtml', $args);
});

$app->get('/account', function ($request, $response, $args) {
    $args['loggedIn'] = $_SESSION['loggedIn'];
    $args['breadcrumbs'] = ['/' => 'Home', '/account' => 'Account'];
    return $this->renderer->render($response, 'account.phtml', $args);
});

$app->get('/account/notifications', function ($request, $response, $args) {
    $args['breadcrumbs'] = ['/' => 'Home', '/account' => 'Account', '/account/notifications' => 'Notifications'];
    $args['db'] = $this->db;
    return $this->renderer->render($response, 'notifications.phtml', $args);
});

$app->post('/account/notifications/email', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/notifications' => 'Notifications',
        '/account/notifications/email' => 'Email'
    ];
    $args['db'] = $this->db;
    return $this->renderer->render($response, 'email.phtml', $args);
});

$app->post('/account/notifications/send', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/notifications' => 'Notifications',
        '/account/notifications/send' => 'Sending Emails'
    ];
    $args['db'] = $this->db;
    return $this->renderer->render($response, 'send.phtml', $args);
});

