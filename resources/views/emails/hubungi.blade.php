<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Message from <b>{{ $name }}</b> via Contac us Website</h2>

        <div>
            <table>
                <tr>
                    <td>Fullname</td><td>: {{ $name }} </td>
                </tr>
                <tr>
                    <td>Email Address</td><td>: {{ $email }} </td>
                </tr>
                <tr>
                    <td>Subject</td><td>: {{ $subject }} </td>
                </tr>
            </table>
            <hr />
            <p>{{ htmlentities($pesan) }}</p>
        </div>
    </body>
</html>