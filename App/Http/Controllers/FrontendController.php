<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;


class FrontendController extends Controller
{
    private $postInterface;

    public function __construct(PostServiceInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    public function index(Request $request)
    {
        $data = $this->postInterface->getPostFrontend($request);
        return view('welcome',compact('data'));
    }
}