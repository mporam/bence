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

    $args['breadcrumbs'] = ['/'=>'Home', '/login'=>'Login'];
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

    $args['breadcrumbs'] = ['/'=>'Home', '/login'=>'Login'];
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
    $stat = new \Bence\Stat($this->db);
    $args['stats']['circles'] .= $stat->getStatCircle('test', 82);
    $args['stats']['circles'] .= $stat->getStatCircle('test2', 23);

    $args['loggedIn'] = $_SESSION['loggedIn'];
    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account'];
    $args['stats']['info'] = $stat->getStatInfo();
    return $this->renderer->render($response, 'account.phtml', $args);
});

$app->get('/account/update', function ($request, $response, $args) {
    $args['loggedIn'] = $_SESSION['loggedIn'];
    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account', '/account/update'=>'Update'];

    $args['user'] = $_SESSION;
    return $this->renderer->render($response, 'user.phtml', $args);
});

$app->post('/account/update', function ($request, $response, $args) {
    $post = $request->getParsedBody();
    $user = new \Bence\User($this->db);

    $args['loggedIn'] = $_SESSION['loggedIn'];
    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account', '/account/update'=>'Update'];

    if
    (
        empty($post['name'])
        || empty($post['email'])
        || empty($post['company'])
        || empty($post['address1'])
        || empty($post['address2'])
        || empty($post['address3'])
        || empty($post['postcode'])
        || empty($post['phone'])
    ) {
        $args['update'] = 'incomplete';
        $args['user'] = $_SESSION;
        return $this->renderer->render($response, 'user.phtml', $args);
    }

    $args['update'] = $user->update($_SESSION['id'], $post);
    $args['user'] = $_SESSION;
    return $this->renderer->render($response, 'user.phtml', $args);
});