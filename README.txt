ENVIRONMENT SETUP
1. Clone docker4drupal (https://github.com/wodby/docker4drupal) to your local directory (ex. your_project)
2. Create directory your_project/web 
3. Download Drupal (https://www.drupal.org/download) and paste to web directory
4. Run "make up" command
5. Open http://drupal.docker.localhost:8000/ in your browser
6. Install drupal

MODULE USAGE
1. Create dir web/modules/custom
2. Install and enable"Accenture" module
3. Install and enable"REST UI" module (https://www.drupal.org/project/restui)
4. Enable and configure "api/articles" under /admin/config/services/rest
5. Open /api/articles endpoint
5. Clear cache after every update of article content