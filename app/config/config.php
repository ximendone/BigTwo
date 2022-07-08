<?php

// Database 的參數，以下為範例
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'default');
define('DB_USER', 'default');
define('DB_PASS', 'secret');

// App 根目錄，這是引入 app 資料夾裡的資源用的
define('APPROOT', dirname(dirname(__FILE__)) . '/');

// URL 根目錄，這是引入 public 資料夾裡的資源，或是頁面跳轉時用的
define('URLROOT', 'http://localhost:8000/public/');

// 網站名稱
define('SITENAME', '自製 MVC 框架');
?>