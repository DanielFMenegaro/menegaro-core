<?php
/**
 * Página inicial do plugin (menu "Menegaro")
 */

use Glpi\Application\View\TemplateRenderer;

include ('../../../inc/includes.php');

// Exigir direitos mínimos (ajuste conforme seu caso)
// Aqui usamos direito de leitura em Configuração:
Session::checkRight("config", READ);

// Cabeçalho padrão GLPI
Html::header(
   __('Menegaro', 'menegaro_core'),
   $_SERVER['PHP_SELF'],
   'config', // árvore do menu. pode ser 'config', 'tools', etc.
   'menegaro_core' // identificador do plugin
);

// Renderização Twig
$renderer = TemplateRenderer::getInstance();

// Dados passados ao template
$vars = [
   'glpi_version' => GLPI_VERSION,
   'plugin_version' => '1.0.0',
   'is_hml' => function_exists('menegaro_core_is_hml_host') ? menegaro_core_is_hml_host() : false,
   'hostname' => getGlpiConfig('url_base', '') // pode estar vazio se não configurado
];

// Em GLPI 11, os templates de plugins podem ser chamados com namespace @plugin
echo $renderer->render('@menegaro_core/home.twig', $vars);

// Rodapé GLPI
Html::footer();
