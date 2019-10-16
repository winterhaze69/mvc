<?php

namespace App\Controllers;
use \App\Models\User;
use \App\Config;
use \Core\View;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
      return View::renderTemplate('Home/index.html');
        // View::renderTemplate('Home/index.html');
    }
    public function indexoAction()
    {
        //SIngleton ici!!! just for you!! :p
      $users = Config::getInstance()->query('SELECT * FROM users');

       return View::renderTemplate('Home/indexo.php', ['users' => $users]);
    }
  
    public function loginAction()
    {
      $name = htmlspecialchars($_POST['name']);
      $age = htmlspecialchars($_POST['age']);
      $users = User::getAll();
      foreach ($users as $key => $user) {
        if ($name !== $user['name'] && ($age !== $user['age'])) {
          echo "<script>alert(\"l'utilisateur $name agé de $age ans éxiste pas, veuillez vous register!! \")</script>";
          return View::renderTemplate('Home/index.html');
        }else {
          $users = User::getAll();
          return View::renderTemplate('Home/indexo.php', ['users' => $users]);
        }
      }

    }
    public function registerAction()
    {
      $name = htmlspecialchars($_POST['name']);
      $age = htmlspecialchars($_POST['age']);
      $users = User::getAll();
      foreach ($users as $key => $user) {
        if ($name == $user['name'] && ($age == $user['age'])) {
          echo "<script>alert(\"l'utilisateur $name agé de $age ans éxiste déja, veuillez vous login!! \")</script>";
          return View::renderTemplate('Home/index.html');
        }else {

        }
        $me = new User($name, $age);
        $users = User::getAll();
        return View::renderTemplate('Home/indexo.php', ['users' => $users]);
      }
    }
}
