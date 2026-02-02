const toggleIcons = document.querySelectorAll(".togglePassword");

toggleIcons.forEach(icon => {
  icon.addEventListener("click", () => {
    const input = icon.previousElementSibling;
    const type = input.type === "password" ? "text" : "password";
    input.type = type;
    icon.textContent = type === "password" ? "👁️" : "🙈";
  });
});