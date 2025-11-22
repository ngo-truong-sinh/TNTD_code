<?php
// File: /testing_web/admin/logout.php
session_start();
session_destroy();
header('Location: login.php');
exit;