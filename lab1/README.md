# Лабораторная работа №1: Nginx + Docker

## 👩‍💻 Автор
ФИО: Громов Роман Евгеньевич

Группа: 3МО-РБД2

---

## 📌 Описание задания
Создать веб-сервер в Docker с использованием Nginx и подключить HTML-страницу.  
Результат доступен по адресу [http://localhost:8080](http://localhost:8080).

---

## ⚙️ Как запустить проект

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/RedWolf77/Web_dev_BFU
   cd Web_dev_BFU/lab1/project/nginx-lab
Запустить контейнеры:
```bash
docker-compose up -d --build
```
Открыть в браузере:
```http://localhost:8080```
📂 Содержимое проекта

```docker-compose.yml``` — описание сервиса Nginx

```code/index.html``` — главная HTML-страница

```screenshots/``` — все скриншоты

---

📸 Скриншоты работы

Докер работает:

![Работа докера](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab1/docker_work.png)


Nginx работает:

![Nginx работает](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab1/nginx-work.png)


Nginx выводит HTML страничку:

![Nginx выводит HTML страничку](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab1/nginx_and_html.png)


Обновление HTML:

![Обновление HTML](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab1/html_update.png)


Новая HTML:

![Новая HTML](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab1/new_html.png)


Замена порта с 8080 на 3000:

![Замена порта](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab1/new_port.png)

---

✅ Результат
Сервер в Docker успешно запущен, Nginx отдаёт мою HTML-страницу.