<?php

namespace Drupal\accenture\Entity;

use Drupal\node\Entity\Node;
use Drupal\Core\Url;    

class ArticleEntityBundle extends Node implements  ArticleEntityBundleInterface {

  public function getId(): string {
    return $this->id();
  }

  public function getBundle(): string {
    return $this->type->entity->label();
  }

  public function getPath(): string {
    return \Drupal::service('path_alias.manager')->getAliasByPath('/node/'.$this->id());
  }


  public function getTitle(): string {
    return $this->get('title')->value;
  }

  public function getBody(): string {
    return (isset($this->get('body')->value)) ? $this->get('body')->value : '';
  }

  public function getImage(): string {
    return (isset($this->field_image->entity->uri->value)) ? $this->field_image->entity->uri->value : '';
  }
}