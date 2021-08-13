<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Rezerwacji pokoi</title>
</head>
<body>
    <form name="a" method="get" action="searchMail">
        <input type="text" name="mail_address">

        <input type="submit" value="Check">

    </form>

    @isset($reservation_table)

        @foreach($reservation_table as $res_t)

            {{$res_t["id"]}} <br>
            {{$res_t["id_r"]}} <br>
            {{$res_t["id_c"]}} <br>
            {{$res_t["from"]}} <br>
            {{$res_t["to"]}} <br>

            <a href="editReservationForms?id={{$res_t['id']}}"><input type="submit" value="Edit"></a>
            <a href="canceledReservationDelete?id={{$res_t['id']}}"><input type="submit" value="Delete"></a> <br>

        @endforeach

    @endisset

    @if ($res===true)

    <form name="a" method="get" action="editReservation">

    <label for="from"> From:  </label>
    <input type="date" name="from">
    <label for="to"> To: </label>
    <input type="date" name="to">
    <input type="hidden" name="id" value="{{$id_u}}">

    <input type="submit" value="Save">
    </form>
    @endif

    @isset($reservations)

        @foreach($reservations as $res)

            {{$res->id}} <br>
            {{$res->id_r}} <br>
            {{$res->id_c}} <br>
            {{$res->from}} <br>
            {{$res->to}} <br>
    
        @endforeach

    @endisset

</body>
</html>