<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BracketController extends Controller
{
    public function isBalanced(Request $request)
    {
        $input = $request->input('brackets');
        $stack = [];
        $bracketPairs = [
            ')' => '(',
            '}' => '{',
            ']' => '['
        ];

        // Traverse through each character
        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];

            // If it's an opening bracket, push to stack
            if (in_array($char, ['(', '{', '['])) {
                array_push($stack, $char);
            }
            // If it's a closing bracket, check for matching
            elseif (in_array($char, [')', '}', ']'])) {
                if (empty($stack) || array_pop($stack) !== $bracketPairs[$char]) {
                    return response()->json(['result' => "NO"]);
                }
            }
        }

        // If stack is empty, all brackets are matched
        return response()->json(['result' => empty($stack) ? "YES" : "NO"]);
    }
}
