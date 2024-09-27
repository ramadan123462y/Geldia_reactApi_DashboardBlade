<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\SliderDto;
use App\Core\Dashboard\Repository\Slider\SliderInterface;
use App\Core\Trait\FileTrait;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SliderService
{

    public $sliderInterface;
    use FileTrait;

    public function __construct(SliderInterface $sliderInterface)
    {

        $this->sliderInterface = $sliderInterface;
    }

    public function create(Request $request)
    {
        validator($request->all(), [

            'image_name' => 'required|image',
        ])->validate();

        $sliderDto = new SliderDto(Str::uuid() . '.' .  $request->file('image_name')->getClientOriginalExtension(), $request->file('image_name'));



        $this->sliderInterface->create($sliderDto);
        FileTrait::uploade($sliderDto->getImageFile(), $sliderDto->getImageName(), 'Sliders', 'uploades');
    }

    public function update(Request $request)
    {




        validator($request->all(), [

            'image_name' => 'required|image',
        ])->validate();


        $sliderDto = new SliderDto(Str::uuid() . '.' .  $request->file('image_name')->getClientOriginalExtension(), $request->file('image_name'));

        $slider = $this->sliderInterface->findOrFail($request->sliderId);

        FileTrait::delete(public_path('Backend\Uploades\Sliders\\' . $slider->image_name));

        $this->sliderInterface->update($slider, $sliderDto);


        FileTrait::uploade($sliderDto->getImageFile(), $sliderDto->getImageName(), 'Sliders', 'uploades');
    }

    public function delete($id)
    {
        $slider =  $this->sliderInterface->findOrFail($id);
        FileTrait::delete(public_path('Backend\Uploades\Sliders\\' . $slider->image_name));


        $this->sliderInterface->delete($slider);
    }


    private function validateImage($requestAll)
    {

        $validation = Validator::make($requestAll, [

            'image_name' => 'required|image',
        ]);

        if ($validation->fails()) {

            return redirect()->back()->withErrors($validation->messages());
        }
    }
}
