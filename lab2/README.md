# Лабораторная работа №1: Nginx + Docker

## 👩‍💻 Автор
ФИО: Громов Роман Евгеньевич

Группа: 3МО-РБД2

---

## 📌 Описание задания
Сконфигурировать веб-сервер Nginx для работы с PHP через PHP-FPM. Освоить базовые принципы PHP (на примере phpinfo()), повторить основы HTML. Освоить базовую обработку форм с помощью JavaScript без перезагрузки страницы.

Результат доступен по адресу [http://localhost:8080](http://localhost:8080).

---

## ⚙️ Как запустить проект

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/RedWolf77/Web_dev_BFU
   cd Web_dev_BFU/lab2/project/nginx-lab
Запустить контейнеры:
```bash
docker-compose up -d --build
```
Открыть в браузере:
```http://localhost:8080/form.html```

---

📸 Скриншоты работы

PHP работает:

![Работа PHP](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab2/php_works.png)

Форма HTML:

![Форма HTML](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab2/form.png)

Alert работает:

![Alert работает](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab2/alert.png)