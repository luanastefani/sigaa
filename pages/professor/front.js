
function showSection(sectionId) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
    });

    const selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.classList.add('active');
    }
    
    hideMessage();
}

function submitForm(event, tipo) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    formData.append('tipo', tipo);
    
    fetch('back_end.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage(data.message, 'success');
            form.reset();
        } else {
            showMessage(data.message, 'error');
        }
    })
    .catch(error => {
        showMessage('Erro ao processar requisição: ' + error, 'error');
    });
}

function showMessage(message, type) {
    const messageBox = document.getElementById('messageBox');
    messageBox.textContent = message;
    messageBox.className = 'message ' + type;
    messageBox.style.display = 'block';
    
    setTimeout(() => {
        hideMessage();
    }, 5000);
}
function hideMessage() {
    const messageBox = document.getElementById('messageBox');
    messageBox.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    showSection('atividade');
});