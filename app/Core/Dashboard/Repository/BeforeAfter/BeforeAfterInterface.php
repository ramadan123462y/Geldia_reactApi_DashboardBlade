<?php

namespace App\Core\Dashboard\Repository\BeforeAfter;

use App\Core\Dashboard\DTO\BeforeAfterDto;


interface BeforeAfterInterface
{


    public function create(BeforeAfterDto $beforeAfterDto);
}
