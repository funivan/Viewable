<?php

  namespace Tests\Funivan\Viewable\Demo;

  class Email {

    use \Funivan\Viewable\Viewable;

    /**
     * @var string
     */
    protected $name = '';


    public function __construct($name) {
      if (!is_string($name)) {
        throw new \InvalidArgumentException("Expect name as string. Given " . gettype($name));
      }

      $this->name = $name;
    }


    public function getBody() {
      return $this->renderView('custom', [
        'name' => $this->name
      ]);
    }
    
    

  }