<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>İletişim Formu</h2>

    <table>
        <tr>
            <td>Ad Soyad:</td>
            <td>{{$data['name']}}</td>
        </tr>
        <tr>
            <td>E-Mail:</td>
            <td>{{$data['email']}}</td>
        </tr>
        <tr>
            <td>Telefon:</td>
            <td>{{$data['phone']}}</td>
        </tr>
        <tr>
            <td>Konu:</td>
            <td>{{$data['subject']}}</td>
        </tr>
        <tr>
            <td>Mesaj:</td>
            <td>{{$data['message']}}</td>
        </tr>
    </table>
</body>
</html>