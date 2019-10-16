<?php

namespace App\Models;

use PDO;
const DBName = 'mysql:dbname=mvc';
/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */


   protected $name;
   protected $age;

   /* Member functions */
   function setName($par)
   {
     $this->name = $par;
   }
   function getName(): ?string
   {
     return $this->name;
   }

   function setAge($par)
   {
      $this->age = $par;
   }
   function getAge(): ?int
   {
      return $this->age;
  }

//insert db when new
  function __construct($name, $age)
  {

     $this->setName($name);
     $this->setAge($age);

 $connec = new PDO(DBName, 'root', '0000');
 $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $request = $connec->prepare('INSERT INTO users (name, age) VALUES (:name, :age)');
 $request->execute([
   ":name" => $name,
   ":age" => $age,
 ]);
   }
//CRUD FUNCTIONS WITHOUT 'CREATE' BECAUSE ALREADY DONE IN CONSTRUCT ABOVE.
public static function getAll()
{
    $db = static::getDB();
    $stmt = $db->query('SELECT * FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   // function getAllUsers() {
   //   $request = '
   //   SELECT *
   //   FROM  users
   //   ';
   //   $connec = new PDO( DBName, 'root', '0000');
   //   $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //   $request = $connec->prepare($request);
   //   $request->execute();
   //   return $request->fetchAll();
   // }
 //   function getRoles($id) {
 //     $request = '
 //     SELECT name
 //     FROM  roles
 //     WHERE id = :id
 //     ';
 //     $connec = new PDO(DBName, 'root', '0000');
 //     $request = $connec->prepare($request);
 //     $request->bindParam(':id', $id);
 //     $request->execute();
 //     return $request->fetch(PDO::FETCH_ASSOC);
 //   }
 //   function deleteOneUser($id) {
 //     $connec = new PDO(DBName, 'root', '0000');
 //     $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //     $request = $connec->prepare('DELETE FROM characters WHERE id = :id');
 //     $request->execute([
 //       ":id" => $id,
 //     ]);
 //   }
 //   function updateUser($name, $id){
 //     $connec = new PDO(DBName, 'root', '0000');
 //     $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //     $request= $connec->prepare("UPDATE characters SET name = :name WHERE id = :id ");
 //     $request->bindParam(':name', $name);
 //     $request->bindParam(':id', $id);
 //     $request->execute();
 // return;
 //   }



}
