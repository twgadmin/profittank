<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset the admins table
         */
        if (\App::environment('local')) {
            \DB::table('states')->truncate();
        }

        $source      = 'public/assets/img/states/';
        $destination = 'public/uploads/states/';
        @mkdir($destination, 0755, true);

        $data = [
                'name'       => 'Alabama',
                'short_code' => 'al',
                'image'      => 'al.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Alaska',
                'short_code' => 'ak',
                'image'      => 'ak.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Arizona',
                'short_code' => 'az',
                'image'      => 'az.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Arkansas',
                'short_code' => 'ar',
                'image'      => 'ar.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'California',
                'short_code' => 'ca',
                'image'      => 'ca.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Colorado',
                'short_code' => 'co',
                'image'      => 'co.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Connecticut',
                'short_code' => 'ct',
                'image'      => 'ct.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Delaware',
                'short_code' => 'de',
                'image'      => 'de.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Florida',
                'short_code' => 'fl',
                'image'      => 'fl.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Georgia',
                'short_code' => 'ga',
                'image'      => 'ga.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Hawaii',
                'short_code' => 'hi',
                'image'      => 'hi.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Idaho',
                'short_code' => 'id',
                'image'      => 'id.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Illinois',
                'short_code' => 'il',
                'image'      => 'il.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Indiana',
                'short_code' => 'in',
                'image'      => 'in.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Iowa',
                'short_code' => 'ia',
                'image'      => 'ia.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Kansas',
                'short_code' => 'ks',
                'image'      => 'ks.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);
        
        $data = [
                'name'       => 'Kentucky',
                'short_code' => 'ky',
                'image'      => 'ky.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);
        
        $data = [
                'name'       => 'Louisiana',
                'short_code' => 'la',
                'image'      => 'la.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Maine',
                'short_code' => 'me',
                'image'      => 'me.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Maryland',
                'short_code' => 'md',
                'image'      => 'md.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Massachusetts',
                'short_code' => 'ma',
                'image'      => 'ma.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Michigan',
                'short_code' => 'mi',
                'image'      => 'mi.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Minnesota',
                'short_code' => 'mn',
                'image'      => 'mn.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Mississippi',
                'short_code' => 'ms',
                'image'      => 'ms.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Missouri',
                'short_code' => 'mo',
                'image'      => 'mo.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Montana',
                'short_code' => 'mt',
                'image'      => 'mt.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Nebraska',
                'short_code' => 'ne',
                'image'      => 'ne.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Nevada',
                'short_code' => 'nv',
                'image'      => 'nv.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'New Hampshire',
                'short_code' => 'nh',
                'image'      => 'nh.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'New Jersey',
                'short_code' => 'nj',
                'image'      => 'nj.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'New Mexico',
                'short_code' => 'nm',
                'image'      => 'nm.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'New York',
                'short_code' => 'ny',
                'image'      => 'ny.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'North Carolina',
                'short_code' => 'nc',
                'image'      => 'nc.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'North Dakota',
                'short_code' => 'nd',
                'image'      => 'nd.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Ohio',
                'short_code' => 'oh',
                'image'      => 'oh.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Oklahoma',
                'short_code' => 'ok',
                'image'      => 'ok.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Oregon',
                'short_code' => 'or',
                'image'      => 'or.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Pennsylvania',
                'short_code' => 'pa',
                'image'      => 'pa.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Rhode Island',
                'short_code' => 'ri',
                'image'      => 'ri.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'South Carolina',
                'short_code' => 'sc',
                'image'      => 'sc.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'South Dakota',
                'short_code' => 'sd',
                'image'      => 'sd.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Tennessee',
                'short_code' => 'tn',
                'image'      => 'tn.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Texas',
                'short_code' => 'tx',
                'image'      => 'tx.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Utah',
                'short_code' => 'ut',
                'image'      => 'ut.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Vermont',
                'short_code' => 'vt',
                'image'      => 'vt.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Virginia',
                'short_code' => 'va',
                'image'      => 'va.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Washington',
                'short_code' => 'wa',
                'image'      => 'wa.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'West Virginia',
                'short_code' => 'wv',
                'image'      => 'wv.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Wisconsin',
                'short_code' => 'wi',
                'image'      => 'wi.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

        $data = [
                'name'       => 'Wyoming',
                'short_code' => 'wy',
                'image'      => 'wy.png',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ];
        \DB::table('states')->insert($data);
        copy($source . $data['image'], $destination . $data['image']);

    }
}
