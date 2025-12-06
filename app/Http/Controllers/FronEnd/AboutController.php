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
    public function index(){
        $data['ourcomapny'] = Ourcompany::where('active_status', 1)->first();
        $data['messages'] = em_message::where('active_status', 1)->get();
        $data['missionvision' ] = Vissionmission::where('active_status', 1)->first();
        $data['corevalues'] = Corevalue::where('active_status',1)->get();
        $data['accreditations'] = Accreditation::where('active_status', 1)->get();
        return view('front-end.about', $data);
    }
}
