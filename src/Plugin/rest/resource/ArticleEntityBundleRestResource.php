<?php

namespace Drupal\accenture\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Cache\CacheableResponseInterface;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\CacheableResponseTrait;
/**
 * Provides a custom REST resource to fetch all articles.
 *
 * @RestResource(
 *   id = "article_entity_bundle_rest_resource",
 *   label = @Translation("article entity bundle rest resource"),
 *   uri_paths = {
 *     "canonical" = "/api/articles"
 *   }
 * )
 */
class ArticleEntityBundleRestResource extends ResourceBase implements CacheableResponseInterface {
  use CacheableResponseTrait;
  /**
   * Responds to GET requests.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing the requested data.
   */
  public function get(Request $request) {
    $articleStorage = \Drupal::entityTypeManager()->getStorage('node');
    $query = $articleStorage->getQuery();
    $query->condition('type', 'article');
    $query->accessCheck(TRUE);
    $nids = $query->execute();
        if(!empty($nids)) {
            $articles = $articleStorage->loadMultiple($nids);
            $data = [];
            foreach ($articles as $article) {
            $data[] = [
                'id' => $article->getId(),
                'bunlde' =>  $article->getBundle(),
                'path' => $article->getPath(),
                'title' => $article->getTitle(),
                'body' => $article->getBody(),
                'image' => $article->getImage(),
            ];
            }
        }
        else{
            $data= ['message' => 'No articles on this site'];
        }

        $cache_metadata = new CacheableMetadata();
        $cacheableMetadata->addCacheTags(['node_list']);
        $cache_metadata->setCacheMaxAge(3600); // Cache for 1 hour.
        $cache_metadata->addCacheContexts(['url.query_args']);
      
        $response = new ResourceResponse($data);
        $response->addCacheableDependency($cache_metadata);
      
        return $response;
  }
}