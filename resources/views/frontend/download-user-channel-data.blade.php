<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
<style type="text/css">
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 2px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
</style>
</head>
<body style="background-color: #ebf2f5;">
    <div style="margin: 0 auto;">
        <?php /* <img src="{!! asset('assets/frontend/website/assets/images/logo.png') !!}"style="width: 40%;" />
    </div>*/ ?>
    <br>
    <table style="font-size: 13px;">
        <tr>
            <td>Client Name</td>
            <td> : {!! isset($channelClients->first_name) ? $channelClients->first_name : '' . ' ' . (isset($channelClients->last_name) ? $channelClients->last_name : '') !!}</td>
        </tr>
        <tr>
            <td>Company Name</td>
            <td> : {!! isset($channelClients->company_name) ? $channelClients->company_name : '' !!}</td>
        </tr>
        <tr>
            <td>Contact</td>
            <td> : {!! isset($channelClients->phone_num) ? $channelClients->phone_num : '' !!}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td> : {!! isset($channelClients->email) ? $channelClients->email : '' !!}</td>
        </tr>
    </table>
    <br>
     <table  id="customers" style="page-break-inner: avoid !important;font-size: 13px;">
        <tr style="text-align: left;background-color: White;;">
            <td>S #</td>
            <td>Question & Answers</td>
        </tr>
        @if ($userChannelsdata && !empty($userChannelsdata ))
            @foreach($userChannelsdata AS $Key => $value)
                    <tr>
                        <td>Q {!! ($s_no += 1) !!}</td>
                @if(preg_match('/Business_Name/', $Key) == true)
                        <td>{!! getChannelQuestions(substr($Key, 0, -2)) !!} {!! ($business_no += 1) !!}</td>
                @elseif(preg_match('/Business_EIN_No/', $Key) == true)
                        <td>{!! getChannelQuestions(substr($Key, 0, -2)) !!} {!! ($business_ein_no += 1) !!}</td>
                @elseif(preg_match('/Carrier/', $Key) == true)
                        <td>{!! getChannelQuestions(substr($Key, 0, -1)) !!} {!! ($Carrier += 1) !!}</td>
                @elseif(preg_match('/User_Name/', $Key) == true)
                        <td>{!! getChannelQuestions(substr($Key, 0, -1)) !!} {!! ($User_Name += 1) !!}</td>
                @elseif(preg_match('/Password/', $Key) == true)
                        <td>{!! getChannelQuestions(substr($Key, 0, -1)) !!} {!! ($Password += 1) !!}</td>
                @else
                        <td>{!! getChannelQuestions($Key) !!}</td>
                @endif
                    </tr><tr>
                        <td>Ans </td>
                        <td>{!! $value !!}</td>
                    </tr>
            @endforeach
        @endif
    </table>
</body>
</html>