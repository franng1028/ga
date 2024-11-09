<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>科学计算器</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
    <style>
        
    </style>
</head>
<body>

    <!-- 导航栏 -->
    <div class="navbar">
        <div class="left">
            <a href="index.php" class="plain-link">欢迎使用多功能计算器</a>
        </div>
        <div class="right">
            <ul>
                <li><a href="number_calculator.php">数字计算器|</a></li>
                <li><a href="conversion_calculator.php">转换计算器</a></li>
            </ul>
        </div>
    </div>

    <!-- 左侧导航栏 -->
    <div class="sidebar">
        <h3>快速导航</h3>
        <ul>
            <li><a href="basic_calculator.php">基础计算器</a></li>
            <li><a href="scientific_calculator.php">科学计算器</a></li>
        </ul>
    </div>

    <div class="calculator">
        <input type="text" class="display" id="display" placeholder="0" autofocus>
        <div class="buttons">
            <button onclick="appendToDisplay('(')">(</button>
            <button onclick="appendToDisplay(')')">)</button>
            <button onclick="appendToDisplay('%')">%</button>
            <button onclick="clearDisplay()" class="clear">C</button>
            <button onclick="deleteLast()">DEL</button>

            <button onclick="appendFunction('sin')">sin</button>
            <button onclick="appendFunction('cos')">cos</button>
            <button onclick="appendFunction('tan')">tan</button>
            <button onclick="appendFunction('sqrt')">√</button>
            <button onclick="appendToDisplay('/')">/</button>

            <button onclick="appendToDisplay('7')">7</button>
            <button onclick="appendToDisplay('8')">8</button>
            <button onclick="appendToDisplay('9')">9</button>
            <button onclick="appendToDisplay('*')">*</button>
            <button onclick="appendFunction('log')">log</button>

            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="appendToDisplay('6')">6</button>
            <button onclick="appendToDisplay('-')">-</button>
            <button onclick="appendFunction('π')">π</button>

            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('+')">+</button>
            <button onclick="appendFunction('^')">^</button>

            <button onclick="appendToDisplay('0')">0</button>
            <button onclick="appendToDisplay('.')">.</button>
            <button onclick="appendFunction('exp')">exp</button>
            <button onclick="appendFunction('abs')">|x|</button>
            <button onclick="calculate()" style="grid-column: span 5; background-color: #2196F3;">=</button>
        </div>
    </div>

    <script>
        const display = document.getElementById('display');

        // 捕捉键盘输入
        display.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                calculate();
            }
        });

        // 追加普通字符到显示框
        function appendToDisplay(value) {
            display.value += value;
            display.focus();
        }

        // 追加函数到显示框（如 sin、cos）
        function appendFunction(func) {
            if (func === 'π') {
                display.value += 'π';
            } else if (func === 'sqrt' || func === 'exp' || func === 'abs') {
                display.value += func + '(';
            } else {
                display.value += func + '(';
            }
            display.focus();
        }

        // 清除显示内容
        function clearDisplay() {
            display.value = '';
        }

        // 删除最后一个字符
        function deleteLast() {
            display.value = display.value.slice(0, -1);
        }

        // 计算结果
        function calculate() {
            let input = display.value
                .replace(/sin/g, 'Math.sin')
                .replace(/cos/g, 'Math.cos')
                .replace(/tan/g, 'Math.tan')
                .replace(/sqrt/g, 'Math.sqrt')
                .replace(/log/g, 'Math.log10')
                .replace(/π/g, 'Math.PI')
                .replace(/exp/g, 'Math.exp')
                .replace(/abs/g, 'Math.abs')
                .replace(/\^/g, '**'); // 替换指数运算符

            try {
                // 使用 eval 进行计算
                display.value = eval(input);
            } catch (error) {
                display.value = '错误';
            }
        }
    </script>
</body>
</html>
