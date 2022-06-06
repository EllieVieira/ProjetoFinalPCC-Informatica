<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/view/teste/Trumbowyg-main/dist/ui/trumbowyg.css">

</head>
<body>
<form action="../../php/controller/loginController.php" method="post">
            <h1>Entrar</h1>
            <textarea name="email" id="trumbowyg-editor" placeholder="Email"></textarea>
            <input type="submit" name="signin" id="signin" value="Entrar" class="submit">
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/view/teste/Trumbowyg-main/dist/trumbowyg.min.js"></script>
        <script src="/view/teste/Trumbowyg-main/plugins/upload/trumbowyg.upload.js"></script>



        <script>
            $('#trumbowyg-editor').trumbowyg({
            btns: [['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['insertImage'],
        ['upload'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen'],

    ],
    plugins: {
        // Add imagur parameters to upload plugin for demo purposes
        upload: {
            serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
            headers: {
                'Authorization': 'Client-ID xxxxxxxxxxxx'
            },
            urlPropertyName: 'data.link'
        }
    },
            autogrow: true
            });
        </script>
</body>
</html>
