<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="css/quiz.css">
</head>
<body>

    <?php 
        //connection
        $dsn = 'mysql:host=localhost;dbname=quiz;charset=utf8';
        $user = 'root'; 
        $pswd = ''; 

        try{
            $db = new PDO($dsn, $user, $pswd); 
        }
        catch(Exception $e){ 
            echo "Bağlantı başarısız";
            echo "Hata: ",$e->getMessage(); 
        }

        // quiz defined ?
        $code = $_GET['code'];
        try {
            $query = $db->query("SELECT id FROM quizzes WHERE code='$code'")->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e) {
            $query = "null";
        }
        if(isset($query['id']) == false) {
    ?>
    <form action="#">
        <div class="heading">
            <h4>Hatalı sınav kodu</h4>
            <a href="homepage.php"><p>Anasayfaya dön</p></a>
        </div>
    </form>

    <?php } 
        else {
            // get questions
            $quizId = $query['id'];
            $quiz = $db->query("SELECT * FROM questions WHERE quizId='$quizId'")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <form action="quizResults.php" method="POST">
        <div class="heading">
            <p>İsminizi giriniz:</p>
            <input type="text" name="name" required>
        </div>
        <?php for($i=0; $i<5; $i++) {?>
        <div class="group">
            <h5>Soru <?= $i+1 ?></h5>
            <div class="questions">
                <p><?=$quiz[$i]['question']?></p>
            </div>
            <div class="answers">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer<?=$i+1?>" value="<?=$i+1?>" required>
                    <label class="form-check-label" for="answer1"><?=$quiz[$i]['answer1']?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer<?=$i+1?>" value="2">
                    <label class="form-check-label" for="answer2"><?=$quiz[$i]['answer2']?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer<?=$i+1?>" value="3">
                    <label class="form-check-label" for="answer3"><?=$quiz[$i]['answer3']?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer<?=$i+1?>" value="4">
                    <label class="form-check-label" for="answer4"><?=$quiz[$i]['answer4']?></label>
                </div>
            </div>
        </div>
        <?php } ?>
        <input type="hidden" name="quizId" value="<?=$quizId?>">
        <button class="btn btn-danger w-100" type="button" onclick="next()">Sonraki</button>
    </form>
    <?php } ?>

    <script src="js/quiz.js"></script>
    
</body>
</html>