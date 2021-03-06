<?php

namespace App\Http\Controllers\Admin;

use App\Events\ParseNewsEvent;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\News;
use App\Models\Feed;
use App\Services\ParsingService;
use Laravie\Parser\InvalidContentException;
use Log;
use XmlParser;

class ParserController extends Controller
{

    public $resources;

    public function __construct()
    {
        $this->resources = Feed::all();
    }

    public function index()
    {
        foreach ($this->resources as $resource) {
            NewsParsingJob::dispatch(new ParsingService($resource));
        }

        return back()->with('success', __('sessions.success.queued', [
            'count' =>$this->resources->count(),
        ]));
    }




}
