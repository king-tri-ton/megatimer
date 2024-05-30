<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $timerCode = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Таймер обратного отсчета</title>
    <style>
        .timer {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .timer div {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .timer h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .countdown {
            font-size: 32px;
        }
    </style>
</head>
<body>
    <div class='timer'>
        <div>
            <h1>До конца осталось:</h1>
            <div id='countdown' class='countdown'></div>
        </div>
    </div>
    <script>
        function countdownTimer() {
            const startDate = new Date('$startDate').getTime();
            const endDate = new Date('$endDate').getTime();
            const now = new Date().getTime();

            if (now < startDate) {
                document.getElementById('countdown').innerHTML = 'Таймер еще не начался';
                return;
            }

            const distance = endDate - now;

            if (distance < 0) {
                document.getElementById('countdown').innerHTML = 'Таймер истек';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('countdown').innerHTML = days + 'д ' + hours + 'ч ' + minutes + 'м ' + seconds + 'с';

            setTimeout(countdownTimer, 1000);
        }

        countdownTimer();
    </script>
</body>
</html>
    ";

    echo htmlspecialchars($timerCode);
}
?>
