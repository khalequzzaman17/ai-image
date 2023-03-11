<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use OpenAI\Laravel\Facades\OpenAI;

class ImageController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'desc' => ['required', 'string', 'max:1000'],
            'size' => Rule::in(['sm', 'md', 'lg']),
        ]);
        $desc = $request->desc;
        $i = $request->size;
        if ($i == 'lg') {
            $size = '1024x1024';
        } elseif ($i == 'md') {
            $size = '512x512';
        } else {
            $size = '256x256';
        }
        $results = OpenAI::images()->create([
            'prompt' => $desc,
            'size' => $size,
            'n' => 1,
            'response_format' => 'url',
        ]);
        $imgUrl = $results->data[0]->url;
        return view('view', compact('imgUrl', 'desc'));
    }
}
