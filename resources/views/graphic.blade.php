<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        h1 {
            text-align: center;
            font-family: 'Impact';
        }

        .graphic {
            width: 900px; 
            height: 500px; 
            border: 1px solid black;
            transform: translate(25%, 0);
        }
    </style>
</head>

<body>
    <h1>Graphic LavaCharts</h1>
    <h1><a href="/">CRUD</a></h1>

    <div id="graphic" class="graphic"></div>

    <?= $lava->render('DonutChart', 'Age', 'graphic'); ?>
</body>

</html> 