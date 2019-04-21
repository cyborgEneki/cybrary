<html>

<head>
    <style>
        .mail-top-bar {
            background-color: #F5F8FA;
            font-size: larger;
            font-family: sans-serif;
            padding-top: 30px;
            text-align: center;
            padding-bottom: 30px;
        }

        .mail-body {
            font-family: sans-serif;
            padding: 30px;
            font-size: 14px;
        }

        .email-body {
            padding-left: 100px;
            padding-right: 100px;
            padding-top: 20px;
        }
    </style>
</head>

<body class="mail-body">
    <h1 class="mail-top-bar">Cybrary</h1>
    <div class="email-body">
        <h2>Hi {{ $name }}</h2>
        <p>Kindly note that that your book is overdue by more than 3 days. Thus, you have been suspended from borrowing for
            3 months.</p>
        <p>Kindly return the book as soon as possible.</p>
        <br>
        <div>
            <p>Kind regards,</p>
            <p>{{ config('app.name') }} Bot</p>
        </div>
    </div>
</body>

</html>