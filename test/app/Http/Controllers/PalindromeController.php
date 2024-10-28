<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalindromeController extends Controller
{
    public function highestPalindrome(Request $request)
    {
        // Validate the input
        $request->validate([
            's' => 'required|string',
            'k' => 'required|integer|min:0',
        ]);

        $s = $request->input('s');
        $k = $request->input('k');

        // Call the function to find the highest palindrome
        $result = $this->findHighestPalindrome($s, $k);

        return response()->json(['result' => $result]);
    }

    private function findHighestPalindrome($s, $k)
    {
        $n = strlen($s);
        if ($n == 0 || $k < 0) return "-1";

        // Helper function to build palindrome
        $changes = 0;
        $sArray = str_split($s);
        $changes = $this->makePalindrome($sArray, $k, 0, $n - 1, $changes);

        if ($changes > $k) return "-1"; // Not possible to create a palindrome

        // Step 2: Maximize the palindrome
        $i = 0;
        $j = $n - 1;
        while ($i < $j) {
            if ($sArray[$i] != '9' && $k > 0) {
                // If we can still change, change to '9'
                if ($changes < $k) {
                    $sArray[$i] = '9';
                    $sArray[$j] = '9';
                    $k -= 1;
                }
            } elseif ($changes < $k) {
                // If we have extra changes left, we can change to '9'
                $sArray[$i] = '9';
                $sArray[$j] = '9';
                $k -= 1;
            }
            $i++;
            $j--;
        }

        // If the length is odd and we still have changes left, we can change the middle character to '9'
        if ($n % 2 == 1 && $k > 0) {
            $sArray[intval($n / 2)] = '9';
        }

        return implode('', $sArray);
    }

    private function makePalindrome(&$sArray, &$k, $i, $j, &$changes)
    {
        if ($i >= $j) return $changes; // Base case

        if ($sArray[$i] !== $sArray[$j]) {
            // We need to make a change
            $changes++;
            // Change to the higher value
            if ($sArray[$i] > $sArray[$j]) {
                $sArray[$j] = $sArray[$i];
            } else {
                $sArray[$i] = $sArray[$j];
            }
        }

        // Recur for the next pair
        return $this->makePalindrome($sArray, $k, $i + 1, $j - 1, $changes);
    }
}
