<?php
// Routes

//require __DIR__ . '/../src/classes/dbConnector.php';

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    $db = $this->db; // for testing

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
