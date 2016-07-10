<?php
session_start();
session_destroy();
setcookie('tp-promotions', null, -1, '/');
header("Location: /?logout=success");
