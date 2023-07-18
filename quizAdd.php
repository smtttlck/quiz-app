<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Add</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="css/quizAdd.css">
</head>
<body>
    <form action="quizInfo.php" method="POST">
        <div class="heading">
            <p>Sınav bilgilerini giriniz.</p>
        </div>

        <?php for($i=1; $i<=5; $i++) {?>

        <div class="group">
            <h5>Soru <?= $i ?></h5>
            <div class="questions">
                <label for="question<?=$i?>">Soru giriniz: </label>
                <textarea name="question<?=$i?>" id="question1" cols="60" rows="3" required></textarea>
            </div>
            <div class="answers">
                <label>Cevapları giriniz ve doğru cevabı işaretleyiniz: </label> <br>
                <div class="answer">
                    <input class="form-check-input" type="radio" name="correct<?=$i?>" id="radio1" value="1">
                    <input type="text" name="answer<?=$i?>1" id="answer1" required>
                </div>
                <div class="answer">
                    <input class="form-check-input" type="radio" name="correct<?=$i?>" id="radio2" value="2">
                    <input type="text" name="answer<?=$i?>2" id="answer2" required>
                </div>
                <div class="answer">
                    <input class="form-check-input" type="radio" name="correct<?=$i?>" id="radio3" value="3">
                    <input type="text"  name="answer<?=$i?>3" id="answer3" required>
                </div>
                <div class="answer">
                    <input class="form-check-input" type="radio" name="correct<?=$i?>" id="radio4" value="4">
                    <input type="text"  name="answer<?=$i?>4" id="answer4" required>
                </div>
                <input type="hidden" name="code" value="<?=$code?>">
            </div>
        </div>
        
        <?php }?>

        <button class="btn btn-danger mb-3" type="button" onclick="next()">Sonraki</button>
    </form>

    <script src="js/quiz.js"></script>
    
    
</body>
</html>