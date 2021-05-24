<?php
namespace sarassoroberto\usm\entity;

class Hobby{

    private $interessiId;
    private $nomeInteresse;


    public function __construct($nomeInteresse)
    {
        $this->nomeInteresse = $nomeInteresse;
    }

    public function getInteresse(){
        return $this->nomeInteresse;
    }
}
