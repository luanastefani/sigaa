document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  if (!form) return;

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value.trim();

    const usuarios = {
      coordenador: { email: "coordenador@faculdade.com", senha: "1234" },
      professor: { email: "professor@faculdade.com", senha: "1234" },
      aluno: { email: "aluno@faculdade.com", senha: "1234" },
    };

    const paginaAtual = window.location.pathname;
    const paginaAtualHref = window.location.href;
    const tituloPagina = document.title;
    
    console.log("Current page path:", paginaAtual);
    console.log("Current page href:", paginaAtualHref);
    console.log("Current page title:", tituloPagina);

    if (paginaAtual.includes("login_coordenador") || paginaAtualHref.includes("login_coordenador") || tituloPagina.includes("Coordenador")) {
      console.log("Detected coordenador login page");
      if (
        email === usuarios.coordenador.email &&
        senha === usuarios.coordenador.senha
      ) {
        console.log("Redirecting to coordenador dashboard");
        window.location.href = "pages/coordenador/dashboard.html";
      } else {
        alert("E-mail ou senha incorretos para o coordenador!");
      }
    } else if (paginaAtual.includes("login_professor") || paginaAtualHref.includes("login_professor") || tituloPagina.includes("Professor")) {
      console.log("Detected professor login page");
      if (
        email === usuarios.professor.email &&
        senha === usuarios.professor.senha
      ) {
        console.log("Redirecting to professor dashboard");
        window.location.href = "pages/professor/professor.html";
      } else {
        alert("E-mail ou senha incorretos para o professor!");
      }
    } else if (paginaAtual.includes("login_aluno") || paginaAtualHref.includes("login_aluno") || tituloPagina.includes("Aluno")) {
      console.log("Detected aluno login page");
      if (
        email === usuarios.aluno.email &&
        senha === usuarios.aluno.senha
      ) {
        console.log("Redirecting to aluno dashboard");
        window.location.href = "pages/aluno/dashboard_test.html";
      } else {
        alert("E-mail ou senha incorretos para o aluno!");
      }
    } else {
      console.log("No matching login page detected");
      alert("Página de login não reconhecida!");
    }
  });
});