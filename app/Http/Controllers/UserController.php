<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;

class UserController extends Controller
{

    public function updatePass(Request $request)
    {
        $table = user::where("email",$request["email"])->update(['password' => md5($request['password'])]);
        if ($table) {
            echo md5($request['password']);
        }else{
            echo "Update Err";
        }
    }

    public function updateUser(Request $request){

        $table = user::where("id",$request['id'])->update(['name'=>$request['name'],'email'=>$request['email'],'phone'=>$request['phone'],'age'=>$request['age'],'gender'=>$request['gender']]);
        if($table){
            echo "Successfully";
        }else{
            echo "Err update";
        }
    }


    public function register(Request $request)
    {
    	if($request->has('name') && $request->has('email') && $request->has('password')){
    		$name = $request->name;
    		$email = $request->email;
    		$password = $request->password;
    		if($name != null && $email != null && $password != null){
    			$table = new user();
    			$table->name = $name;
    			$table->email = $email;
    			$table->password = md5($password);
    			$table->token = Str::Random(60);
                $table->avatar='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRDsanOS9e9oVDhhABGmoSHdjCkXnhfOyXMgg&usqp=CAU';
                $table->id_hierarchy=1;
    			$table->save();
                if($table){
                    echo "Susscess";
                }else{
                    echo "Account already exists";
                }
    			
    		}else{
    			echo "Erro Data";
    		}
    	}else{
    		echo "null send datta";
    	}
    }

    public function getData(){
        $table = user::all();
        return $this->respondWithJson($table,$table->count());
    }

    public function login(Request $request){
        if($request->has('name') && $request->has('password')){
            $name = $request->name;
            $password = $request->password;

            if($name != null && $password != null){
                $table = user::where([['email','=',$name],['password','=',md5($password)]])->get();
                if($table){
                    $data=['status'=>'200','data'=>$table[0]];
                    echo json_encode($data);
                }
            }else{
                echo "Data not null";
            }

        }else{
            echo "No send data";
        }
    }

    public function getNameUser(Request $request){

        $table = user::where('id',$request['id'])->get();
        echo $table[0]["name"];

    }

    public function respondWithJson($data,$total)
    {
        return response()->json([
            'message' => 'Successfully',
            'statuscode' => '200',
            'total' => $total,
            'data' => $data,
        ]);
    }

}
