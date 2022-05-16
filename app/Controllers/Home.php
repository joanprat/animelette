<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ListModel;

class Home extends BaseController
{    
    private $db;
    private $session;
    public function __construct(){
      helper('form');
      $this->session=\Config\Services::session();
      $this->db = db_connect();
      $this->db = \Config\Database::connect(); 
    }
    public function index(){
      if($this->session->get('userId')) {
        $data["sessionData"] = $this->session;
        return view('home', $data);
      }
      // ! TODO - Branch home
      return view('home');
    }
    // ? Explore and search functions
    public function explore () {
      if($this->session->get('userId')) {
        $data["sessionData"] = $this->session;
        return view('explore', $data);
      }
      // ! TODO - Branch explore
      return view('explore');
    }

    // ? Review functions
    public function reviews () {
      if($this->session->get('userId')) {
        $data["sessionData"] = $this->session;
        return view('reviews', $data);
      }
      // ! TODO - Branch reviews
      return view('reviews');
    }

    // ? User profile functions
    public function profile () {
      if($this->session->get('userId')) {
        $data["sessionData"] = $this->session;
        $userTable = new UserModel();
        $data['userData'] = $userTable->find($this->session->get('userId'));

        $listTable = new ListModel();
        $data['userData']['watching'] = sizeof($listTable->where('status', 'watching')->findAll());
        $data['userData']['completed'] = sizeof($listTable->where('status', 'completed')->findAll());
        $data['userData']['onhold'] = sizeof($listTable->where('status', 'on hold')->findAll());
        $data['userData']['dropped'] = sizeof($listTable->where('status', 'dropped')->findAll());
        $data['userData']['planning'] = sizeof($listTable->where('status', 'planning')->findAll());
        $this->console_log($data);
        return view('profile', $data);
      }
      // ! TODO - Branch userprofile
      return view('profile');
    }

    // ? Login and new account functions
    public function login () {
      if($this->request->getPost('login') != '') {
        // Getting data from POST req
        $dataPost = $this->request->getPost();

        // Form validation definition
        $rules = ["username" => "required", "passwd" => "required"];

        $msg = [
          "username" => ["required" => "*This field can not be empty!"],
          "passwd" => ["required" => "*This field can not be empty!"]
        ];

        // Data validation
        if ($this->validate($rules, $msg)) {
          // User validation
          $userData = $this->db->query("SELECT * FROM user WHERE username='".$dataPost["username"]."' AND password = '".sha1($dataPost["passwd"])."';")->getFirstRow();
          if($this->db->affectedRows() > 0) {
            $this->session->start();
            $this->session->set('userId', $userData->idUser);
            $this->session->set('username', $userData->username);
            $data["sessionData"] = $this->session;
            return view('home', $data);
          }else {
            $feedback['error'] = ["notFound" => "Woops! It seems that we had problems finding your username or password, please double check that both of them are correct"];
            return view('login', $feedback);
          }
        }else {
          $feedback['error'] = $this->validator->getErrors();
          return view('login', $feedback);
        }
      }else {
        return view('login');
      }
    }

    public function register () {
      if($this->request->getPost('register') != '') {
        $dataPost = $this->request->getPost();

        $rules = ["username" => "required|is_unique[user.username]", "passwd1" => "required", "passwd2" => "required|matches[passwd1]"];

        $msg = [
          "username" => ["required" => "*This field can not be empty!", "is_unique" => "*This username is already taken, sorry but you must choose another one"],
          "passwd1" => ["required" => "*This field can not be empty!"],
          "passwd2" => ["required" => "*This field can not be empty!", "matches" => "*Both passwords must match"]
        ];

        if ($this->validate($rules, $msg) && !empty($dataPost['birth']) && isset($dataPost['gender']) && isset($dataPost['location'])) {
          $newUserData = [
            'username' => $dataPost['username'],
            'profilePic' => "default.png",
            'banner' => "default_banner.png",
            'password' => sha1($dataPost['passwd1']),
            'location' => $dataPost['location'],
            'gender' => $dataPost['gender'],
            'birthDate' => $dataPost['birth'],
            'joinDate' => $date = date('d-m-y h:i:s'),
            'engagement' => 0,
            'bio' => 'Welcome to my profile!'
          ];
          $tableUser = new UserModel();
          $tableUser->insert($newUserData);
          $feedback['newAccount'] = $this->db->affectedRows() > 0 ? "Account created, login using your credentials" : "Error creating new account, try again";
          return view('login', $feedback);
        }else {
          $this->console_log($dataPost);
          $feedback['error'] = $this->validator->getErrors();
          $feedback['dataPost'] = $dataPost;
          if(empty($dataPost['birth'])) {
            $feedback['error']['birth'] = '*Bad date format';
          }
          $this->console_log($feedback['error']);
          return view('register', $feedback);
        }

      }else {
        return view('register');
      }
    }

    public function logout () {
      $this->session->destroy();
      return view('login');
    }

    // * PHP Depuration
    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }
}
