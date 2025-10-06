// login.js

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  if (!form) return;

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value.trim();

    // Aqui simulamos um "banco de dados" com alguns logins válidos
    const usuarios = {
      coordenador: { email: "coordenador@faculdade.com", senha: "1234" },
      professor: { email: "professor@faculdade.com", senha: "1234" },
      aluno: { email: "aluno@faculdade.com", senha: "1234" },
    };

    // Verifica qual página de login o usuário está usando
    const paginaAtual = window.location.pathname;

    if (paginaAtual.includes("login-coordenador")) {
      if (
        email === usuarios.coordenador.email &&
        senha === usuarios.coordenador.senha
      ) {
        window.location.href = "coordenador.html";
      } else {
        alert("E-mail ou senha incorretos para o coordenador!");
      }
    } else if (paginaAtual.includes("login-professor")) {
      if (
        email === usuarios.professor.email &&
        senha === usuarios.professor.senha
      ) {
        window.location.href = "professor.html";
      } else {
        alert("E-mail ou senha incorretos para o professor!");
      }
    } else if (paginaAtual.includes("login-aluno")) {
      if (
        email === usuarios.aluno.email &&
        senha === usuarios.aluno.senha
      ) {
        window.location.href = "aluno.html";
      } else {
        alert("E-mail ou senha incorretos para o aluno!");
      }
    }
  });
});
