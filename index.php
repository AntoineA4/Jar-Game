<?php
echo "Welcome to the jar Game\n";
echo "Choose a Jar between 5\nif you find a key you win, if it's a snake you loose.\n";
function initJars() {
    $jar = ["key", "key", "key", "key", "snake"];
    shuffle($jar);
    return $jar;
};

function game ($jar) {
    $userChoice = readline("Choose a jar between 0 and 4\n");
    if (!is_numeric($userChoice) || $userChoice < 0 || $userChoice >4) {
        $userChoice = readline("Choose a jar between 0 and 4: \n");
    };
    $userChoice = (int)$userChoice;

    echo "You chose the Jar N°: " . $userChoice;
    if ($jar[$userChoice] == "snake") {
        echo "That's a snake, You loose\n";
        return;
    }
    else{
        echo "You found a Key\n";
    };
};

$prompt ="";

while ($prompt != "Q") {
    $jar = initJars();
    game($jar);
    $prompt = readline("Press Enter to play again or Q to quit: \n");
}
?>