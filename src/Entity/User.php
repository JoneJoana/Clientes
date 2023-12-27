<?php

namespace App\Entity;

class User
{
     protected $name = "";
     protected $surname = "";
     protected $age = null;

     public function getName(): string
     {
        return $this->name;
     }

     public function setName(string $name): void
     {
        $this->name = $name;
     }

     public function getSurname(): string
     {
        return $this->surname;
     }

     public function setSurname(string $surname): void
     {
        $this->surname = $surname;
     }

     public function getAge(): ?int
     {
        return $this->age;
     }

     public function setAge(int $age): void
     {
        $this->age = $age;
     }
}