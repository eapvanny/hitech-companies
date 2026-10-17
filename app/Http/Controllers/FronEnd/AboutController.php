<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use App\Models\Corevalue;
use App\Models\em_message;
use App\Models\Ourcompany;
use App\Models\Vissionmission;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Optional: Cache for 10 minutes (recommended for static pages)
        // $data = cache()->remember('about_page_data', 600, function () {
        //     return [
        //         'ourcompany'      => Ourcompany::where('active_status', 1)->select('description_en', 'description_kh')->first(),
        //         'messages'        => em_message::where('active_status', 1)->select('img', 'img_founder', 'founder_name', 'em_name', 'message_en', 'message_kh')->get(),
        //         'missionvision'   => Vissionmission::where('active_status', 1)->select('text_en', 'text_kh')->first(),
        //         'corevalues'      => Corevalue::where('active_status',1)->select('title_en', 'title_kh', 'description_en', 'description_kh')->get(),
        //         'accreditations'  => Accreditation::where('active_status', 1)->select('logo', 'name_en', 'name_kh')->get(),
        //     ];
        // });

        $data['ourcompany'] = Ourcompany::where('active_status', 1)
            ->select('description_en', 'description_kh')
            ->first();

        $data['messages'] = em_message::where('active_status', 1)
            ->select('img', 'img_founder', 'founder_name', 'em_name', 'message_en', 'message_kh')
            ->get();

        $data['missionvision'] = Vissionmission::where('active_status', 1)
            ->select('text_en', 'text_kh')
            ->first();

        $data['corevalues'] = Corevalue::where('active_status', 1)
            ->select('title_en', 'title_kh', 'description_en', 'description_kh')
            ->get();

        $data['accreditations'] = Accreditation::where('active_status', 1)
            ->select('logo', 'name_en', 'name_kh')
            ->get();

        return view('front-end.about', $data);
    }
}
