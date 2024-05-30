document.getElementById('timerForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    if (new Date(startDate) >= new Date(endDate)) {
        alert('Дата окончания должна быть позже начальной даты.');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'generate.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            const generatedCodeDiv = document.getElementById('generatedCode');
            generatedCodeDiv.innerHTML = `<h2>Сгенерированный код:</h2><pre>${this.responseText}</pre>`;
            generatedCodeDiv.style.display = 'block';
        }
    };
    xhr.send(`startDate=${encodeURIComponent(startDate)}&endDate=${encodeURIComponent(endDate)}`);
});
