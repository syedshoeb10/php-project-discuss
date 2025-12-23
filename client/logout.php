<?php

// echo "log out";
session_start();
session_unset();
session_destroy();

header("Location: /discuss/?login=true");
exit;