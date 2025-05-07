<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator', [
            'result' => null,
            'message' => null,
        ]);
    }

    public function calculate(Request $request)
    {
        if ($request->has('reset')) {
            return redirect()->route('calculator.index');
        }

        $request->validate([
            'number_input1' => 'required|numeric',
            'number_input2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide'
        ]);

        $number_input1 = $request->input('number_input1');
        $number_input2 = $request->input('number_input2');
        $operation = $request->input('operation');
        $result = null;
        $message = "";

        if ($operation === 'add') {
            $result = $number_input1 + $number_input2;
        } elseif ($operation === 'subtract') {
            $result = $number_input1 - $number_input2;
        } elseif ($operation === 'multiply') {
            $result = $number_input1 * $number_input2;
        } elseif ($operation === 'divide') {
            if ($number_input2 > 0) {
                $result = $number_input1 / $number_input2;
            } else {
                $result = null;
                $message = "Numbers can't be divided by 0!";
            }
        } else {
            $message = "Input numbers and pick an operation to get a result";
        }

        if (!is_null($result)) {
            $result = round($result, 9);
        }

        return view('calculator', [
            'number_input1' => $number_input1,
            'number_input2' => $number_input2,
            'operation' => $operation,
            'result' => $result,
            'message' => $message,
        ]);
    }
}
