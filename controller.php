public function contact_query(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $service = $request->input('service');
        $message = $request->input('message');

        $data = array('name' => $name , 'email' =>$email , 'phone' => $phone , 'message' => $message , 'service' => $service );
        DB::table('contact_query')->insert($data);
        return ;
    }
