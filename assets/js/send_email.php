<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные
    $fullname = strip_tags(trim($_POST["fullname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Проверяем, что данные были отправлены и email валиден
    if (empty($fullname) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Сообщаем об ошибке, если проверка данных не пройдена
        http_response_code(400);
        echo "Пожалуйста, заполните форму корректно и повторите попытку.";
        exit;
    }

    // Куда будет отправлено письмо
    $recipient = "effectcatana@yandex.ru";

    // Тема письма
    $subject = "Новое сообщение от $fullname";

    // Содержание письма
    $email_content = "Имя: $fullnamen";
    $email_content .= "Email: $emailnn";
    $email_content .= "Сообщение:n$messagen";

    // Заголовки письма
    $email_headers = "From: $fullname <$email>";

    // Отправляем письмо
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Успех: сообщаем, что письмо отправлено
        http_response_code(200);
        echo "Спасибо! Ваше сообщение было отправлено.";
    } else {
        // Ошибка: сообщаем об этом
        http_response_code(500);
        echo "Ой! Что-то пошло не так и мы не смогли отправить ваше сообщение.";
    }

} else {
    // Не POST запрос, устанавливаем соответствующий статусный код ответа
    http_response_code(403);
    echo "Такой запрос не поддерживается.";
}

?>
