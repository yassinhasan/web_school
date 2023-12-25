<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Interfaces\ZoomRepositoryInterface;
use App\Http\Traits\FlashMessageTrait;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\OnlineCourse;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Transport\Dsn;

class OnlineCourseController extends Controller
{
    use MeetingZoomTrait;
    use FlashMessageTrait;
    private ZoomRepositoryInterface $zoom;

    public function __construct(ZoomRepositoryInterface $ZoomRepositoryInterfacel) {
        $this->zoom = $ZoomRepositoryInterfacel;
    }

    public function index()
    {
        return $this->zoom->getAllMeetings();
    }
    public function store(Request $request)
    {
        return $this->zoom->createZoom($request);
    }

    public function update(Request $request)
    {
        return $this->zoom->update($request);
    }
    public function destroy(Request $request)
    {
      return  $this->zoom->deleteById($request);
    }
}
