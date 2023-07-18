<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="css/homepage.css">    
</head>
<body>


  <form action="quiz.php" id="login-form"> 

    <div class="box left">
      <div class="heading">Sınava katıl</div>
      <label for="code">Sınav kodu gir</label> <br>
      <input type="text" name="code" id="code"> <br>
      <button class="btn btn-danger" type="submit">Katıl</button>       
    </div>

    <div class="box right">
      <div class="heading">Sınav oluştur</div>
      <a class="btn btn-danger mt-5 ms-2" href="quizAdd.php" type="button">Oluştur</a>
    </div>

  </form>  
    
</body>
</html>