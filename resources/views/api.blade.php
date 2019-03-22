<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        h1 {
            text-align: center;
            font-family: 'Impact';
        }

        table {
            text-align: center;
            font-family: 'Arial';
            border: 1px solid black;
            border-radius: 15px;
        }

        table tr td {
            border: 1px solid black;
            padding: 15px;
        }

        .form-group {
            display: flex;
            justify-content: center;
            height: 100px;
            align-items: center;
        }

        .form-group input {
            text-align: center;
            border: 1px solid black;
            border-radius: 15px;
            margin: 10px;
            padding: 15px;
        }

        button {
            background-color: transparent;
            padding: 10px;
            border: 1px solid black;
            border-radius: 15px;
            transition: 0.5s;
        }

        button:hover {
            cursor: pointer;
            background-color: black;
            color: white;
        }

        img {
            height: 30px;
            width: 30px;
        }
    </style>
</head>

<body>
    <h1>Find API</h1>
    @extends('menu')
    @section('content')
    <div class="form-group">
        <form action="{{url('/repos')}}" method="POST">
            <input type="hidden" name="_token" required value="<?= csrf_token(); ?>">
            <input type="text" name="repos" id="repos" placeholder="Digite seu repositório">

            <button type="submit">Enviar</button>
        </form>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" id="close-div" align="center">
        <button type="button" id="close" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block" id="close-div" align="center">
        <button type="button" id="close" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('info'))
    <div class="alert alert-info alert-block" id="close-div" align="center">
        <button type="button" id="close" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if(isset($repos))
    <table align='center' border='1'>
        <tr>
            <td>Repositório</td>
            <td>Imagem</td>
            <td>Descrição</td>
            <td>Acessar</td>
            <td>Ação</td>
        </tr>
        @foreach($repos as $repo)
        <tr>
            <td>{{$repo['name']}}</td>
            <td><img src="{{$repo['avatar_url']}}" alt="avatar_url"></td>
            <td>{{$repo['description']}}</td>
            <td><a href="{{$repo['html_url']}}" target="_blanck">{{$repo['html_url']}}</a></td>
            <td>
                <a href="/delete_repos/{{ $repo['id'] }}">Deletar</a>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    </div>
    @stop
</body>

<script>
    $(document).ready(function() {
        $("#close").click(function() {
            $("#close-div").slideUp("slow");
        });
    });
</script>

</html> 