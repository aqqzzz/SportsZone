<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
        <title>网页计算器</title>
        <style type="text/css">
            #calculators {
                margin: 10% auto;
                width: 430px;
                border: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <div id="calculators">
            <form action="index.php/calculate/count" method="post">
                <input type="text" name="num1" id="num1" />
                <select name="operate" id="operate">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                <input type="text" name="num2" id="num2" />
                <input type="submit" value="计算" />
            </form>
        </div>
    </body>
</html>
