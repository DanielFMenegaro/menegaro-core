# Menegaro Core (GLPI 11.0.1+)

Plugin oficial da Menegaro para personalizações no GLPI **sem alterar o core**.

## Compatibilidade
- GLPI **>= 11.0.0** (testado em 11.0.1)

## Instalação
1. Copie o diretório `menegaro-core` para:
   - `<glpi>/plugins/menegaro-core` **ou**
   - use um diretório compartilhado e crie um symlink:
     ```
     ln -s /srv/plugins/menegaro-core /srv/glpi-hml/plugins/menegaro-core
     ```
2. Permissões:

chown -R www-data:www-data <caminho>/menegaro-core

3. No GLPI: **Configurações → Plugins → Menegaro Core → Instalar/Ativar**.

## Recursos incluídos
- Entrada de **menu “Menegaro”** apontando para `front/home.php`
- Página `home.twig` (Twig) com console básico
- **Banner automático de HOMOLOGAÇÃO** (CSS/JS) quando o host conter `hml`, `homolog` ou `teste`

## Fluxo de desenvolvimento
- Edite localmente → `git push`
- No servidor HML:

cd /srv/plugins/menegaro-core
git fetch --all
git checkout main
git pull --ff-only
php /srv/glpi-hml/bin/console glpi:cache:clear
php /srv/glpi-hml/bin/console glpi:database:upgrade || true

- Teste. Depois **tag** (ex.: `v1.0.0`) para deploy em PRD.

## Licença
GPLv3+

