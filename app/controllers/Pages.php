<?php

Class Pages extends Controller
{
    public function __construct()
    {
        // 當 Controller 需要操作資料庫時，這裡可以實例化該 Model。
        // 不過這裡我們只是要單純引入 view，所以 __construct 裡不需要撰寫任何程式碼。
    }

    public function index()
    {
        // 這裡可以引入頁面，我們即將在 views 資料夾底下建立一個 pages/index.php 的檔案，故可以先寫好以下的程式碼：
        $this->view('pages/index');
    }
}
?>