<?php
/**
 * Menegaro Core - Plugin para GLPI 11.0.1+
 * Inicialização do plugin, metadados e instalação.
 */

if (!defined('GLPI_ROOT')) {
   die('Direct access not allowed');
}

/**
 * Metadados e compatibilidade
 */
function plugin_version_menegaro_core() {
   return [
      'name'           => 'Menegaro Core',
      'version'        => '1.0.0',
      'author'         => 'Menegaro TI',
      'license'        => 'GPLv3+',
      'homepage'       => 'https://menegaro.com.br',
      // GLPI 11.x
      'minGlpiVersion' => '11.0'
      // Se quiser travar máximo:
      // 'maxGlpiVersion' => '11.99'
   ];
}

/**
 * Pré-requisitos (checado ao instalar/ativar)
 */
function plugin_menegaro_core_check_prerequisites() {
   if (!defined('GLPI_VERSION')) {
      return 'GLPI não detectado.';
   }
   if (version_compare(GLPI_VERSION, '11.0', '<')) {
      return 'Este plugin requer GLPI >= 11.0';
   }
   return true;
}

/**
 * Config válida?
 */
function plugin_menegaro_core_check_config() {
   return true;
}

/**
 * Inicialização de hooks e integrações
 */
function plugin_init_menegaro_core() {
   global $PLUGIN_HOOKS;

   // Segurança
   $PLUGIN_HOOKS['csrf_compliant']['menegaro_core'] = true;

   // Entrada de menu principal → aponta para nossa página
   // GLPI exibirá "Menegaro" no menu (nome vem do getMenuName abaixo)
   $PLUGIN_HOOKS['menu_entry']['menegaro_core'] = 'front/home.php';

   // Injetar CSS/JS (para o banner de HML)
   $PLUGIN_HOOKS['add_css']['menegaro_core'] = ['assets/hml-banner.css'];
   $PLUGIN_HOOKS['add_javascript']['menegaro_core'] = ['assets/hml-banner.js'];
}

/**
 * Instalação
 */
function plugin_menegaro_core_install() {
   // Espaço para futuras migrações (tabelas próprias etc.)
   return true;
}

/**
 * Desinstalação
 */
function plugin_menegaro_core_uninstall() {
   // Remover estruturas próprias se houver
   return true;
}

/**
 * Nome que aparece no menu (tradução simples)
 */
function plugin_menegaro_core_getMenuName() {
   return __('Menegaro', 'menegaro_core');
}

/**
 * Ícones ou subitens de menu (opcional). Mantemos simples.
 */
function plugin_menegaro_core_getMenuContent() {
   // Deixa o GLPI usar o menu_entry padrão para abrir front/home.php
   return [];
}
