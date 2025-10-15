# Лабораторная работа №3: PHP Sessions Files

## 👩‍💻 Автор
ФИО: Громов Роман Евгеньевич

Группа: 3МО-РБД2

---

## 📌 Описание задания
Обработать данные формы на стороне сервера с помощью PHP. Сохранить данные формы в сессии. Сохранить данные в файл и вывести их обратно на странице. Вывести все сохранённые данные в отдельной странице.
Изменить существующую форму, чтобы отключить JS-обработку (кроме alert) и использовать PHP.


Результат доступен по адресу [http://localhost:8080](http://localhost:8080).

---

## ⚙️ Как запустить проект

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/RedWolf77/Web_dev_BFU
   cd Web_dev_BFU/lab3/project/nginx-lab
Запустить контейнеры:
```bash
docker-compose up -d --build
```
Открыть в браузере:
```http://localhost:8080/form.html```

---

📸 Скриншоты работы

Данные из сессии выводятся:

![Данные из сессии](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab3/session.png)

Данные сохраняются в файл и выводятся:

![Данные сохраняются в файл](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab3/save.png)

Ошибки выводятся:

![Ошибки выводятся](https://github.com/RedWolf77/Web_dev_BFU/blob/main/screenshots/lab3/errors.png)