<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Reservation;

class PageRoomController extends Controller
{

    protected $id_0,$i,$d,$od,$do_0,$id,$firstname,$surname,$numberPhone,$address,$mailAddress,$id_c,$from,$to,$typeRoom,$glob_status_s,$glob_status_e,$editField,$in,$currentDateFrom,$currentDateTo;
    protected array $id_tables=[];

    public function index()
    {

        return view('index');
    }
    public function show_empty_room(Request $request)
    {

        $this->i=0;
        $this->id=$request->input('id');
        $this->od=$request->input('from');
        $this->do_0=$request->input('to');
        $rooms="";

        $isFree=[
            
            "id"=>NULL,
            "number"=>NULL,
            "from"=>NULL,
            "to"=>NULL

        ];

        $reservations=Reservation::get();
        $rooms_0=Room::where('id',$this->id)->count();

        if($rooms_0>0)
        {

            $rooms=Room::where('id',$this->id)->get();

            foreach($reservations as $res)
            {
                foreach($rooms as $r)
                {
                    if($r->id===$res->id_r && $this->od===$res->from && $this->do_0===$res->to) 
                    {
                        $this->i++;

                        $isFree["id"]=$r->id;
                        $isFree["number"]=$r->number;
                        $isFree["from"]=$res->from;
                        $isFree["to"]=$res->to;

                    }

                }

            }

            if($this->i>0) $status="Zajete";
            else $status="Wolne";

        }
        else $status="Room do not exists!";

        return view('show_empty_room',compact('status','rooms','isFree'));

    }

