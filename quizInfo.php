<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Info</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="css/quizInfo.css">
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

    if(isset($_POST['question1'])) {
        
        // quiz code generate    
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
    
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }

        $query = $db->query("SELECT id FROM quizzes ORDER BY id desc LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        
        (isset($query['id'])) ? $lastId = $query['id'] : $lastId = "0";
        
        $quizId = $lastId + 1;
        $query = $db->prepare("INSERT INTO quizzes(id,code) VALUES (?,?)");
        $query->execute(array($quizId,$code));

        // questions
        $question1 = $_POST['question1'];
        $answer11 = $_POST['answer11'];
        $answer12 = $_POST['answer12'];
        $answer13 = $_POST['answer13'];
        $answer14 = $_POST['answer14'];
        $correct1 = $_POST['correct1'];
        
        $question2 = $_POST['question2'];
        $answer21 = $_POST['answer21'];
        $answer22 = $_POST['answer22'];
        $answer23 = $_POST['answer23'];
        $answer24 = $_POST['answer24'];
        $correct2 = $_POST['correct2'];

        $question3 = $_POST['question3'];
        $answer31 = $_POST['answer31'];
        $answer32 = $_POST['answer32'];
        $answer33 = $_POST['answer33'];
        $answer34 = $_POST['answer34'];
        $correct3 = $_POST['correct3'];

        $question4 = $_POST['question4'];
        $answer41 = $_POST['answer41'];
        $answer42 = $_POST['answer42'];
        $answer43 = $_POST['answer43'];
        $answer44 = $_POST['answer44'];
        $correct4 = $_POST['correct4'];

        $question5 = $_POST['question5'];
        $answer51 = $_POST['answer51'];
        $answer52 = $_POST['answer52'];
        $answer53 = $_POST['answer53'];
        $answer54 = $_POST['answer54'];
        $correct5 = $_POST['correct5'];       

        $query = $db->prepare("INSERT INTO questions(quizId,question,answer1,answer2,answer3,answer4,correctAnswer) VALUES (?,?,?,?,?,?,?)");
        $query->execute(array($quizId,$question1,$answer11,$answer12,$answer13,$answer14,$correct1));
        $query->execute(array($quizId,$question2,$answer21,$answer22,$answer23,$answer24,$correct2));
        $query->execute(array($quizId,$question3,$answer31,$answer32,$answer33,$answer34,$correct3));
        $query->execute(array($quizId,$question4,$answer41,$answer42,$answer43,$answer44,$correct4));
        $query->execute(array($quizId,$question5,$answer51,$answer52,$answer53,$answer54,$correct5));
        
    }
?>

    
    <div class="container">
        <p>Sınav Kaydedilmiştir.</p>
        <p>Sınav Kodu: <h4><?=$code?></h4></p>
        <a href="homepage.php"><p>Anasayfaya dön</p></a>
    </div>
    
</body>
</html>