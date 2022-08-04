<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Book Fan Reading Log">
        <meta name="keywords" content="books, reading, log, fiction">
        <meta name="author" content="GLA">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Reviews</title>
        <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
        <link rel="stylesheet" href="css/layout.css">
    </head>
    <body>
        <script>
            function checkGuess(guess) {
                if (typeof guess !== 'string') {
                    return false;
                }

                const guess_num = Number(guess);

                if (Number.isInteger(guess_num) && guess_num > 0 && guess_num <= 100) {
                    return true;
                }

                return false;
            }

            const num = Math.floor(Math.random() * 100);
            var playing = true;
            var guesses = 0;

            while (playing) {
                guesses++;
                var guess = prompt('guess a number between 1 and 100\n(or type "quit" or "exit" to quit)');

                if (guess == 'quit' || guess == 'exit') {
                    while (true) {
                        alert('HAHAHA NEVER!!!\n⢿⣿⣿⣿⣭⠹⠛⠛⠛⢿⣿⣿⣿⣿⡿⣿⠷⠶⠿⢻⣿⣛⣦⣙⠻⣿\n⣿⣿⢿⣿⠏⠀⠀⡀⠀⠈⣿⢛⣽⣜⠯⣽⠀⠀⠀⠀⠙⢿⣷⣻⡀⢿\n⠐⠛⢿⣾⣖⣤⡀⠀⢀⡰⠿⢷⣶⣿⡇⠻⣖⣒⣒⣶⣿⣿⡟⢙⣶⣮\n⣤⠀⠀⠛⠻⠗⠿⠿⣯⡆⣿⣛⣿⡿⠿⠮⡶⠼⠟⠙⠊⠁⠀⠸⢣⣿\n⣿⣷⡀⠀⠀⠀⠀⠠⠭⣍⡉⢩⣥⡤⠥⣤⡶⣒⠀⠀⠀⠀⠀⢰⣿⣿\n⣿⣿⡽⡄⠀⠀⠀⢿⣿⣆⣿⣧⢡⣾⣿⡇⣾⣿⡇⠀⠀⠀⠀⣿⡇⠃\n⣿⣿⣷⣻⣆⢄⠀⠈⠉⠉⠛⠛⠘⠛⠛⠛⠙⠛⠁⠀⠀⠀⠀⣿⡇⢸\n⢞⣿⣿⣷⣝⣷⣝⠦⡀⠀⠀⠀⠀⠀⠀⠀⡀⢀⠀⠀⠀⠀⠀⠛⣿⠈\n⣦⡑⠛⣟⢿⡿⣿⣷⣝⢧⡀⠀⠀⣶⣸⡇⣿⢸⣧⠀⠀⠀⠀⢸⡿⡆\n⣿⣿⣷⣮⣭⣍⡛⠻⢿⣷⠿⣶⣶⣬⣬⣁⣉⣀⣀⣁⡤⢴⣺⣾⣽⡇');
                    }
                } else if (checkGuess(guess) !== true) {
                    alert('invalid guess, try again');
                } else {
                    if (guess == num) {
                        alert(`correct! the number was ${num}\nYou guessed it in ${guesses} guesses`);
                        playing = false;
                    } else if (guess > num) {
                        alert('the number is lower than ' + guess);
                    } else {
                        alert('the number is higher than ' + guess);
                    }
                }
                
            }
        </script>
    </body>
</html>