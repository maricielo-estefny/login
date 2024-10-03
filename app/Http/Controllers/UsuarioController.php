<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public static function verificaemail($email)
    {
    
        try{
            $resultdata = Usuario::select('id','email')
            ->where('email', '=', $email)
            ->where('estado', '=', 1)
            ->first();
            if($resultdata == null){
                return response()->json([
                "status" => 400,
                "data" => $resultdata,
                "login" => false
                ]);
                }
            else{
                return response()->json([
                    "status" => 200,"data" => $resultdata,
                    "login" => true
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                "status" => 500,
                "error" => "Error: " . $e->getMessage()
                ]);
        }
    }
    public static function verificaclave($email,$password)
    {
        $resultdata ='';
        try{
            $resultdata = Usuario::select('id','email')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->where('estado', '=', 1)
            ->first();
            if($resultdata == null){
                return response()->json([
                "status" => 400,
                "data" => $resultdata,
                "login" => false
                ]);
            }
            else
            {
                return response()->json([
                "status" => 200,
                "data" => $resultdata,
                "login" => true
                ]);
            }
        }catch (Exception $e) {
            return response()->json([
            "status" => 500,
            "error" => "Error: " . $e->getMessage()
            ]);
        }
    }

}
