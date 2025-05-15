<!DOCTYPE html>
<html>

<head>
    <title>Calculator Application</title>
    <link rel="icon" href="{{ asset('icons8-calculator-color-32.png') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nabla&family=Silkscreen:wght@400;700&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>Calculate!</h1>
        <form method="post" action="{{ route('calculator.calculate') }}">
            @csrf
            <input id="number_input1" name="number_input1" type="number" class="number-input" step="any"
                value="{{ old('number_input1', isset($number_input1) ? $number_input1 : '') }}" placeholder=123
                required>
            <select name="operation" id="operation" value="{{ old('operation', isset($operation) ? $operation : '') }}">
                <option value="" disabled selected>Choose operation &#11015;</option>
                <option value="add"
                    {{ old('operation', isset($operation) && $operation === 'add' ? 'selected' : '') }}>
                    +</option>
                <option value="subtract"
                    {{ old('operation', isset($operation) && $operation === 'subtract' ? 'selected' : '') }}>-</option>
                <option value="multiply"
                    {{ old('operation', isset($operation) && $operation === 'multiply' ? 'selected' : '') }}>*</option>
                <option value="divide"
                    {{ old('operation', isset($operation) && $operation === 'divide' ? 'selected' : '') }}>/</option>
            </select>
            <input id="number_input2" name="number_input2" type="number" class="number-input" step="any"
                value="{{ old('number_input2', isset($number_input2) ? $number_input2 : '') }}" placeholder=123
                required>
            <input type="submit" class="btn" id="equals" value="=">
            <input type="submit" class="btn" id="reset" name="reset" value="c">

            <div class="result-box">

                @if ($errors->any())
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (!is_null($result))
                    <p id="result">{{ $result }}</p>
                @endif
                @if (!empty($message))
                    <p id="message">{{ $message }}</p>
                @endif
            </div>
        </form>
    </div>
    <footer>Copyright&copy; Saara Rikama/React25K</footer>
</body>

</html>
