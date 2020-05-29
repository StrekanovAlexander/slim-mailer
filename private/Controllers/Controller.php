<?php

namespace App\Controllers;

class Controller 
{

  protected $c;

  public function __construct($c)
  {
    $this->c = $c;
  }

  public function __get($property)
  {
    if ($this->c->{$property}) {
      return $this->c->{$property};
    }
  }
  
}