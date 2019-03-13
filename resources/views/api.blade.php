<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        h1,
        table {
            text-align: center;
            font-family: 'Arial';
        }

        .form-group {
            display: flex;
            justify-content: center;
            height: 300px;
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
    <h1><a href="/">CRUD</a></h1>
    <div class="form-group">
        <form action="{{url('/repos')}}" method="POST">
            <input type="hidden" name="_token" required value="<?php echo csrf_token(); ?>">
            <input type="text" name="repos" id="repos" placeholder="Digite seu repositório">

            <button type="submit">Enviar</button>
        </form>
    </div>
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
            <td><a href="{{$repo['html_url']}}">{{$repo['html_url']}}</a></td>
            <td>
                <a href="/delete_repos/{{ $repo['id'] }}">Deletar</a>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    </div>
</body>

</html> 