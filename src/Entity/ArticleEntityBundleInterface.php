<?php

namespace Drupal\accenture\Entity;

use Drupal\node\NodeInterface;

interface ArticleEntityBundleInterface extends NodeInterface {

/**
   * Returns the id.
   *
   * @return string
   */
  public function getId(): string;

 /**
   * Returns the title.
   *
   * @return string
   */
  public function getTitle(): string;

   /**
   * Returns the body.
   *
   * @return string
   */
  public function getBody(): string;

   /**
   * Returns the image url.
   *
   * @return string
   */
  public function getImage(): string;

/**
   * Returns the node path.
   *
   * @return string
   */
  public function getPath(): string;

/**
   * Returns the node bundle.
   *
   * @return string
   */
  public function getBundle(): string;
}