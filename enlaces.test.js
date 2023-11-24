
const { JSDOM } = require('jsdom');

// Simula el documento HTML
const html = `
<!DOCTYPE html>
<html>
<head>
    <title>Compra de Boletos</title>
</head>
<body>
    <header>
        <a class="navbar-brand" href="boletos.html">
            <img src="Resource/Logo.png" width="45" height="40" alt="Ticketmaster Logo">
            Ticketmaster
        </a>
    </header>

    <h1>Compra de Boletos</h1>
    <div class="options">
        <a href="Teatro/teatro.html" class="href-button">Comprar boletos de Teatro</a>
        <a href="Cine/cine.html" class="href-button">Comprar boletos de Cine</a>
        <a href="Museo/museo.html" class="href-button">Comprar boletos de Museo</a>
    </div>
</body>
</html>
`;

// Configura el entorno de jsdom antes de las pruebas
const dom = new JSDOM(html, { runScripts: 'dangerously' });
global.document = dom.window.document;

//Zona de pruebas
describe('HTML Tests', () => {
  test('Validar que exista un enlace a la página de Teatro', () => {
    const link = document.querySelector('a[href="Teatro/teatro.html"]');
    expect(link).not.toBeNull();
  });

  test('Validar que exista un enlace a la página de Cine', () => {
    const link = document.querySelector('a[href="Cine/cine.html"]');
    expect(link).not.toBeNull();
  });

  test('Validar que exista un enlace a la página de Museo', () => {
    const link = document.querySelector('a[href="Museo/museo.html"]');
    expect(link).not.toBeNull();
  });

  test('La imagen se carga con la ruta correcta', () => {
    const img = document.querySelector('img[src="Resource/Logo.png"]');
    expect(img).not.toBeNull();
  });
});
