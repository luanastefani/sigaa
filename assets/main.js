function selecionarPerfil(tipo) {
  document.getElementById('tipoUsuario').value = tipo;

  const botoes = document.querySelectorAll('.perfil-buttons button');
  botoes.forEach(btn => btn.classList.remove('ativo'));

  event.target.classList.add('ativo');
}
