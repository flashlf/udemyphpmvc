<?php
    /**
     * Inti dari kelas Core
     * Menciptakan URL & memanggil core controller
     * Merubah format URL - /controller/method/params
     */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->getUrl();
            // print_r($url);
            // Cari Controller dari index pertama url
            if(@file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // Kalo ada, ubah jadi controller pada attribut core
                $this->currentController = ucwords($url[0]);

                // Lepas index paling awal pada array url
                unset($url[0]);
            }

            // Panggil controllernya
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instansiasi kelas controllernya
            $this->currentController = new $this->currentController;

            // Mapping parameter pada bagian kedua url
            if (isset($url[1])) {
                // Pengecekan apakah terdapat method dengan nama tersebut
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];

                    unset($url[1]);
                }
            }
            
            // Mapping parameter pada bagian > 3 url
            $this->params = $url ? array_values($url) : [];

            // panggil callback dari param array
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }
    }