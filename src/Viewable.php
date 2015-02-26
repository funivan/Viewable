<?php

  namespace Funivan\Viewable;

  trait Viewable {

    /**
     * @param string $viewId
     * @param array $data
     * @return string
     */
    protected function renderView($viewId, $data = array()) {

      if (!is_string($viewId)) {
        throw new \InvalidArgumentException("Expect view id as string. Given " . gettype($viewId));
      }

      if (strpos($viewId, DIRECTORY_SEPARATOR) !== false) {
        throw new \InvalidArgumentException("Invalid view id. Symbol not allowed: " . DIRECTORY_SEPARATOR);
      }

      if (!is_array($data)) {
        throw new \InvalidArgumentException("Expect array of data. Given " . gettype($data));
      }

      $reflector = new \ReflectionClass($this);
      $fn = $reflector->getFileName();
      $dir = dirname($fn);

      $viewFilePath = $dir . '/views/' . $viewId . '.html';

      if (!is_file($viewFilePath)) {
        throw new \InvalidArgumentException("Invalid view Id " . $viewId . ". No such file:" . $viewFilePath);
      }

      ob_start();
      extract($data);
      /** @noinspection PhpIncludeInspection */
      include $viewFilePath;
      return ob_get_clean();
    }

  }
