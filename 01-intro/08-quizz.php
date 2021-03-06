<!doctype html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
  <?php
      function createQuizz ($arr) {
        // je prend un index au hasard
        $randomIndex = rand(0, count($arr) - 1);

        // je recupere la future bonne réponse associé à cet index dans le tableau de quizz
        $chosen = $arr[$randomIndex];

        // je supprime du tableau de quizz la future bonne réponse
        array_splice($arr, $randomIndex, 1);

        // je crée un nouveau tableau pour mettre les 4 réponses
        $answers = array();

        // je met la bone réponse dans le tableau des 4 réponses
        array_push($answers, $chosen["answer"]);

        // je mets 3 mauvaises réponses dans le tableau des réponses
        for($i = 0; $i < 3; $i++) {
            $index = rand(0, count($arr) - 1);
            array_push($answers, $arr[$index]["answer"]);
            array_splice($arr, $index, 1);
        }

        shuffle($answers);
        $rightIndex = array_search($chosen["answer"], $answers);


        return array(
            "question" => $chosen["question"],
            "answers" => $answers,
            "index" =>  $rightIndex
        );
    }

    $quizz = array(
        array("question" => "Hélium", "answer" => "He"),
        array("question" => "Hydrogène", "answer" => "H"),
        array("question" => "Lithium", "answer" => "Li"), 
        array("question" => "Béryllium", "answer" => "Be"), 
        array("question" => "Bore", "answer" => "B"),
        array("question" => "Carbone", "answer" => "C"),
        array("question" => "Azote", "answer" => "N"),
        array("question" => "Oxygène", "answer" => "O")    
    );

    $quizzInfo = createQuizz($quizz);
    echo "<section>";
    echo "  <h3>Quel est le symbole de « " . $quizzInfo["question"] . " » dans le tableau périodique des éléments ?</h3>";
    echo "  <div class=\"d-flex justify-content-around\">";
    foreach ($quizzInfo["answers"] as $answer) {
        echo "      <button class=\"btn btn-secondary btn-lg\">$answer</button>";
    }
    echo "  </div>";
    echo "</section>";
    ?>
</div>

</body>
</html>
