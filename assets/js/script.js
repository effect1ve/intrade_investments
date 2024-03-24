
document.addEventListener("DOMContentLoaded", function() {
    
    var form = document.getElementById('myForm');

    // Обработчик события на отправку формы
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // FormData для сбора данных формы
        var formData = new FormData(this);

        // XMLHttpRequest для отправки данных формы без перезагрузки страницы
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'send_email.php'); // замените на путь к вашему скрипту

        // Событие, на случай успешной отправки формы
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Форма успешно отправлена');
            } else {
                alert('Произошла ошибка при отправке формы: ' + xhr.responseText);
            }
        };

        // Отправляем данные
        xhr.send(formData);
    });

});


