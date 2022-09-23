<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset the site_settings table
         */
        if (\App::environment() == 'local') {
            \DB::table('channels')->truncate();
        }

        $source      = 'public/assets/frontend/channels/';
        $destination = 'public/uploads/channels/';
        @mkdir($destination, 0755, true);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'cost-segregation-questions',
            'name'                     => 'COST SEGREGATION',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'employee-retention-tax-credit',
            'name'                     => 'EMPLOYEE RETENTION TAX CREDIT',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'health-care',
            'name'                     => 'HEALTHCARE',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'medical-waste',
            'name'                     => 'MEDICAL WASTE',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'merchant-processing',
            'name'                     => 'MERCHANT PROCESSING',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'peo',
            'name'                     => 'PEO',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'property-tax',
            'name'                     => 'PROPERTY TAX',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'r-and-d-credits',
            'name'                     => 'R&D CREDITS',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'robotic-processing-automation',
            'name'                     => 'ROBOTIC PROCESS AUTOMATION',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'shipping',
            'name'                     => 'SHIPPING',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'solid-waste-and-recycling',
            'name'                     => 'SOLID WASTE & RECYCLING',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'telecom',
            'name'                     => 'TELECOM',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'utilities',
            'name'                     => 'UTILITIES',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'workers-compensation',
            'name'                     => 'WORKERS COMPENSATION',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);

        $data = [
            'channel_partner_id'       => '',
            'identifier'               => 'wotc',
            'name'                     => 'WOTC',
            'video_cover'              => 'video-cover.jpg',
            'video_url'                => 'https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun',
            'description'              => 'Get Familiar With The Hiring Tax Credit Program And Follow The Steps Outlined In The Following Video.',
            'user_completion_time'     => '20',
            'estimate_turnaround_time' => '4',
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s')
        ];

        \DB::table('channels')->insert($data);
        copy($source . $data['video_cover'], $destination . $data['video_cover']);
    }
}
