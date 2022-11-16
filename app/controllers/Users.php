<?php
    class Users extends Controller{
        public function __construct()
        {
            $this->userModel = $this->model('User');;
        }

        public function register()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Proses Form pendaftaran
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // Inisiasi data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validasi daata
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check Email dengan fungsi model
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = "Email already registered";
                    }

                }
                if(empty($data['name'])) $data['name_err'] = 'Please enter name';

                if(empty($data['password'])) 
                    $data['password_err'] = 'Please enter password';
                else if (strlen($data['password']) < 6)
                    $data['password_err'] = 'Password must be at least 6 character';

                if(empty($data['confirm_password'])) 
                    $data['confirm_password_err'] = 'Please confirm password';
                else if ($data['password'] != $data['confirm_password'])
                    $data['confirm_password_err'] = 'Password do not match';

                if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    die('SUCCESS');
                } else {
                    $this->view('users/register', $data);
                }
            } else {
                // Inisiasi data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Panggil view
                $this->view('users/register', $data);
            }
        }

        public function login()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Proses Form pendaftaran
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                if(empty($data['email'])) $data['email_err'] = 'Please enter email';

                if(empty($data['password'])) $data['password_err'] = 'Please enter password';

                if (empty($data['email_err']) && empty($data['password_err'])) {
                    die('SUCCESS');
                } else {
                    $this->view('users/login', $data);
                }
            } else {
                // Inisiasi data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Panggil view
                $this->view('users/login', $data);
            }
        }
    }