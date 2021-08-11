<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Rezerwacji pokoi</title>
</head>
<body>    
    {{$status}}

    @foreach($isFree as $isF)

        {{$isF}} <br>

    @endforeach 

    <?php var_dump($isFree) ?>

    <form name="a" method="get" action="show_empty_room">
        <input type="number" name="id">
        <input type="date" name="from">
        <input type="date" name="to">

        <input type="submit" value="Check">

    </from>

    @if ($status==="Zajete")
        <div class="text_0">

            Ten pokój możesz zarezerwować od dnia: {{$isFree["to"]}}

        </div>
        @endif

</body>
</html>