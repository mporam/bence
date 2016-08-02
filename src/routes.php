<?php
// Routes

//     return $response->withStatus(200)->withHeader('Location', '/'); // redirect

$app->get('/', function ($request, $response, $args) {
    $promotions = new \Bence\Promotions($this->db);
    $args['promos'] = $promotions->getPromotions(3);
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/login[/]', function ($request, $response, $args) {
    $user = new \Bence\User($this->db);
    if ($user->attemptLogin()) {
        return $response->withStatus(200)->withHeader('Location', '/account');
    }

    $args['breadcrumbs'] = ['/' => 'Home', '/login' => 'Login'];
    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->get('/terms[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/terms' => 'Terms and Conditions',
    ];
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'footer_pages/terms.phtml', $args);
});

$app->get('/access[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/access' => 'Access Statement',
    ];
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'footer_pages/access.phtml', $args);
});

$app->get('/conditions[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/conditions' => 'Conditions of Use',
    ];
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'footer_pages/conditions.phtml', $args);
});

$app->get('/contact[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/contact' => 'Contact Us',
    ];
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'footer_pages/contact.phtml', $args);
});

$app->get('/privacy[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/privacy' => 'Privacy Policy',
    ];
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'footer_pages/privacy.phtml', $args);
});


$app->post('/login[/]', function ($request, $response, $args) {
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

$app->get('/logout[/]', function ($request, $response, $args) {
    $_SESSION['loggedIn'] = false; // just in case
    $_SESSION = [];
    setcookie(\Bence\User::COOKIENAME);
    unset($_COOKIE[\Bence\User::COOKIENAME]); // they are 100% logged out now!

    return $response->withStatus(200)->withHeader('Location', '/');
});

$app->get('/login/reset[/]', function ($request, $response, $args) {
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

$app->post('/login/reset[/]', function ($request, $response, $args) {
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

$app->get('/account[/]', function ($request, $response, $args) {
    $user = new \Bence\User($this->db);
    $stat = new \Bence\Stat($this->db, $user->getTotalUsers());
    $breadcrumbs = new \Bence\Breadcrumbs();

    $get = $request->getQueryParams();
    $args['stats']['circles'][] = $stat->getStatCircle('stat', 1);
    $args['stats']['circles'][] = $stat->getStatCircle('stat2', 2);
    $args['stats']['circles'][] = $stat->getStatCircle('stat3', 3);
    $args['stats']['circles'][] = $stat->getStatCircle('stat4', 4);

    $args['loggedIn'] = $_SESSION['loggedIn'];
    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account'];

    $permissions = $_SESSION['permissions'];
    $args['user'] = $_SESSION;

    if (!empty($get['promo']) && !empty($get['success']) && $get['success'] == 'true') {
        $promotions = new \Bence\Promotions($this->db);
        $args['selectedPromo'] = $promotions->getPromotionById($get['promo']);
    } else if (!empty($get['success']) && $get['success'] == 'false') {
        $args['selectedPromo'] = $get['promo'];
    }

    if (!empty($get['uid']) && $_SESSION['access'] > 1) {
        if (empty($_SESSION['breadcrumbs'])) {
            $_SESSION['breadcrumbs'][] = $get['uid'];
        }
        $args['breadcrumbs'] += $breadcrumbs->getAccountBreadcrumbs($user, $get['uid'], $_SESSION['breadcrumbs']);

        $permissions = $user->getUserPermissions($get['uid']);
        $args['user'] = $user->getUserWithId($get['uid']);

        // prevent users seeeing accounts higher than them
        if ($args['user']['access'] > $_SESSION['access'] && !in_array($get['uid'], $_SESSION['permissions'])) {
            return $response->withStatus(200)->withHeader('Location', '/account');
        }
    }

    if (!empty($permissions) && $_SESSION['access'] > 1) {
        foreach ($permissions as $uid) {
            $args['users'][] = $user->getUserWithId($uid);
        }
    } else if ($args['user']['access'] == 1) {

        $expenses = new \Bence\Expenses($this->db);
        $args['expenses'] = $expenses->getExpensesByAccNo($args['user']['accNo']);

        $promotions = new \Bence\Promotions($this->db);

        $args['promos'] = $promotions->getPromotionsforUser($args['user']['id']);
        
        $availableTiers = new \Bence\Limits($this->db);
        $args['tiers'] = $availableTiers->getAvailableTiersForUser($args['user']['accNo']);
    }
    return $this->renderer->render($response, 'account.phtml', $args);
});

$app->get('/account/promotions/{pid}[/]', function ($request, $response, $args) {
    $promoId = $args['pid'];
    $promo = new \Bence\Promotions($this->db);
    $user = new \Bence\User($this->db);
    $breadcrumbs = new \Bence\Breadcrumbs();

    $args['promo'] = $promo->getPromotionById($promoId);
    $args['loggedIn'] = $_SESSION['loggedIn'];

    $get = $request->getQueryParams();

    // @todo: has the user unlocked this promo? if not redirect to account page

    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account'];
    if (!empty($get['uid']) && $_SESSION['access'] > 1) {
        $args['uid'] = $get['uid'];

        if (empty($_SESSION['breadcrumbs'])) {
            $_SESSION['breadcrumbs'][] = $get['uid'];
        }
        $args['breadcrumbs'] += $breadcrumbs->getAccountBreadcrumbs($user, $get['uid'], $_SESSION['breadcrumbs']);
    }

    $args['breadcrumbs']['/account/promotions/' . $promoId] = $args['promo']['title'];

    return $this->renderer->render($response, 'promos.phtml', $args);
});

$app->get('/account/book/{pid}[/]', function ($request, $response, $args) {
    $promoId = $args['pid'];
    $promotions = new \Bence\Promotions($this->db);
    $users = new \Bence\User($this->db);
    $args['loggedIn'] = $_SESSION['loggedIn'];

    $get = $request->getQueryParams();
    $uid = $_SESSION['id'];
    if (!empty($get['uid']) && $_SESSION['access'] > 1) {
        $uid = $get['uid'];
    }
    $user = $users->getUserWithId($uid);

    if ($promotions->setPromotionForUser($promoId, $uid)) {
        // do stuff
        $promo = $promotions->getPromotionById($promoId);

        $adminMessage = "Hi Admin,

" . $user['name'] . " has requested their promo: " . $promo['title'] . ".

You can contact them here: " . $user['email'] . "

Company: " . $user['company'] . "

Their contact number is: " . $user['phone'] . "

Their Account number is: " . $user['accNo'] . "

Many thanks,

Bence Rewards Website
";

        $customerMessage = "Hi " . $user['name'] . ",

You have selected the following promotion:
" . $promo['title'] . ".

If you would like to change your Reward before the closing date please log into your account and select a different promotion from those available.

We will be in touch after the closing date with further details.

Many thanks,

Bence Rewards
*PHONE NUMBER*
*EMAIL*
";

        require __DIR__ . '/classes/PHPMailer.php';

        $mail = new PHPMailer();
        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host     = "mailout.one.com"; // SMTP server
        $mail->SetFrom("no-reply@bence-rewards.co.uk", 'Bence Rewards');
        $mail->AddAddress('info@bence-rewards.co.uk');
        $mail->Subject  = 'Promotions Booking';
        $mail->Body     = $adminMessage;
        $mail->WordWrap = 78;

        $Cmail = new PHPMailer();
        $Cmail->IsSMTP();  // telling the class to use SMTP
        $Cmail->Host     = "mailout.one.com"; // SMTP server
        $Cmail->SetFrom("no-reply@bence-rewards.co.uk", 'Bence Rewards Booking');
        $Cmail->AddAddress($user['email']);
        $Cmail->Subject  = 'Bence Rewards Booking';
        $Cmail->Body     = $customerMessage;
        $Cmail->WordWrap = 78;

        $send = 'false';
        if ($mail->Send() && $Cmail->Send()) {
            $send = 'true';
        }

        if (!empty($get['uid']) && $_SESSION['access'] > 1) {
            return $response->withStatus(200)->withHeader('Location', '/account?uid=' . $get['uid'] . '&promo=' . $promoId . '&success=' . $send);
        }
        return $response->withStatus(200)->withHeader('Location', '/account?promo=' . $promoId . '&success=' . $send);
    }
    return $response->withStatus(200)->withHeader('Location', '/account');
});

$app->get('/account/update[/]', function ($request, $response, $args) {
    $args['loggedIn'] = $_SESSION['loggedIn'];
    $args['breadcrumbs'] = ['/'=>'Home', '/account'=>'Account', '/account/update'=>'Update'];

    $args['user'] = $_SESSION;
    return $this->renderer->render($response, 'user.phtml', $args);
});

$app->post('/account/update[/]', function ($request, $response, $args) {
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

$app->get('/account/notifications[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = ['/' => 'Home', '/account' => 'Account', '/account/notifications' => 'Notifications'];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'notifications.phtml', $args);
});

$app->post('/account/notifications/email[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/notifications' => 'Notifications',
        '/account/notifications/email' => 'Email'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'email.phtml', $args);
});

$app->post('/account/notifications/send[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/notifications' => 'Notifications',
        '/account/notifications/send' => 'Sending Emails'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'send.phtml', $args);
});

$app->get('/account/notifications/complete[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/notifications' => 'Notifications',
        '/account/notifications/send' => 'Emails Sent!'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'complete.phtml', $args);
});

$app->get('/account/import[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/import' => 'Import Data'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'import.phtml', $args);
});

$app->post('/account/import/map[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/import' => 'Import Data',
        '/account/import/map' => 'Map Fields'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'map.phtml', $args);
});

$app->post('/account/import/complete[/]', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/import' => 'Import Data',
        '/account/import/complete' => 'Completed Import'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'import_complete.phtml', $args);
});

$app->get('/account/users', function ($request, $response, $args) {
    $args['breadcrumbs'] = [
        '/' => 'Home',
        '/account' => 'Account',
        '/account/users' => 'User List'
    ];
    $args['db'] = $this->db;
    $args['loggedIn'] = $_SESSION['loggedIn'];

    return $this->renderer->render($response, 'find_user_list.phtml', $args);
});
