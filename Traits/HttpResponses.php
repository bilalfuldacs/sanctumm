<?php
namespace App\Traits;
trait HttpResponses{//three arguements givern to succes 1st is data 2nd is message and 3rd id status code
    protected function succes($data,$message=null,$code=200){
return response()->json(
    [
        'status'=>'reauest was successfull',
        'message'=>$message,
        'data'=> $data
    ],$code
);//json will accept ana rray and will convert it to json object

    }
    protected function error($data, $message = null, $code)
    {
        return response()->json(
            [
                'status' => 'error has occured',
                'message' => $message,
                'data' => $data
            ],
            $code
        ); //json will accept ana rray and will convert it to json object

    }
}
