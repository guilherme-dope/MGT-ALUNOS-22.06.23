<?php
require_once("funcao.php");
require_once("header.php");
revalidarLogin();
?>

<body>


<style>
.embreve {  
  margin-left: 260px;
  display: flex;
  height: 100vh;
  justify-content: center;
  align-items: center;
  padding: 20px;
  background:linear-gradient(to bottom, #ffffff 5%, #ebebeb 100%);
}

.img{
    width: 300px;
    height: 300px;
}

</style>

    <?php require_once("menu.php") ?>

    <div class="embreve">
        

       <div>
       <h1>Em manutencao...</h1>
       <div>
        <img class="img" src="https://www.pngall.com/wp-content/uploads/5/Wrench-Screwdriver-Maintenance-PNG-Free-Image.png" alt="" srcset="">
    </div>

</body>

</html>