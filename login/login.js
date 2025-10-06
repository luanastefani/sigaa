document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const email = form.querySelector('input[type="email"]').value.trim();
    const senha = form.querySelector('input[type="password"]').value.trim();

    if (!email || !senha) {
      showError("Preencha e-mail e senha.");
      return;
    }

    fetch("login.php", {
      method: "POST",
      body: new URLSearchParams({ email, senha }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          window.location.href = data.redirect;
        } else {
          showError(data.message);
        }
      })
      .catch(() => showError("Erro ao conectar."));
  });

  function showError(msg) {
    let err = document.querySelector(".login-erro");
    if (!err) {
      err = document.createElement("p");
      err.className = "login-erro";
      err.style.color = "#ff8080";
      err.style.marginTop = "10px";
      form.appendChild(err);
    }
    err.textContent = msg;
  }
});
