<?php

namespace App\Core\Dashboard\Repository\Slider;

use App\Core\Dashboard\DTO\SliderDto;

interface SliderInterface
{


    public function all();
    public function findOrFail($id);
    public function find($id);
    public function create(SliderDto $sliderDto);
    public function update($slider, SliderDto $sliderDto);
    public function delete($slider);
}
