document.addEventListener("DOMContentLoaded", function () {
    var textContainer = document.getElementById("text-container");
    var text = textContainer.textContent.trim();
    if (text.length > 30) {
      textContainer.textContent = text.slice(0, 30) + "...";
    }
  });