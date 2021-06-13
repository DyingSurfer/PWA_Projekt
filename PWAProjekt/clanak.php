<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Unos vijesti</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/c1aba81639.js" crossorigin="anonymous"></script>
   <style>
       *{
           margin:0;
           padding:0;
       }
       body{
           background-image: url("img/embossed-diamond.png");
           font-family: Roboto;
       }
       .wrap{
           background-color:rgba(15, 15, 15, 0.849);
           padding:20px;
       }
       h1{
           color:#fff;
           padding:20px;
           margin:0;
       }
       h2{
           padding:10px;
           margin-top:-20px;
       }
       p{
           padding-left:10px;
         
          
       }
      #kategorija{
        float:none;
      }
      #datum{
          float:none;
      }
      .about{
        color:#fff;
        text-align:left;
        padding:20px;
      }
      .sadrzaj{
          color:#fff;
          text-align:left;
          padding:20px;
      }
      .slika{
        margin:20px 30px 20px 30px;
        
      }
   </style>
   <?php 
   include "connect.php"; 
   define('UPLPATH', 'img/');
   $id=$_GET['id'];
   $query = "SELECT * FROM vijesti WHERE id=$id";
   $result = mysqli_query($dbc, $query);
   $row = mysqli_fetch_array($result)
   
   ?>

    </head>
   <body>
   <nav>
    <ul>
    <div class="container">
        <li><img src="img/bbc.png" class="logo"></li>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="culture.php">Culture</a></li>
        <li><a href="sport.php">Sport</a></li>
        <li><a href="unos.php">Submit news</a></li>
        <li><a href="admin.php">Edit news</a></li>
    </div>
    </ul>
    </nav>
 
<section class="container wrap"> 
    <div class="row"> 
     
        <h1 class="title"><?php echo $row['naslov']; 
        ?>
        </h1> 
        <hr>
    </div>
    <div class="row"> 
        <h2 >
            <?php echo "<span id='kategorija'>" . $row['kategorija'] . "</span>"; ?>
        </h2>
        <p>AUTOR: Husejn kapetan Gradašević</p> 
        <p>OBJAVLJENO: 
        <?php 
        echo "<span id='datum'>" . $row['datum'] . "</span>"; ?>
        </p>
    </div> 
    </div> 
    <section class="slika"> 
        <?php echo '<img src="' . UPLPATH . $row['slika'] . '" width="100%">'; ?> 
    </section> 
    <section class="about"> 
        <p> <?php echo "<i>" . $row['sazetak'] . "</i>"; ?> </p> 
    </section> 
    <section class="sadrzaj"> <p> <?php echo $row['tekst']; ?>
        </p> 
    </section>
</section> 
</div>
<footer><div class="container"><h4><hr>&copy; Lovro Bolanča  e-mail: lbolanca@tvz.hr  godina: 2021.</h4></div></footer>   
</body>
</html>