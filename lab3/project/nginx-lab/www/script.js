const form = document.getElementById("foodForm");

form.addEventListener("submit", function(event) {
    event.preventDefault();

    const name = form.name.value;
    const quantity = form.quantity.value;
    const dish = form.dish.value;
    const sauce = form.sauce.checked ? "с соусом" : "без соуса";
    const delivery = form.delivery.value;

    alert(
    "Заказ оформлен!\n" +
    "Имя: " + name + "\n" +
    "Порций: " + quantity + "\n" +
    "Блюдо: " + dish + "\n" +
    "Дополнительно: " + sauce + "\n" +
    "Тип доставки: " + delivery
    );
});
