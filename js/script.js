function enviarMensaje() {
    alert('Registro enviado');
  }
  
  function crearRegistro() {
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const mensaje = document.getElementById('mensaje').value;
  
    const data = {
      nombre: nombre,
      email: email,
      mensaje: mensaje
    };
  
    fetch('/crud/crud.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(result => {
      console.log(result);
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }