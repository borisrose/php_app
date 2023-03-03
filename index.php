<?php
    namespace BorisDevHomePage;

    //show all errors
    error_reporting(E_ALL);
 
    define("USER_FIRSTNAME", "John");

    define(__NAMESPACE__."\USER_LASTNAME", "Doe");


    $homepageTitle = "Boris Rose Web Dev";



         //mother class
         class Person {


            public $firstname;
            public $lastname;
            public $gender;
            public $isHuman;
            public $age;


            //builder
            public function __construct($firstname, $lastname, $gender, $age){

                $this->firstname = $firstname;
                $this->lastname = $lastname;
                $this->gender = $gender;
                $this->age = $age;
                $this->isHuman = function(){
                    return 'oui !';
                };


            }

            //methods 
            public function showInfo(){

                echo $this->firstname;
                echo $this->lastname;
                echo $this->gender;
                
            }


            public function showAgeMessage($age){

                echo "Vous avez : ";
                echo $age;
                echo " ans";

            }


            public function checkIfUnderAge(){

                if($this->age >= 18){

                    echo 'Majeur vous pouvez continuer';

                }
                else {

                    echo 'Mineur vous ne pouvez pas continuer';
                }

            }



        }

        //daughter class
        class User extends Person{

            public $password;
            public $email;

            public function __construct($password, $email){
              
                $this->password = $password;
                $this->email = $email;
            }


            public function showAgeMessage(int $age = 18){

           

                parent::showAgeMessage($age);

               


            }


            public function showInfo(){

                echo "classe étendue : ";
                parent::showInfo();

            }


        }



    $db = array(

        '6a756c696574746542696e6f636865'


    );


  
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/1b1fa6fbda.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>


        <!-- 10%  space-between-->

        <div class="header_left">
            <img src="./assets/images/logo.jpg" alt="">
        </div>

        <div class="header_center"> <?=$homepageTitle ? $homepageTitle : '' ?> </div>

        <!-- 30%  space-between -->
        <div class="header_right">

            <i class="fas fa-sign-in header_right_login_icon"></i>
        
      
        </div>

    </header>

    <main>



        
        <div class="main_container_one">




            <table class="main_container_table">


                <thead>

                    <tr><th>Tableau 1 </th></tr>

                </thead>


                <tbody class="main_container_tbody">

                    <?php

                    $userData = array(

                        'firstname' => 'Lucie',
                        'lastname' => 'Dupont',
                        'age'   => 40,
                        'isConnected' => true,
                        'email' => 'lucie@gmail.com',




                    );


                    //unset($userData['firstname']);

                    //print $userData['age'];
            


                    foreach($userData as $i => $value){


                    ?>
                        <tr class="main_container_one_tr">
                        
                        <td>
                            <?php


                            echo $i;
                            ?>
                        </td>
                        <td>

                            <?php


                                echo " : ";
                            ?>


                        </td>


                        <td>
                            <?php

                                if($i == 'isConnected'){
                            
                            
                                    echo "oui";

                                }
                                else {

                                
                                    echo $value;

                                }
                            ?>

                        </td>

                    
                        </tr>
                    <?php

                    }






                    ?>

                </tbody>


            </table>

            <div class="main_container_one_class">


                <form method="post" action="">

                    <input  class="input" type="text" name="firstname"  placeholder="<?= \USER_FIRSTNAME ? \USER_FIRSTNAME : 'Prénom' ?>"/>
                    <input  class="input"type="text" name="lastname" placeholder="<?= USER_LASTNAME ? USER_LASTNAME : 'Nom de famille' ?>"/>
                    <input class="input" type="number" name="age" placeholder="Age" />
                    <input class="input" type="text" name="password" placeholder="Mot de passe"/>
                    <button  class="form-button" type="submit"> Valider </button>
                </form>

                <div class="form-data-table">

                    <?php

                        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['password'])){


                       
                            $firstname = $_POST['firstname'];

                            $firstnameArray = explode("-", $firstname);

                            $lastname = $_POST['lastname'];

                            $age = $_POST['age'];

                            $password = $_POST['password'];

                            foreach($firstnameArray as $piece){

                                echo $piece, PHP_EOL;
                            }


                         


    



                        }

                    
                    ?>


                </div>


            </div>

        </div>


        <div class="main_container_two">



            <table class="main_container_table">

                <thead>

                    <tr><th> Tableau 2 </th></tr>



                </thead>



                <tbody class="main_container_tbody">



                    <?php 

                            $info = [
                                

                                [0, 'Théo'],
                                [1, 'Dupont'],
                                [2,'masculin'],
                                [3,'Développeur Web'],
                                

                            ];


                            //unset($info[2]);


                 

                            foreach($info as [$i, $value]){

                    ?>
                    <tr class="main_container_two_tr">

                        <td>
                        <?php
                                
                                    echo $i;
                        ?>
                        </td>
                        <td>
                        <?php
                                    echo " : ";
                        ?>
                        </td>
                        <td>
                        <?php
                                    echo $value;
                        ?>
                        </td>
                    </tr>
                
                    <?php

                            }

                    ?>

                </tbody>


            </table>
            



        </div>


        

 



    </main>

    <footer>

        <div class="footer_left"> <span>&copy Boris Rose 2023</span></div>
        <div class="footer_right">
            <div class="socials-container"> 
                <a href="https://linkedin.com/in/boris-rose">
                    <img src="./assets/images/linked.svg" alt="" >
                </a>
            </div>
        </div>

    </footer>


    
</body>
</html>