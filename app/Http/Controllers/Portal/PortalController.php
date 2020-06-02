<?php

namespace App\Http\Controllers\Portal;

use App\Announcements12;
use App\Charts\BarChartStacked;
use App\Charts\IQAPie;
use App\Charts\RiskByCategory;
use App\Charts\RiskByRating;
use App\Eafiles12;
use App\Files121;
use App\Iafiles12;
use App\Iafindings12;
use App\Iafindingtype12;
use App\Iaschedules12;
use App\Intenalaudit12;
use App\Mrfiles12;
use App\Pages21;
use App\QmsAccReps16;
use App\QmsComms16;
use App\QmsContext16;
use App\QmsFormsTemp16;
use App\QmsManual16;
use App\QmsObj16;
use App\QmsProc16;
use App\QmsSpecOrd16;
use App\QmsStratDir16;
use App\QmsWorlIns16;
use App\Ratings12;
use App\Riskcategory12;
use App\Riskconsequence12;
use App\Riskexposure12;
use App\Risklikelihood12;
use App\Riskregister12;
use App\Rmfiles12;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortalController extends Controller
{
    public function index()
    {
        $announcements = [];
        return view('portal.pages.index', compact('announcements'));
    }

    public function faqs()
    {
        $faqs = [];
        return view('portal.pages.faqs', compact('faqs'));
    }


}
