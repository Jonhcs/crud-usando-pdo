<?php

interface IProduto {
    public function setId($id);
    public function getId();
    public function setName($name);
    public function getName();
    public function setDesc($desc);
    public function getDesc();
}