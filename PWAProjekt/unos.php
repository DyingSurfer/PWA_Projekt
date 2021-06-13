<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Unos vijesti</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="culture.php">Culture</a></li>
            <li><a href="sport.php">Sport</a></li>
            <li><a class="active" href="unos.php">Submit news</a></li>
            <li><a href="admin.php">Edit news</a></li>
            </div>
         </ul>
      </nav>
      <div class="container wrap">

         <form enctype="multipart/form-data" method="POST" action="" name="makenews" >
            <div class="form-item">
               <label for="title">Title:</label> 
               <div class="form-field"> 
                  <input type="text" id="title" name="title" class="form-field-textual"/>
                  <span id="porukanaslov" class="error"></span>
               </div>
            </div>
            <div class="form-item">
               <label for="about">Summary:
               </label> 
               <div class="form-field"> 
                  <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"> </textarea> 
                  <span id="porukaopis" class="error"></span>
               </div>
            </div>
            <div class="form-item">
               <label for="content">News content:</label> 
               <div class="form-field"> 
                  <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea> 
                  <span id="porukasadrzaj" class="error"></span>
               </div>
            </div>
            <div class="form-item">
               <label for="picture">Image: </label> 
               <div class="form-field"> 
                  <input type="file" class="input-text" id="picture" name="picture"/>
                  <span id="porukaslika" class="error"></span> 
               </div>
            </div>
            <div class="form-item">
               <label for="category">Category:</label>
               <div class="form-field">
                  <select name="category" id="category" class="form-field-textual">
                     <option value="" selected disabled>Choose a category</option>
                     <option value="sport">Sport</option>
                     <option value="kultura">Culture</option>
                  </select>
                  <span id="porukakategorija" class="error"></span> 
               </div>
            </div>
            <div class="form-item">
               <label>
                  Archive
                  <div class="form-field"> 
                     <input type="checkbox" name="archive"> 
                  </div>
               </label>
            </div>
            <div class="form-item"> 
               <input type ="reset" value="Cancel"/>
               <input type ="submit" value="Submit" name="prihvati" id="gumb" onclick="skripta()">
            </div>
         </form>
      </div>
      <footer>
         <div class="container">
            <h4>
               <hr>
               &copy; Lovro Bolanča  e-mail: lbolanca@tvz.hr  godina: 2021.
            </h4>
         </div>
      </footer>
      <script type="text/javascript">
                            function skripta(){
                              
                                var form_submition = true;
                                var title_okvir=document.getElementById('title');
                                var title=document.getElementById('title').value;
                                var about_okvir=document.getElementById('about');
                                var about_content=document.getElementById('about').value;
                                var content_okvir=document.getElementById('content');
                                var content=document.getElementById('content').value;
                                var picture_okvir=document.getElementById('picture');
                                var picture=document.getElementById('picture').value;
                                var category_okvir=document.getElementById('category');
                                var category=document.getElementById('category').value;
                                
                                
                                if(title.length <5 || title.length>50){
                                    form_submition = false;
                                    title_okvir.style.border="1px solid red";
                                    document.getElementById("porukanaslov").innerHTML = "Must be between 5 and 50 characters";
                                }
                                if(about_content.length<10 || about_content.length>200){
                                    form_submition = false;
                                    about_okvir.style.border="1px solid red";
                                    document.getElementById("porukaopis").innerHTML = "Must be between 10 and 200 characters";
                                }
                                if(content == ""){
                                    form_submition = false;
                                    content_okvir.style.border="1px solid red"
                                    document.getElementById("porukasadrzaj").innerHTML = "Required";
                                }
                                
                                if(picture == ""){
                                    form_submition = false;
                                    picture_okvir.style.border="1px solid red";
                                    document.getElementById("porukaslika").innerHTML = "Required";
                                }
                                if(category == ""){
                                    form_submition = false;
                                    category_okvir.style.border="1px solid red";
                                    document.getElementById("porukakategorija").innerHTML = "Required";
                                }
                                if (form_submition != true) {
                                    
                                    event.preventDefault()
                                 
                                }
                    
                            }
            </script>
      <?php 
        include 'connect.php';
        if(isset($_POST['title']) && isset($_POST['about']) && isset($_POST['content']) && isset($_POST['category'])){
        $picture = $_FILES['picture']['name'];
        $title = $_POST['title'];
        $about = $_POST['about'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $date = date('d.m.Y.');
        if (isset($_POST['archive']))
        {
            $archive = 1;
        }
        else
        {
            $archive = 0;
        }
        $target_dir = 'img/' . $picture;
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir);
        $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
        mysqli_close($dbc); 
    }
        ?>

   </body>
</html>