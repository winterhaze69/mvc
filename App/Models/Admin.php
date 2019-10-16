<?php

class Admin {

  /**
   * L'objet unique Admin
   *
   * @var Admin
   * @access private
   * @static
   */
   private static $_instance = null;

   /**
    * Le nom du Admin
    *
    * @var string
    * @access private
    */
   private $_nom='';

    /**
    * L'age de l' Admin
    *
    * @var int
    * @access private
    */
   private $_age='';

   /**
    * Représentation chainée de l'objet
    *
    * @param void
    * @return string
    */
   public function __toString() {

     return $this->getAge() .' '. strtoupper($this->getNom());
   }

   /**
    * Constructeur de la classe
    *
    * @param string $nom Nom du Admin
    * @param int $age age du Admin
    * @return void
    * @access private
    */
   private function __construct($nom, $age) {

     $this->_nom = $nom;
     $this->_age = $age;
   }

   /**
    * Méthode qui crée l'unique instance de la classe
    * si elle n'existe pas encore puis la retourne.
    *
    * @param string $nom Nom du Admin
    * @param int  $age age du Admin
    * @return Admin
    */
   public static function getInstance($nom, $age) {

     if(is_null(self::$_instance)) {
       self::$_instance = new Admin('admin', '888');
     }

     return self::$_instance;
   }

  /**
   * Retourne le nom du Admin
   *
   * @return string
   */
  public function getNom() {
    return $this->_nom;
  }

  /**
   * Retourne l'age de l'Admin
   *
   * @return string
   */
  public function getAge() {
    return $this->_age;
  }
}

?>
