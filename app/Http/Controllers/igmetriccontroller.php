<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Igmetricm;
use App\Igmetricd;


class igmetriccontroller extends Controller
{
    public function index(){
        // try {
            return Igmetricm::with("igmetricsr")->get()->toArray();
        // } catch (\Throwable $th) {
        //     return response()->json("Data Not Found");
        // }
    }

    public function save(Request $request){
// // dd($request);
//         // return "store data";
//         $user = myapi::create($request->all());
//         // return $user." - ".$user->id;
//         // $arr = $request();
//         $addr = $request->addresses;
//         $cnt = count($addr);
//         // return $cnt;
//         // $narr = Arr::set($addr,'address.idm_id',$user->id);
        
//         // return print_r($addr);


//         // for($a =0; $a<$cnt; $a++){
//         //     $addr['idm_id']=$user->id;
//         // }
        
//         $ind=0;
//         foreach($addr as $ad){
//             $addr[$ind]['idm_id']=$user->id;
//             $ind++;
//         }

//         $adr = Address::insert($addr);
//         // return print_r($addr);
//         // return print_r($request->addresses);
//         return response()->json($user,201);


    //     $val = validator([
    //         'Fam_Desc' => require(),
    //         'Fam_Year' => require()
    //     ]);

    //   $obj = [
    //       'Fam_Desc' => $request->Fam_Desc,
    //       'Fam_Year' => $request->Fam_Year
    //   ];


        // try {
            $ig_mast = Igmetricm::create($request->all());
            $ig_dets = $request->igmdetail;
            // dd($ig_mast);
            $ind=0;
            foreach($ig_dets as $ig_det){
                $ig_dets[$ind]['igmetricms_id'] = $ig_mast->id;
                $ind++;
            }
            // print_r($ig_dets);
            $igdetail = Igmetricd::insert($ig_dets);
            return response()->json("Data Saved ...");
        // } catch (\Throwable $th) {
        //     return response()->json("Data Not Saved");
        // }
    }

    public function igMetricByid($id){
        
        try {
            $igm = Igmetricm::with("igmetricsr")->where("id",$id)->first();
            return response()->json($igm);
        } catch (\Throwable $th) {
            return response()->json("Data Not Found ...!".$id);
        }
    }

    public function igMetricUpdate(Request $request){

        try {
            $igmid = Igmetricm::find($request->id);
            $igmid["funcareas_id"] = $request->funcareas_id;
            $igmid["igm_desc"] = $request->igm_desc;
            $igmid["igm_func_area"] = $request->igm_func_area;
            $igmid["igm_active"] = $request->igm_active;
            $igmid->save();
            
            Igmetricd::where('igmetricms_id','=',$request->id)->delete();

            // inserting detail data
            $ig_dets = $request->igmdetail;
            $ind=0;
            foreach($ig_dets as $ig_det){
                $ig_dets[$ind]['igmetricms_id'] = $igmid["id"];
                $ind++;
            }
            // print_r($ig_dets);
            $igdetail = Igmetricd::insert($ig_dets);

            Return response()->json("Data Update ".$request->id);

        } catch (\Throwable $th) {
            Return response()->json("Updation Failed ...");
        }
    }

    public function igMetricDestroy($id){
        try {
            // $igmid = Igmetricm::find($id);
            // $igmid->save();
            
            Igmetricd::where('igmetricms_id','=',$id)->delete();
            Igmetricm::find($id)->delete();
            Return response()->json("Data Deleted Fam_Id= ".$id);
        } catch (\Throwable $th) {
            Return response()->json("Deletion Failed ...");
        }
    }
}
