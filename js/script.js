// script.js
// Funktion zum Laden von Inhalten
async function loadContent(url) {
  try {
    // Korrigiere den Pfad für lokale Dateien
    let cleanUrl = url.replace(/^\.\//, ''); 

    const response = await fetch(cleanUrl);
    if (!response.ok) throw new Error('Seite nicht gefunden');

    const html = await response.text();
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const newContent = doc.querySelector('#content').innerHTML;

    // Setze den neuen Inhalt
    document.getElementById('content').innerHTML = newContent;

    // Aktualisiere die URL im Browser
    const basePath = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
    const fullUrl = basePath + cleanUrl;
    history.pushState({ url: fullUrl }, '', fullUrl);

    // Scroll zu Top
    window.scrollTo({ top: 0, behavior: 'smooth' });
  } catch (err) {
    console.error('Fehler:', err);
    document.getElementById('content').innerHTML = '<p>Inhalt konnte nicht geladen werden.</p>';
  }
}

// Behandle Klicks auf Navigationslinks
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('#navbar a[href]').forEach(link => {
    link.addEventListener('click', (e) => {
      const href = link.getAttribute('href');
      // Ignoriere Ankerlinks und externe Links
      if (href.startsWith('#') || href.includes('http') || href.includes('facebook.com')) return;

      e.preventDefault();
      loadContent(href);
    });
  });

  // Behandle Browser-History (Vor/Zurück-Buttons)
  window.addEventListener('popstate', (e) => {
    if (e.state && e.state.url) {
      loadContent(e.state.url);
    }
  });

  // Lade den initialen Inhalt, falls nicht index.html
  const currentPath = window.location.pathname.split('/').pop() || 'index.html';
  if (currentPath !== 'index.html') {
    loadContent(currentPath);
  }
});