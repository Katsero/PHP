const display = document.getElementById("display");
const errorDisplay = document.createElement("div");
errorDisplay.id = "error-display";
errorDisplay.style.color = "red";
errorDisplay.style.fontSize = "14px";
errorDisplay.style.marginTop = "10px";
document.body.appendChild(errorDisplay);

const allowedKeys = [
  "0",
  "1",
  "2",
  "3",
  "4",
  "5",
  "6",
  "7",
  "8",
  "9",
  "+",
  "-",
  "*",
  "/",
  "(",
  ")",
  ".",
  "Backspace",
  "Delete",
  "sin",
  "cos",
  "tan",
  "cot",
];

display.addEventListener("keydown", function (event) {
  const key = event.key;

  if (!allowedKeys.includes(key)) {
    event.preventDefault();
    return;
  }

  if (key === "Backspace" || key === "Delete") {
    display.value = display.value.slice(0, -1);
    event.preventDefault();
    return;
  }

  if (key === "Enter") {
    calculate();
    event.preventDefault();
    return;
  }

  appendValue(key);
});

function appendValue(value) {
  display.value += value;
}

function clearDisplay() {
  display.value = "";
}

async function calculate() {
  const expression = display.value.trim();

  if (!expression) {
    showError("Ошибка: Введите математическое выражение");
    return;
  }

  if (expression.includes("/ 0")) {
    showError("Ошибка: Деление на ноль недопустимо");
    return;
  }

  if (expression.length === 1 && !["+", "-", "*", "/"].includes(expression)) {
    showError("Ошибка: Некорректное выражение");
    return;
  }

  try {
    const response = await fetch("calculator.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `expression=${encodeURIComponent(expression)}`,
    });

    if (!response.ok) {
      throw new Error("Ошибка сервера");
    }

    const result = await response.text();

    if (result.startsWith("Ошибка:")) {
      showError(result);
    } else {
      display.value = result;
      hideError();
    }
  } catch (error) {
    showError(`Ошибка при вычислении: ${error.message}`);
  }
}

function showError(message) {
  errorDisplay.textContent = message;
  errorDisplay.style.display = "block";
}

function hideError() {
  errorDisplay.style.display = "none";
}
