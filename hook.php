<?php
/**
 * Menegaro Core - Hooks adicionais
 * Aqui você pode registrar eventos, abas extras, etc.
 */

if (!defined('GLPI_ROOT')) {
   die('Direct access not allowed');
}

// Exemplo de função utilitária para checar se é HML
function menegaro_core_is_hml_host(): bool {
   $host = $_SERVER['HTTP_HOST'] ?? '';
   return (bool) preg_match('/(hml|homolog|teste)/i', $host);
}

// Você pode adicionar outros hooks conforme sua necessidade futuramente.
// Por ora, deixamos o básico no setup.php (menu + CSS/JS).
