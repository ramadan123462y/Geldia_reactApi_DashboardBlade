<?php

namespace App\Core\Dashboard\Repository\Slider;

use App\Core\Dashboard\DTO\SliderDto;
use App\Models\Slider;




class SliderRepository implements SliderInterface
{


    public function all()
    {

        return Slider::all();
    }

    public function findOrFail($id)
    {

        return Slider::findOrFail($id);
    }

    public function find($id)
    {

        return Slider::find($id);
    }

    public function create(SliderDto $sliderDto)
    {


        Slider::create([

            'image_name' => $sliderDto->getImageName(),

        ]);
    }

    public function update($slider, SliderDto $sliderDto)
    {

        $slider->update([

            'image_name' => $sliderDto->getImageName(),

        ]);
    }

    public function delete($slider)
    {

        $slider->delete();
    }
}
