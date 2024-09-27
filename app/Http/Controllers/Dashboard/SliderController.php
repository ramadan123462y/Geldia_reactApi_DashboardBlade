<?php

namespace App\Http\Controllers\Dashboard;

use App\Core\Dashboard\Repository\Slider\SliderInterface;
use App\Core\Dashboard\Service\SliderService;
use App\Http\Controllers\Controller;
use App\Core\Trait\FileTrait;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{

    use FileTrait;

    public $sliderService;

    public function __construct(SliderService $sliderService)
    {

        $this->sliderService = $sliderService;
    }
    public  function index(SliderInterface $sliderInterface)
    {
        $sliders = $sliderInterface->all();
     


        return  view('Dashboard.pages.Sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {

        $this->sliderService->create($request);
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Image  Created.');
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $this->sliderService->update($request);
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Image Updated .');
        return redirect()->back();
    }

    public function delete($id)
    {

        $this->sliderService->delete($id);
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Image Deleted .');
        return redirect()->back();
    }
}
