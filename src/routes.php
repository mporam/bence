<?php
// Routes


$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/login', function ($request, $response, $args) {
    return $this->renderer->render($response, 'login.phtml', $args);
});
