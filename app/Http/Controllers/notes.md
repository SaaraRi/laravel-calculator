<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    // Display the conversion form
    public function index()
    {
        return view('converter');
    }
    // Handle the conversion
    public function convert(Request $request)
    {

        $request->validate([
            'value' => 'required|numeric',
            'conversion_type' => 'required|in:celsius_to_fahrenheit,celsius_to_kelvin'
        ]);
        $value = $request->input('value');
        $conversionType = $request->input('conversion_type');
        $result = 0;
        $unitFrom = '';
        $unitTo = '';
        //Temperature conversion
        if ($conversionType === 'celsius_to_fahrenheit') {
            $result = ($value * 9 / 5) + 32;
            $unitFrom = 'Celsius';
            $unitTo = 'Fahrenheit';
        } elseif ($conversionType === 'celsius_to_kelvin') {
            $result =  $value + 273.15;
            $unitFrom = 'Celsius';
            $unitTo = 'Kelvin';
        }
        $result = round($result, 2);

        return view('converter', [
            'value' => $value,
            'conversionType' => $conversionType,
            'result' => $result,
            'unitFrom' => $unitFrom,
            'unitTo' => $unitTo,
        ]);
    }
}



<?php

declare(strict_types=1);

$result = " ";
$message = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $number_input1 = $_POST["number_input1"] ?? 0;
    $number_input2 = $_POST["number_input2"] ?? 0;
    $operation = $_POST["operation"] ?? " ";

    switch ($operation) {
        case "add":
            $result = $number_input1 + $number_input2;
            break;
        case "subtract":
            $result = $number_input1 - $number_input2;
            break;
        case "multiply":
            $result = $number_input1 * $number_input2;
            break;
        case "divide":
            if ($number_input2 == 0) {
                $message = "Numbers can't be divided by 0! &#9785;";
            } else {
                $result = $number_input1 / $number_input2;
            }
            break;
        default:
            $message = "Input numbers and pick an operation to get a result &#9786;";
    }

    if (isset($_POST["reset"])) {
        $_POST = [];
        $result = "";
        $message = "";
    }
}


@if (isset(input('reset')))
                {
                $number_input1 = [];
                $number_input2 = [];
                $operation = [];
                $result = "";
                $message = "";
                }
            @endif
