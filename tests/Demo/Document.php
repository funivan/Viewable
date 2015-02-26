<?php

  namespace Tests\Funivan\Viewable\Demo;

  class Document {

    use \Funivan\Viewable\Viewable;


    public function getCustomDoc($path, $data = []) {
      return $this->renderView($path, $data);
    }

  }