<?php

// class Animal{

//     public int $age;
//     public string $species;
//     public const LIVE_IN = "dunya";
//     public function born() {
//         echo "$this->species doğdu. <br>";
//     }
//     public function die() {
//         echo "$this->species öldü. <br>";
//     }
//     public function greet() {
//         echo "Ben ". $this->species. " turundenim ve ". $this::LIVE_IN. " da yaşıyorum <br>";
//     }
// }

// class Bird extends Animal{
//  //override species variable
//     public string $species = "Değiştirilen kuş";
//     public function tweet() {
//         echo "cik  cik";
//     }
//     //override greet method
//     public function greet() {
//         echo "selamlaşma metodu ezdim <br/>";
//     }
// }

// $pigeon = new Bird();
// $pigeon->born();
// $pigeon->greet();
// $pigeon->tweet();

// parent abstract class

// abstract class Person{

//     public $name;
    
//     public function __construct($name) {

//         $this->name = $name;


//     }
//     abstract public function greet() : string;
// }
// //child classes
// class Programmer extends Person{

//     public function greet(): string{
//         return "merhaba dunya ". $this->name;

//     }
// }
// class Student extends Person{

//     public function greet(): string{
//         return "merhaba ben ". $this->name;
//     }

// }
// class Teacher extends Person{

//     public function greet(): string{
//         return "Gunaydın sevgili ogrenciler...";
//     }
// }

// // the objects

// $programmer = new Programmer("ahmet");
// echo $programmer->greet();

// $student = new Student("esra");
// echo $student->greet();

// $teacher = new Teacher("haskan");
// echo $teacher->greet();

// Interface Person{

//     public function __construct($name);
//     public function greet(): string;

// }
// class Programmer implements Person{

//     public $name;

//     public function __construct($name)
//     {
//         $this->name = $name;
//     }
//     public function greet(): string{
//         return "hello world from ". $this -> name;
//     }

// }
// $programmer = new Programmer("gokhan");
// echo $programmer->greet();


// Birden fazla interface kullanımı

// Interface myInterface1{

//     public function myMethod1();
// }
// Interface myInterface2{

//     public function myMethod2();
// }
// class MyClass implements MyInterface1, MyInterface2{

//     public function myMethod1()
//     {
//         echo "hello ";
//     }
//     public function myMethod2()
//     {
//         echo "world ";
//     }
// }
// $obj = new MyClass();
// $obj -> myMethod1();
// $obj -> myMethod2();


// extend ve implement birlikte kullanımı

// Interface MyInterface{

//     public function write();
// }
// class ParentClass
// {
//     public $name;
//     public function __construct($name)
//     {
//         $this->name = $name;
//     }
// }
// class ChildClass extends ParentClass implements MyInterface{
//         function write(){

//             echo $this->name;
//         }
// }
// $child = new ChildClass("gokhan");
// $child->write();


// TRAITS

// trait testTrait{

//     public function test1()
//     {
//         echo "test1 method in trait\n";
//     }
//     public function test2(){
//         echo "test2 method in trait\n";
//     }
// }
// //using trait

// class testclass{

//     use testTrait;
//     public function test1()
//     {
//         echo "test1 method overridden\n";
//     }

// }
// $obj = new testclass();
// $obj->test1();
// $obj->test2();

//definition of trait

// trait testtrait{

//     public function test1()
//     {
//         echo "test1 method in trait\n";
//     }
// }
// //parent class
// class parentclass{
//     public function test2()
//     {
//         echo "test2 method in parent";
//     }

// }
// //using trait and parent class
// class childclass extends parentclass{

//     use testtrait;
//     public function test1()
//     {
//         echo "parent method overridden\n";
//     }
//     public function test2()
//     {
//         echo "trait method overridden\n";
//     }

// }
// $obj = new childclass();
// $obj->test1();
// $obj->test2();


// definition of trait

// trait mytrait{
//     public function test1(){
//         echo "test1 method in trait1\n";
//     }
// }
// class myclass{
//     public function test2()
//     {
//         echo "test2 method in parent class\n";
//     }
// }
// Interface myinterface{
//     public function test3();
// }
// //using trait and parent class
// class testclass extends myclass implements myinterface{

//     use mytrait;
//     public function test3()
//     {
//         echo "implementation of test3 method\n";
//     }
// } 
// $obj = new testclass();
// $obj->test1();
// $obj->test2();
// $obj->test3();


// $urunler = [

//     [
//         "isim" => "X ürünü",
//         "fiyat" => 100
//     ],
//     [
//         "isim" => "Y ürünü",
//         "fiyat" => 3.21
//     ]
//     [

//     ]
// ]
// php mongodb bağlantısı crud işlemleri


// 

// $write->insert(["email"=>"gokhangemici93@gmail.com", "name"=>"gokhan", "surname"=>"gemici"]);
// $write->insert(["email"=>"ebrudeniz@gmail.com", "name"=>"ebru", "surname"=>"deniz"]);
// $write->insert(["title"=>"İletişim sayfamız", "content"=>"Lorem ipsum dolor sit amet consectetur."]);

// $write->update(["email"=>"gokhangemici93@hotmail.com"], ['$set'=>
// ['name'=> "gokhan"]]);
// $write->delete(["name"=>"ebru"]);
// $write->delete(["email"=>"gokhan_gemici@hotmail.com"]);
// $write->insert(["surname"=>"gemici", "age"=>25]);
//$write->delete(["title" => "İletişim sayfamız"]);
// $result = $db->executeBulkWrite("odev5.users", $write);

// printf("Toplam eklenen: %d", $result->getInsertedCount());
// printf("Toplam güncellenen: %d", $result->getModifiedCount());
// printf("Toplam işlem: %d", $result->getCount());

// printf("Toplam silinen: %d", $result->getDeletedCount());

//getDeletedCount silinen satır sayısını bana verir
//getInsertedCount eklenen satır sayısını bana verir


// var_dump($result);

// $query = new MongoDB\Driver\Query(['email' => "gokhangemici93@hotmail.com"], ['sort' => ['email' => 1], 
// 'limit'=> 2,
// 'projection' => ['name' => true, 'email' => true]]);

// $result = $db->executeQuery("odev5.users", $query);
// foreach($result->toArray() as $user)
// {
//     echo $user->name. " ". $user->email. "<br>";
// }

// $db = new MongoDB\Driver\Manager('mongodb://mongo');

// $collection = $db->hddatab
// $write = new MongoDB\Driver\BulkWrite();

// session_start();

// 

// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>CRUD Operation using MongoDB and PHP</title>
//     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> 

// </head>
// <body>
//     <div class="container">
//         <h1>CRUD operation using MongoDB and PHP</h1>
//             <a href="app.php" class = "btn btn-success">Add Book</a>
//             <?php

//                 if(isset($_SESSION['success']))
//                 {
//                     echo "<div class = 'alert alert-success'>".$_SESSION['success']."</div>";
//                 }
         

     
//                 $books = $collection->find([]);

//                 foreach ($books as $book)
//                 {
//                     echo "<tr>";
//                     echo "<td>".$book->name."</td>";
//                     echo "<td>".$book->detail."</td>";
//                     echo "<td>";
//                     echo "<a href='app.php?id=".$book->_id."' class='btn btn-primary'>Edit</a>";
//                     echo "<a href='app.php?id=".$book->_id."' class='btn btn-danger'>Delete</a>"; 
//                     echo "</td>";  
//                     echo "</tr>";  
//                 }
            
         
//           
// </body>
// </html>

$collection = (new MongoDB\Client)->odev5->users;

$insertOneResult = $collection->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

var_dump($insertOneResult->getInsertedId());









