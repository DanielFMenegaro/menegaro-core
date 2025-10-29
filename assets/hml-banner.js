// Injeta o banner de HOMOLOGAÇÃO automaticamente em HML.
// Critério: hostname contém "hml" ou "homolog" ou "teste"

(function () {
  try {
    var host = (window.location && window.location.hostname || '').toLowerCase();
    var isHML = /(hml|homolog|teste)/.test(host);
    if (!isHML) return;

    var banner = document.createElement('div');
    banner.className = 'menegaro-hml-banner';
    banner.textContent = '⚠ AMBIENTE DE HOMOLOGAÇÃO — E-mails BLOQUEADOS — Uso interno de testes';

    document.addEventListener('DOMContentLoaded', function () {
      document.body.classList.add('menegaro-hml-has-banner');
      document.body.appendChild(banner);
    });
  } catch (e) {
    // silencioso
    console && console.warn && console.warn('[menegaro-core] hml-banner error:', e);
  }
})();
