<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\BeforeAfterDto;
use App\Core\Dashboard\Repository\BeforeAfter\BeforeAfterInterface;
use App\Core\Trait\FileTrait;

class BeforeAfterService
{

    use FileTrait;
    public $beforeAfterInterface;

    public function __construct(BeforeAfterInterface $beforeAfterInterface)
    {

        $this->beforeAfterInterface = $beforeAfterInterface;
    }

    public function create(BeforeAfterDto $beforeAfterDto)
    {


        $this->beforeAfterInterface->create($beforeAfterDto);

        FileTrait::uploade($beforeAfterDto->getImageBeforeFile(), $beforeAfterDto->getImageBeforeName(), 'Articles/BeforeAndAfter', 'uploades');
        FileTrait::uploade($beforeAfterDto->getImageAfterFile(), $beforeAfterDto->getImageAfterName(), 'Articles/BeforeAndAfter', 'uploades');
    }
}
