<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="css/quizResults.css">
</head>
<body>

    <?php
        // connection
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

        // score calculation
        $quizId = $_POST['quizId'];
        $quiz = $db->query("SELECT correctAnswer FROM questions WHERE quizId='$quizId'")->fetchAll(PDO::FETCH_ASSOC);
        $userAnswers = array($_POST['answer1'],$_POST['answer2'],$_POST['answer3'],$_POST['answer4'],$_POST['answer5']); 
        $score = 0;
        for($i=0; $i<5; $i++) {
            if($userAnswers[$i] == $quiz[$i]['correctAnswer'])
                $score = $score + 20;
        }

        // score save
        $name = $_POST['name'];
        $query = $db->prepare("INSERT INTO scores(quizId,nickName,score) VALUES (?,?,?)");
        $query->execute(array($quizId,$name,$score));

        // get top 3 scores
        $scores = $db->query("SELECT nickName,score FROM scores WHERE quizId='$quizId' ORDER BY score desc LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="myResult">
            <p>Sınav Tamamlanmıştır.</p>
            <p>Sınav Notun: <?=$score?></p>
            <a href="homePage.php"><p>Anasayfaya dön</p></a>
        </div>
        <div class="topResults">
            <table class="table table-striped">
                <thead class="table-danger">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Not</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<count($scores); $i++) {?>
                    <tr>
                        <th scope="row"><?=$i+1?></th>
                        <td><?=$scores[$i]['nickName']?></td>
                        <td><?=$scores[$i]['score']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div>
    
</body>
</html>