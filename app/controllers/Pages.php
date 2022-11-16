<?php
    class Pages extends Controller{
        public $_data;
        public function __construct()
        {
            $this->_data = [
                'title' => 'Welcome',
                'description' => 'Simple social network built on PHP MVC Framework.'
            ];
        }

        public function index() {

            
            $this->view('pages/index', $this->_data);
            
        }

        public function about() {
            $this->view('pages/about', $this->_data);
        }
    }