<!DOCTYPE html>
<html lang="PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Vídeos</title>
  <link rel="stylesheet" href="../css/addvideo.css">
  <link rel="stylesheet" href="../css/navbar.css?=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php
  include("../navbar.php");
  include("../conexao.php");
  if (isset($_SESSION['VideoEnviado'])) {
    echo "<script> window.alert('Vídeo Enviado');</script>";
    unset($_SESSION["VideoEnviado"]);
  }
  //aparecer as materias existentes no input 
  $sql = "SELECT nome from materia";
  $result = mysqli_query($conexao, $sql);
  while ($row = $result->fetch_assoc()) {
    $materias_disponiveis[] = $row['nome'];
  }

  ?>
  <center>
    <div class="container-addvideo">
    <form action="videoprocess.php" method="POST" enctype="multipart/form-data" class="form-addvideo">

      <label for="materia">Matéria:</label>
      <select name="materia" placeholder="matemática..." list="faixa" required>
        <datalist id="faixa">
          <?php foreach ($materias_disponiveis as $valor => $nome) {

            echo "<option value='$materias_disponiveis[$valor]'>$materias_disponiveis[$valor]</option>";
          } ?>
      </select>

      </datalist>

      <br>
      <br>
      <label for="nomev">Nome do vídeo:</label>
      <input type="text" name="nomev" maxlength="100" placeholder="Aula de Fração..." required>
      <br>
      <br>
      <label for="descricao">Descrição:</label>
      <input type="text" name="descricao" maxlength="200" placeholder="matemática..." class="form-addvideo">
      <br>
      <br>
      <label for="link">Envie o vídeo:</label>
      <input type="text" name="link" minlength="30" maxlength="43" required class="form-addvideo">
      <br>
      <br>
      <button type="submit" name="enviar">Envie o vídeo</button>
    </form>
    </div> 
  </center>
</body>

</html>