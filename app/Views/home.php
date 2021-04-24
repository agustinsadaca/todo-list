<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo(base_url().'/styles.css')?>">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100&display=swap" rel="stylesheet"> 
  <?php if (isset($data['js_files'])) {
    foreach ($data['css_files'] as $file):
    ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php
endforeach;
}
?>
<title>
    <?php 
        if(isset($data['title'])) 
        {
            echo $data['title'];
        }
    ?>
</title>
</head>
<?= $menu; ?>
<div class="home">
        <h2>To-do list</h1>
        <h3>Tecnologies used:</h4>
        <h3>PHP Framework: Codeigniter, library: Grocery Crud</h3>
        <h3>Javascript(Jquery,Ajax)</h3>
        <h3>use of MVC(app->Controllers,Models,Views)</h3>
</div>

<style>
    section#hero{
        background-image:url("<?php echo(base_url().'/26a.jpg')?>");
    }
    h3{
        font-size:25px;
        font-family: 'Antonio', sans-serif;    }
    h2{
        font-family: 'Antonio', sans-serif; 
        text-decoration:underline; 
      }
    .home{
        margin: 20px;
    }
</style>

</html>