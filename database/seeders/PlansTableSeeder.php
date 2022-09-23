<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset the plans table
         */
        if (\App::environment('local')) {
            \DB::table('plans')->truncate();
        }

        \DB::table('plans')->insert([
            [
                'plan_name'          => 'Single Business',
                'monthly_price'      => 12.99,
                'additional_price'   => 6.99,
                'short_description'  => '<h6>Perfect for:</h6>
                       <p>Individuals with fiduciary responsibilites such as business owners, CFOs, COOs, and General Managers.</p>',
                'detail_description' => '<ul>
                           <li>single user license</li>
                           <li>access to the Profit Generator</li>
                           <li>15 efficiency programs to simulate
                           business growth</li>
                           <li>simple dashboards</li>
                           <li>secure access to industry experts</li>
                           <li>help desk support</li>
                       </ul>',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'plan_name'          => 'Professional Advisor',
                'monthly_price'      => 299.99,
                'additional_price'   => 79.99,
                'short_description'  => '<h6>Perfect for:</h6>
                       <p>For firms or individuals such as CPAs, Accountants, Consultants, Fractional CFOs, and Financial Advisors, who serve in advisory roles</p>',
                'detail_description' => '<ul>
                           <li>A license for 3 users</li>
                           <li>Your clients access ProfiTank for free (savings of $12.99 / mo.)</li>
                           <li>Receive a 30% revenue match on</li>
                           <li>Transactions between your clients and ProfiTank’s channel partners</li>
                           <li>Dashboard to help track clients and print reports</li>
                           <li>Acquire new customers</li>
                           <li>Increase client profit margin and business value</li>
                       </ul>',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'plan_name'          => 'Private Label Professional Advisor 99 Your Logo - Our Technology',
                'monthly_price'      => 449.99,
                'additional_price'   => 99.99,
                'short_description'  => '<h6>Perfect for:</h6>
                       <p>For firms or individuals such as CPAs, Accountants, Consultants, Fractional CFOs, and Financial Advisors, who serve in advisory roles looking to build their brand.</p>',
                'detail_description' => '<ul>
                           <li>A license for 5 users</li>
                           <li>All benefits from Professional Advisors license</li>
                           <li>Increase brand loyalty</li>
                           <li>Take advantage of expert technology and call it your own</li>
                           <li>add an additional revenue source without in-house design/build/ research costs</li>
                       </ul>',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
