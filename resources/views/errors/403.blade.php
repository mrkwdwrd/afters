<!DOCTYPE html>
<html>
    <head>
        <title>403 {{ config('app.name') }}</title>
        <meta charset="utf8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <style>
            html {
                position: relative;
                display: block;
                width: 100%;
                height: 100%;
            }
            body {
                text-align: center;
                background: #F6F4EF;
                color: #1c648a;
                font: 13px/1.4 Arial, Helvetica, sans-serif;
                letter-spacing: 1px;
                position: relative;
                display: block;
                width: 100%;
                height: 100%;
                margin: 0;
            }
            .content {
                overflow: auto;
                margin: 0 auto;
                position: absolute;
                top: 50%; left: 50%;
                transform: translate(-50%,-50%);
                width: 100%;
            }
            .text {
                padding: 0 1em;
            }
            h1 {
                display: block;
                text-indent: -999em;
    			height: 80px;
    			background-size: 60% auto;
                margin: 0 auto;
            }
            h2 {
                font: bold 18px/1.4 Arial, Helvetica, sans-serif;
                margin: 2em 0;
                text-transform: none;
            }
            h2 span {
                color: #fc4328;
            }
            h3 {
                font: bold 14px/1.4 Arial, Helvetica, sans-serif;
                margin: 0;
                text-transform: none;
                font-weight: 400;
            }
            img {
                height: 200px;
                width: 209.5px;
            }
        </style>
    </head>

    <body>
        <div class="content">
            <img src="/img/503.svg" alt="503">
            <div class="text">
                <h2>You don't have <span>permission</span> to access this page.</h2>
                <h3 title="404">Make sure you are allowed to access this page or contact {{ config('app.name') }} if you thing this is a mistake.</h3>
                <p>
                    <a href="javascript:history.back()" title="Back" style="display:inline;">Go Back</a>&nbsp;&bull;&nbsp;
                    <a href="/" title="Home" style="display:inline;">Go to the Homepage</a>
                </p>
            </div>
        </div>
    </body>
</html>