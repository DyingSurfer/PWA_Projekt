<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Unos vijesti</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
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
       label{
           color:#fff;
           padding:15px 15px 15px 0px;
       }
       input{
           background:transparent;
           border: 2px solid black;
           height:50px;
           padding:10px;
           color:#fff;
       }
     
        #picture{
           border:none;
           width:100px;
           height:40px;
           color:#fff;

       }
       textarea{
        background:transparent;
        border: 2px solid black;
        padding:10px;
        color:#fff;
       }
       .wrap{
           background-color:rgba(15, 15, 15, 0.849);
           padding:20px;
       }
       button{
           border:3px solid black;
           background-color:#000;
           width:100px;
           height:40px;
           color:#fff;

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
<?php
include "connect.php";
define('UPLPATH', 'img/');
$query = "SELECT * FROM vijesti"; 
$result = mysqli_query($dbc, $query); 
while($row = mysqli_fetch_array($result)) { 
echo '
<div class="container wrap">
<form enctype="multipart/form-data" action="" method="POST">
   <div class="form-item">
      <label for="title">Naslov vjesti:</label> 
      <div class="form-field"> <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'"> </div>
   </div>
   <div class="form-item">
      <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
      <div class="form-field"> <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea> </div>
   </div>
   <div class="form-item">
      <label for="content">Sadržaj vijesti:</label> 
      <div class="form-field"> <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea> </div>
   </div>
   <div class="form-item">
      <label for="pphoto">Slika:</label> 
      <div class="form-field">
         
         <input type="file"  class="input-text" id="picture" value="'.$row['slika'].'" name="picture"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px> 
      </div>
   </div>
   <div class="form-item">
      <label for="category">Kategorija vijesti:</label> 
      <div class="form-field">
         <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
         <option value="" selected disabled>Choose a category</option>   
         <option value="sport">Sport</option>
         <option value="kultura">Kultura</option>
         </select>
      </div>
   </div>
   <div class="form-item">
      <label>
         Spremiti u arhivu: 
         <div class="form-field">'; if($row['arhiva'] == 0) { echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; } else { echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; } echo '</div>
      </label>
   </div>
   </div> 
   <div class="container wrap">
   <div class="form-item"> 
       <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
       <button type="reset" value="Poništi">Poništi</button> 
       <button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
       <button type="submit" name="delete" value="Izbriši"> Izbriši</button> 
    </div>
    </div>
</form>
<br />
<br />
</div>'; }

if(isset($_POST['delete'])){ 
    $id=$_POST['id']; $query = "DELETE FROM vijesti WHERE id=$id ";
     $result = mysqli_query($dbc, $query); 
    }

if(isset($_POST['update'])){ 
    $picture = $_FILES['picture']['name']; 
    $title=$_POST['title']; $about=$_POST['about']; 
    $content=$_POST['content']; $category=$_POST['category']; 

    if(isset($_POST['archive'])){ 
        $archive=1; 
    }
    else{ $archive=0; } 
    $target_dir = 'img/'.$picture; move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir); 
    $id=$_POST['id']; $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id "; $result = mysqli_query($dbc, $query);
 }

?>

 <footer><div class="container"><h4><hr>&copy; Lovro Bolanča  e-mail: lbolanca@tvz.hr  godina: 2021.</h4></div></footer>
</body>
</html>