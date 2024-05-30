<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Конструктор таймера обратного отсчета</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Конструктор таймера обратного отсчета</h1>
        <form id="timerForm" action="generate.php" method="post">
            <label for="startDate">Начальная дата:</label>
            <input type="datetime-local" id="startDate" name="startDate" required>
            <label for="endDate">Дата окончания:</label>
            <input type="datetime-local" id="endDate" name="endDate" required>
            <button type="submit">Создать таймер</button>
        </form>
        <div id="generatedCode"></div>
    </div>
    <script src="script.js"></script>
</body>
</html>
