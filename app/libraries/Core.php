<?php

class Core
{
    // 預設 Controller 為 Pages
    protected $currentController = 'Pages';
    // 預設方法為 index
    protected $currentMethod = 'index';
    // 預設參數為空
    protected $params = [];

    public function __construct()
    {
        // 呼叫 getUrl() 取得 $url 陣列

        // 將 $url[0] 視為 Controller 的名稱
        // 檢查 $url[0] 是否有對應的 Controller ，即是否存在 $url[0].php 的檔案
        if(存在)
            $currentController = $url[0];
        // 引入 Controller
        // 實例化 Controller

        // $url[1] 視為 Controller 中的方法
        // 所以先要檢查是否有值，若有，檢查該值是否有對應的方法
        if(isset($url[1]))
            if(method_exists($this->currentController, $url[1]))
                $this->currentMethod = $url[1];

        // $url 陣列中的第三個值開始，視為帶入方法中的參數
        // 用 $params 陣列儲存所有剩下的值

        // 最後透過呼叫 callback 來執行方法
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        // 從 public?url= 後開始，將 $url 按 / 切分，轉換成陣列並回傳
        // 例如： 使用者輸入 127.0.0.1/public?url=posts/show/1
        // 則回傳 $url 的值為 ['posts', 'show', 1]
        // 它將在 __construct() 中依序被解析成 Controller, 方法, 參數
    }
}
?>