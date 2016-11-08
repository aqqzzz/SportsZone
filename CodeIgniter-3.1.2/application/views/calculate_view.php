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
        <script type="text/javascript">
            var xmlhttp = null;
            function $(id) {
                return document.getElementById(id);
            }

            //创建ajax引擎
            function getXMLHttpRequest(){
                var xmlhttp;
                try {
                    xmlhttp = new XMLHttpRequest();
                }catch(e){
                    try {
                        xmlhttp = new ActiveXObject("Msxml12.XMLHTTP");
                    }catch(e){
                        try{
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }catch(e){
                            alert("您的浏览器不支持ajax!");
                            return false;
                        }
                    }
                }
                return xmlhttp;
            }

            function isSubmit(){
                xmlhttp = getXMLHttpRequest();

                //怎么判断创建是否成功
                if(xmlhttp){
                    //以post方法发送
                    var url = "index.php/calculate/count";
                    var data = "num1="+$("num1").value+"&operate="+$("operate").value+"&num2="+$("num2").value;
                }
            }
        </script>
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
