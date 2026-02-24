<?php
echo "Welcome to the jar Game\n";
echo "Choose a Jar between 0 and 4\nIf you find 3 keys you win, if it's a snake you loose.\n";

function chooseDifficulty(){
    $levelMode = readline("Choose difficulty: easy, mid, hard\n");
    if ($levelMode == "easy") {
        $jar = ["key", "key", "key", "key", "snake"];
    }
    elseif ($levelMode == "mid") {
        $jar = ["key", "key", "key", "snake", "snake"];
    }
    elseif ($levelMode == "hard") {
        $jar = ["key", "key", "snake", "snake", "snake"];
    }
    else {
        echo "Invalid difficulty. Please choose easy, mid, or hard.\n";
        return chooseDifficulty();
    };
    return $jar;
}


function game ($jar, &$points, &$playerLoose) {
    $userChoice = readline("Choose a jar between 0 and 4\n");
    if (!is_numeric($userChoice) || $userChoice < 0 || $userChoice >4) {
        $userChoice = readline("Choose a jar between 0 and 4: \n");
    };
    $userChoice = (int)$userChoice;

    echo "You chose the Jar N°: " . $userChoice;
    if ($jar[$userChoice] == "snake") {
        echo "That's a snake, You loose\n";
        $playerLoose = true;
        return;
    }
    else{
        echo "You found a Key, you got +1 point\n";
        $points += 1;
    };
};

$prompt ="";

while ($prompt != "Q") {
    $points = 0;
    $playerLoose = false;
    $jar = chooseDifficulty();
    while ($points < 3 && $playerLoose == false) {
        shuffle($jar);
        game($jar, $points, $playerLoose);
    }
    if ($points == 3) {
        echo "Congrats, you found $points keys, YOU WIN\n";
    }
    else {
        echo "Game over, you got $points points\n";
    };
    $prompt = readline("Press Enter to play again or Q to quit: \n");
}
?>