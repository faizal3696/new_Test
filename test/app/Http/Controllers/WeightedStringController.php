<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightedStringController extends Controller
{
    public function checkWeightedStrings($string, $queries)
    {
        $weights = [];
        $currentChar = '';
        $currentWeight = 0;
        $repeatCount = 0;

        // Calculate the weights for each character and consecutive substrings
        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];
            $charWeight = ord($char) - ord('a') + 1;  // Get weight based on ASCII

            if ($char == $currentChar) {
                // Increase the weight for consecutive characters
                $repeatCount++;
                $currentWeight += $charWeight * $repeatCount;
            } else {
                // Reset for new character
                $repeatCount = 1;
                $currentChar = $char;
                $currentWeight = $charWeight;
            }

            // Store the current weight
            $weights[$currentWeight] = true;
        }

        // Answer each query
        $result = [];
        foreach ($queries as $query) {
            $result[] = isset($weights[$query]) ? "Yes" : "No";
        }

        return $result;
    }

    public function test(Request $request)
    {
        $string = $request->input('string');
        $queries = $request->input('queries');
        
        $result = $this->checkWeightedStrings($string, $queries);

        return response()->json($result);
    }
}
