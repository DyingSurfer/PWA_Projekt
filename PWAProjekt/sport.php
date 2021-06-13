<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sport</title>
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
   </style>
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
    <?php include 'connect.php';
    define('UPLPATH', 'img/');
    ?> 

    <div class="container">
        <div class="row">
        <h3 id="sport">Sport</h3>
                <?php $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport'";
                $result = mysqli_query($dbc, $query);
                $i = 0;
                while ($row = mysqli_fetch_array($result))
                {
                echo'<div class="col-sm-4">';
                echo '<article>';
                echo '<img src="' . UPLPATH . $row['slika'] . '" width="350px" height:"200px" >';
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id='. $row['id'] . '">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '</article>';
                echo '</div>';
                } ?>
            
        </div>
    </div>
    <footer><div class="container"><h4><hr>&copy; Lovro Bolanča  e-mail: lbolanca@tvz.hr  godina: 2021.</h4></div></footer>

</body>
</html>
