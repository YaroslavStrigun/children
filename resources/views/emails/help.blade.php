<!DOCTYPE html>
<html class="no-js  page" lang="ru">

<head>
    <meta charset="utf-8">
    <title>Email</title>
    <meta name="description" content="">
</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
    <style>
        p, h1, h2, h3 {
            margin: 0;
        }

        table {
            padding: 0;
            width: 100%;
            margin: 0 auto;
            font-family:'Segoe UI',sans-serif;
        }
    </style>
    <thead style="background: #003580; font-family: Arial, sans-serif;">
    <tr style="padding: 10px 5px">
        <td style="background-color: #003580">
            <table style="max-width: 600px;">
                <tr>
                    <td style="padding: 5px;"><a href=""
                                                 style="color: #fff; font: 20px Arial, sans-serif; text-decoration: none;">Ангелы добра<span
                                style="color: #3C8AD3;"></span></a></td>
                </tr>
            </table>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <table style="max-width: 600px; width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: solid #ededed 1px;">
                    <td style="font-family:'Segoe UI', sans-serif; padding: 8px 0; font-weight: 600">
                        <p>Вам пришло письмо</p>
                    </td>
                </tr>
                <tr style="border-bottom: solid #ededed 1px;">
                    <td style="font-family:'Segoe UI', sans-serif; padding: 8px 0; font-weight: 600"><p>
                            Email </p></td>
                    <td style="width: 70%; font-family:'Segoe UI', sans-serif; padding: 8px 0; text-align: right;">
                        <p>{{ $data['email'] }}</p></td>
                </tr>
                @if(!empty($data['phone']))
                    <tr style="border-bottom: solid #ededed 1px;">
                        <td style="font-family:'Segoe UI', sans-serif; padding: 8px 0; font-weight: 600"><p>
                                Телефон </p></td>
                        <td style="width: 70%; font-family:'Segoe UI', sans-serif; padding: 8px 0; text-align: right;">
                            <p>{{ $data['phone'] }}</p></td>
                    </tr>
                @endif
                <tr style="border-bottom: solid #ededed 1px;">
                    <td style="font-family:'Segoe UI', sans-serif; padding: 8px 0; font-weight: 600"><p>
                            Сообщение </p></td>
                    <td style="width: 70%; font-family:'Segoe UI', sans-serif; padding: 8px 0; text-align: right;">
                        <p>{{ $data['text'] }}</p></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
