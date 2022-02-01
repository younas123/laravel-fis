<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\FunctionArea;
use PhpParser\Node\Stmt\Return_;

class function_areacontroller extends Controller
{
    public function index(){
        return FunctionArea::get()->toArray();
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


        try {
            $fas = FunctionArea::create($request->all());
            return response()->json($fas);
        } catch (\Throwable $th) {
            return response()->json("Error Creating Function Area");
        }
    }

    public function fAreaByid($id){
        
        try {
            $fa = FunctionArea::where("fam_id",$id)->first();
            return response()->json($fa);
        } catch (\Throwable $th) {
            return response()->json("Data Not Found ...!".$id);
        }
    }

    public function fAreaUpdate(Request $request, $id){
        try {
            $faid = FunctionArea::where("fam_id",$id)->first();
            $faid->Fam_Desc = $request->Fam_Desc;
            $faid->Fam_Year = $request->Fam_Year;
            $faid->save();
            Return response()->json("Data Update ".$id);

        } catch (\Throwable $th) {
            Return response()->json("Updation Failed ...");
        }
    }

    public function fAreaDestroy($id){
        try {
            $faid = FunctionArea::where("fam_id",$id)->first();
            $faid->delete();
            Return response()->json("Data Deleted Fam_Id= ".$id);

        } catch (\Throwable $th) {
            Return response()->json("Deletion Failed ...");
        }
    }
}
