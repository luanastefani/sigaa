function showSection(sectionId) {
  const sections = document.querySelectorAll('.section');
  sections.forEach(s => s.classList.remove('active'));

  const selected = document.getElementById(sectionId);
  if (selected) selected.classList.add('active');
  hideMessage();
}

function submitForm(event, tipo) {
  event.preventDefault();

  const form = event.target;
  const formData = new FormData(form);
  formData.append('tipo', tipo);

  fetch('back_end_coordenador.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    showMessage(data.message, data.success ? 'success' : 'error');
    if (data.success) form.reset();
  })
  .catch(err => showMessage('Erro: ' + err, 'error'));
}

function showMessage(msg, type) {
  const box = document.getElementById('messageBox');
  box.textContent = msg;
  box.className = 'message ' + type;
  box.style.display = 'block';
  setTimeout(hideMessage, 4000);
}

function hideMessage() {
  const box = document.getElementById('messageBox');
  box.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', () => showSection('professor'));
