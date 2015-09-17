
<?php


class ServiceStageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('service_stage')->delete();
        
        $service_stage = array(
            ['id'=>1, 
            'money'=>0, 
            'point'=>250, 
            'order_low_term'=>7, 
            'order_high_term'=>7],

            ['id'=>2, 
            'money'=>300, 
            'point'=>250, 
            'order_low_term'=>3, 
            'order_high_term'=>8],

            ['id'=>3, 
            'money'=>500, 
            'point'=>400, 
            'order_low_term'=>2, 
            'order_high_term'=>12],

            ['id'=>4, 
            'money'=>800, 
            'point'=>700, 
            'order_low_term'=>1, 
            'order_high_term'=>15],
            
        );


        DB::table('service_stage')->insert($service_stage);

    }

}