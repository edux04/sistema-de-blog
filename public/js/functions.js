//script para la fecha y hora en que se publicaran los articulos

const finalElement = document.querySelector("#posted_at");
const dateElement = document.querySelector("#date");
const hourElement = document.querySelector("#hour");

function updateDate(element) {
    if (element == dateElement) {
        var formatedValue = !hourElement.value
            ? element.value
            : element.value + " " + hourElement.value;
    } else if (element == hourElement) {
        var formatedValue = !dateElement.value
            ? element.value
            : dateElement.value + " " + element.value;
    }
    finalElement.value = formatedValue;
}
