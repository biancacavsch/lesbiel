const form = document.getElementById('indicarForm');
const success = document.getElementById('formSuccess');

if (form && success) {
  document.querySelector('[name="_timestamp"]').value = Date.now();

  form.addEventListener('submit', function(e) {
    if (this.website.value) {
      e.preventDefault();
      return;
    }

    const elapsed = Date.now() - parseInt(document.querySelector('[name="_timestamp"]').value);
    if (elapsed < 3000) {
      e.preventDefault();
      return;
    }

    if (!document.getElementById('consent').checked) {
      e.preventDefault();
      alert('É necessário concordar com a política de privacidade para enviar a indicação.');
      return;
    }

    e.preventDefault();

    const data = new FormData(this);
    fetch('https://api.web3forms.com/submit', {
      method: 'POST',
      body: data
    }).then(res => res.json()).then(result => {
      if (result.success) {
        form.style.display = 'none';
        success.style.display = 'block';
      } else {
        alert('Erro ao enviar. Tente novamente.');
      }
    }).catch(() => {
      alert('Erro de conexão. Tente novamente.');
    });
  });
}