    public function is_Free()
    {
        $this->i=0;
        $this->id_0;

        $isFree=[
            
            "id"=>NULL,
            "number"=>NULL,
            "from"=>NULL,
            "to"=>NULL

        ];


        $reservations=Reservation::get();
        //$rooms_0=Room::where('id',1)->count();

        $this->d=0;

        $reservations_0=Reservation::count();

        if($reservations_0===0) 
        {
            $rooms_2=Room::where('number_people',$this->typeRoom)->take(1)->get();

            foreach($rooms_2 as $r)
            {
                $this->id_0=$r->id;

            }
            $status="Wolne";

            $this->glob_status_s="Wolne";

        }
        else
        {
            while($this->glob_status_e!="Room do not exists!")
            {
                $this->d++;

                $rooms_0=Room::where(['id'=>$this->d,'number_people'=>$this->typeRoom])->count();
           
                if($rooms_0>0)
                {

                        $rooms=Room::where('id',$this->d)->get();

                    foreach($reservations as $res)
                    {
                        foreach($rooms as $r)
                        {
                            if($r->id===$res->id_r && $this->from>=$res->from && $this->to<=$res->to || $r->id===$res->id_r && $this->from==$res->from || $r->id===$res->id_r && $this->to==$res->to || $r->id==$res->id_r && $this->from==$res->to || $r->id==$res->id_r && $this->to==$res->from || $r->id==$res->id_r && $this->from>=$res->to && $this->to<=$res->from) 
                            {
                                $this->i++;

                                $isFree["id"]=$r->id;
                                $isFree["number"]=$r->number;
                                $isFree["from"]=$res->from;
                                $isFree["to"]=$res->to;

                            }
                            else $this->id_0=$r->id;

                        }

                     }

                    if($this->i>0) $status="Zajete";
                    else $status="Wolne";

                    $this->glob_status_s=$status;

            }
            else $status="Room do not exists!";

            $this->glob_status_e=$status;

            }

        }

    }
    public function insertForReservation()
    {

        return view('add_reservation');
    }
    public function insertCustomers(Request $request)
    {
        $this->firstname=$request->input('firstname');
        $this->surname=$request->input('surname');
        $this->numberPhone=$request->input('number_phone');
        $this->address=$request->input('address');
        $this->mailAddress=$request->input('mail_address');
        $this->from=$request->input('from');
        $this->to=$request->input('to');
        $this->typeRoom=$request->input('typeRoom');

        $save=Customer::create([

            'firstname'=>$this->firstname,
            'surname'=>$this->surname,
            'number_phone'=>$this->numberPhone,
            'address'=>$this->address,
            'mail_address'=>$this->mailAddress

        ]);

        $this->searchRoom();

        echo $this->glob_status_s;

        if($this->glob_status_s==="Zajete") return redirect()->route("reservationResult");
        else return $this->insertReservation();

    }
    public function insertReservation()
    {
        $customers=Customer::where('mail_address',$this->mailAddress)->get();

        foreach($customers as $c)
        {
            $this->id_c=$c->id;

        }

        $save=Reservation::create([
            'id_r'=>$this->id_0,
            'id_c'=>$this->id_c,
            'from'=>$this->from,
            'to'=>$this->to
            
        ]);

        return redirect()->route("insertForReservation");

    }
    public function searchRoom()
    {
        $this->glob_status="";

        $this->is_Free();

    }
    public function searchMail(Request $request)
    {
        $reservation_table=[

            [
                "id"=>NULL,
                "id_r"=>NULL,
                "id_c"=>NULL,
                "from"=>NULL,
                "to"=>NULL

            ],

        ];
        $reservations="";
        $this->in=0;
        $res=false;

        $this->mailAddress=$request->input('mail_address');

         $customers=Customer::where('mail_address',$this->mailAddress)->get();

        foreach($customers as $c)
        {
            $this->id_c=$c->id;

            array_push($this->id_tables,$this->id_c);

        }

        foreach($this->id_tables as $id_t)
        {
            $reservations=Reservation::where('id_c',$id_t)->get();

            foreach($reservations as $res)
            {
                //array_push($reservation_table,$res->id,$res->id_r,$res->id_c,$res->from,$res->to);

                $reservation_table[$this->in]["id"]=$res->id;
                $reservation_table[$this->in]["id_r"]=$res->id_r;
                $reservation_table[$this->in]["id_c"]=$res->id_c;
                $reservation_table[$this->in]["from"]=$res->from;
                $reservation_table[$this->in]["to"]=$res->to;

                $this->in++;

            }

        }

        return view('canceledReservation',compact('reservation_table','res'));

    }
    public function reservationResult()
    {
        $stat=$this->glob_status_s;

        return view('reservation_result',compact('stat'));
    }
    public function editReservationForms(Request $request)
    {
        $id_u=$request->input('id');
        $from_d=$request->input('from');
        $to_d=$request->input('to');

        $reservations=Reservation::where('id',$id_u)->update(["from"=>"2000/01/01","to"=>"2000/01/02"]);

        $reservations=Reservation::where('id',$id_u)->get();

        foreach($reservations as $res)
        {
            $id_room=$res->id_r;

        }

        $rooms=Room::where('id',$id_room)->get();

        foreach($rooms as $r)
        {
            $roomType=$r->number_people;

        }

        $res=true;

        return view('canceledReservation',compact('res','id_u','roomType','from_d','to_d'));

    }
    public function canceledReservation()
    {
        $res=false;

        return view('canceledReservation',compact('res'));
    }
    public function editReservation(Request $request)
    {
        $this->id=$request->input('id');
        $this->typeRoom=$request->input('typeRoom');
        $this->from=$request->input('from');
        $this->to=$request->input('to');
        $this->currentDateFrom=$request->input('from_d');
        $this->currentDateTo=$request->input('to_d');

        $this->glob_status_s="";

        $this->is_Free();

        if($this->glob_status_s=="Zajete")
        {
            $reservations=Reservation::where('id',$this->id)->update(['from'=>$this->currentDateFrom,'to'=>$this->currentDateTo]);

            return 'from: '.$this->currentDateFrom;

        }
        else
        {

            $reservations=Reservation::where('id',$this->id)->update(["from"=>$this->from,"to"=>$this->to]);

            return redirect()->route('canceledReservation');

        }

    }
    public function canceledReservationDelete(Request $request)
    {
        $this->id=$request->input('id');

        $reservations=Reservation::where('id',$this->id)->delete();

        return redirect()->route('canceledReservation');

    }

}
