<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['usermail'])){
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Home | BWF </title>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
        <link rel="icon" href="images/shuttlecock.png" type="image">
    </head>
    <style>
        * {
            padding:0;
            margin:0;
            font-family:'Quicksand', sans-serif ;
            color: white;
         }
         header {
            height:70px;
            background-color: crimson;
         }
         header h1 {
            display: inline-block;
            padding: 15px 24px;
            text-transform: uppercase;
         }
         header h1 a:hover {
            color:black;
            transition: .4s;
         }
         header ul {
            float: right;

         }
         header ul li {
            padding: 24px;
            display: inline-block;
         }
         header ul li a:hover {
            color: black;
            transition: .4s;
         }
         a {
            text-decoration: none;
         }
         .container {
            margin:0 auto;
         }
         .container::after {
            content: '';
            display: block;
            clear: both;
         }
         .home {
            background-color: #fff;
            padding-left: 35px;
            padding: 100px;
         }
         .home img {
            width: 500px;
            border-radius: 15px;
            box-shadow: 0 5px 7px #3A4F7A;
            align-items: center;
         }
         .home h1 {
            color: black;
            margin-bottom: 10px; 
            margin-top: 10px;
            padding-top: 20px;
         }
         .home p {
            color: black;
            font-size: 18px;
            text-align: justify;
         }
         section {
            padding: 50px 0;
         }
         footer {
            background-color: crimson;
            padding: 10px;
            text-align: center;
         }
         footer p {
            color: white;
         }
         </style>
    
    <body>
        <!--- header --->
        <header>
            <div class="container"></div>
                <h1><a href="">BWF</a></h1>
                <ul>
                    <li><a href="form.php">Form</a></li>
                    <li><a href="tickets.php">Tickets</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="register_form.php">Registration</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </header>

        <!--- isi home --->
        <section class="home">
            <div class="container">
                <img src="images/ginting.jpg" onmouseover="this.src='images/minions.jpg'" onmouseout="this.src='images/ginting.jpg'">
                <h1>Welcome!</h1>
               <p>Bergabunglah dengan komunitas bulutangkis kami dan rasakan kegembiraan dalam setiap lompatan, smash, dan pukulan yang sempurna. Di web ini menyajikan informasi tournament terkini seputar olahraga yang memukau ini.</p><br>
               <p>Selamat menikmati perjalanan bulutangkis yang penuh semangat di Web kami. Teruslah berlatih, berkompetisi, dan menjaga semangat juang dalam setiap langkah Anda.
                  Game on, dan jadilah pemenang di lapangan bulutangkis!</p>

            </div>
        </section>

        <!--- footer --->
        <footer>
            <p>copyright@BWF</p>
        </footer>
    </body>
</html>