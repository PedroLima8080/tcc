<html>

<head>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: Arial;
        }

        .header {}

        .header .img-header {
            margin-top: 1em;
            margin-bottom: 2.5em;
            height: 100px;
            width: 100%;
        }

        .header img {
            height: 100%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .header h1 {
            margin-top: 1.5em;
            text-align: center;
        }

        .content {
            padding: 0px 5em;
        }

        .link {
            margin-top: 2em;
        }

        h1,p{
            color: rgb(49, 49, 49);
        }

        .link a {
            background-color: #21b0b6;
            padding: 0.5em 2em;
            border-radius: 0.2em;
            color: white;
            text-decoration: none;
            transition: all linear 300ms;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: min-content;
            white-space: nowrap;
        }

        .link a:hover {
            background-color: #258b8f;
            cursor: pointer;
        }
        .title a{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="content">

        <div class="header">
            <div class="img-header">
                <img src="{{ $message->embed(public_path().'/img/logo_horizontal.png') }}" alt="">
            </div>
            <hr>
            <div class="title">

                <h1>
                    Olá, {{$name}}. Você solicitou uma troca de senha!<br>Clique no link abaixo para redefini-lá!
                </h1>
            </div>
        </div>
        <div class="link">
            <a href="{{$link}}">Redefinir Senha.</a>
        </div>
        <br>
        <p>
            Obs: Caso você não tenha solicitado a troca de senha, apenas ignore este email!
        </p>
        <p>Att. Neptuno!</p>
    </div>
</body>

</html>
