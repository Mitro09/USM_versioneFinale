<?php
namespace sarassoroberto\usm\entity;

class Hobby{

    private $InteressiId;
    private $nomeInteresse;


    public function __construct($nomeInteresse)
    {
        $this->nomeInteresse = $nomeInteresse;
    }

    public function getInteresse(){
        return $this->nomeInteresse;
    }

    public function getInteressiId(){
        return $this->InteressiId;
    }
}
