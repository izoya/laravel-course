<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStore;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(FeedbackStore $request)
    {
        $data = $request->validated();
        $feedback = new Feedback();
        $result = $feedback->fill($data)->save();

        if (!$result) {
            return response('error', 501);
        }

        return response('success', 200);
    }
}
