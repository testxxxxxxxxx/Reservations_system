<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Reservation;

class PageRoomController extends Controller
{

    protected $id_r,$i,$d,$od,$do_0,$id,$firstname,$surname,$numberPhone,$address,$mailAddress,$id_c,$from,$to,$typeRoom,$glob_status_s,$glob_status_e;

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

        $isFree=[
            
            "id"=>NULL,
            "number"=>NULL,
            "from"=>NULL,
            "to"=>NULL

        ];


        $reservations=Reservation::get();
        //$rooms_0=Room::where('id',1)->count();

        $this->d=0;

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
                        if($r->id===$res->id_r) 
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

                $this->glob_status_s=$status;

            }
            else $status="Room do not exists!";

            $this->glob_status_e=$status;

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

        $save=Customer::create([

            'firstname'=>$this->firstname,
            'surname'=>$this->surname,
            'number_phone'=>$this->numberPhone,
            'address'=>$this->address,
            'mail_address'=>$this->mailAddress

        ]);

        return "Data has been saved!";

    }
    public function insertReservation(Request $request)
    {
        $this->id_r=$request->input('id_r');
        $this->from=$request->input('from');
        $this->to=$request->input('to');

        $customers=Customer::where('mail_address',$this->mailAddress)->get();

        foreach($customers as $c)
        {
            $this->id_c=$c->id;

        }

        $save=Reservation::create([
            'id_r'=>$this->id_r,
            'id_c'=>$this->id_c,
            'from'=>$this->from,
            'to'=>$this->to
            
        ]);

    }
    public function searchRoom(Request $request)
    {
        //$this->typeRoom=$request->input('typeRoom');

        $this->typeRoom=2;
        $this->glob_status="";

        $this->is_Free();

        return $this->glob_status_s;

    }
    public function canceledReservation(Request $request)
    {

    }

}