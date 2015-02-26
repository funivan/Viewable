<?php

  namespace Tests\Funivan\Viewable;

  class ViewableTest extends \PHPUnit_Framework_TestCase {

    public function testRender() {
      $email = new \Tests\Funivan\Viewable\Demo\Email("funivan");
      $htmlBody = $email->getBody();
      $this->assertNotEmpty($htmlBody);
      $this->assertEquals("Hi funivan", $htmlBody);


      $email = new \Tests\Funivan\Viewable\Demo\Email("other custom text");
      $htmlBody = $email->getBody();
      $this->assertNotEmpty($htmlBody);
      $this->assertEquals("Hi other custom text", $htmlBody);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidPath() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc(new \stdClass());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidPathAsNull() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc(null);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidData() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc('test', null);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidDataAsInvalidObject() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc('test', new \stdClass());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidDataAsDataObject() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc('test', new \Tests\Funivan\Viewable\Demo\Data());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidFile() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc('test');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidViewId() {
      $doc = new \Tests\Funivan\Viewable\Demo\Document();
      $doc->getCustomDoc('test/d');
    }

  }
