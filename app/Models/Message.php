<?php

namespace App\Models;
use Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'to_id',
        'from_id',
        'deleted_by',
        'message',
        'media',
        'message_type',
        'is_read'
    ];
    
    public static function getAllMessages($where = [], $orWhere = [], $user = null)
    {
        $query = self::select(
            'messages.*',
            \DB::raw("CONCAT(to.first_name, ' ', to.last_name) as to_fullname"),
            'to.email as to_email',
            'to.image as to_picture',
            'to.user_type as to_user_type',
            \DB::raw("CONCAT(from.first_name, ' ', from.last_name) as from_fullname"),
            'from.email as from_email',
            'from.image as from_picture',
            'from.user_type as from_user_type',
        )
            ->leftJoin('users as to', function($join) {
                $join->on('to.id', '=', 'messages.to_id');
            })
            ->leftJoin('users as from', function($join) {
                $join->on('from.id', '=', 'messages.from_id');
            })
            ->where('deleted_by', '<>', $user) // not deleted by current user
            ->where($where)
            ->orWhere(function($query) use ($orWhere) {
                $query->where($orWhere);
            })
            ->orderBy('messages.id', 'ASC')
            ->get();

            foreach ($query as $key => $record) {
                $query[$key]->latestCreatedAtFromat = $record->created_at->diffForHumans();
            }
        return $query;
    }
    
    public static function createNewMessages($data = [])
    {
        $query = self::create($data);

        return $query;
    }
    
    public static function getUserMessages($where = [], $filters = [])
    {
        $query = self::select(
            'messages.*',
            'users.image as from_user_profile',
            'users.id as from_user_id',
            'users.first_name as from_user_first_name',
            'users.last_name as from_user_last_name',
        )
            ->leftJoin('users', 'users.id', '=', 'messages.from_id')
            //->where('deleted_by', '<>', $user) // not deleted by current user
            ->where($where)
            ->orderBy('id', 'DESC')
            ->groupBy('messages.id');



        return $query->get();
    }
    
        
    public static function getUsers($user = null)
    {
        $where   = ['to_id' => $user];
        $orWhere = ['from_id' => $user];
        $query   = self::select(
            'messages.*',
            'to.first_name as to_fullname',
            'to.email as to_email',
            'to.image as to_picture',
            'from.first_name as from_fullname',
            'from.email as from_email',
            'from.image as from_picture',
            'from.user_type as from_user_type',
            \DB::raw("IF(`to_id`='".$user."',`from_id`,IF(`from_id`='".$user."',`to_id`,0)) as checking"),
            \DB::raw("IF(`to_id`='".$user."', CONCAT(from.first_name, ' ', from.last_name), IF(`from_id`='".$user."', CONCAT(to.first_name, ' ', to.last_name), '')) as username"),
            \DB::raw("IF(`to_id`='".$user."',from.image,IF(`from_id`='".$user."',to.image,'')) as userpic"),
            \DB::raw("IF(`to_id`='".$user."',from.user_type,IF(`from_id`='".$user."',to.user_type,'')) as usertype"),
        )
            ->leftJoin('users as to', function($join) {
                $join->on('to.id', '=', 'messages.to_id');
            })
            ->leftJoin('users as from', function($join) {
                $join->on('from.id', '=', 'messages.from_id');
            })
            ->where('deleted_by', '<>', $user) // not deleted by current user
            ->where($where)
            ->orWhere(function($query) use ($orWhere) {
                $query->where($orWhere);
            })
            ->orderBy('messages.created_at', 'DESC')
            ->groupBy('checking')
            ->get();

        // getting last message and it's details
        foreach ($query as $key => $record) {
            if($record->deleted_by==1){
                    unset($query[$key]);
            }else{
                        $latestRecord = self::select(
                            'messages.*'
                        )
                        ->where('deleted_by', '<>', $user) // not deleted by current user
                        ->whereRaw("(
                            (from_id = '$user' AND to_id = '$record->checking') OR
                            (from_id = '$record->checking' AND to_id = '$user')
                        )")
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    $query[$key]->latestMessage   = $latestRecord->message;
                    $query[$key]->latestCreatedAt = $latestRecord->created_at;
                    $query[$key]->latestMessageShort   = Str::words(strip_tags($latestRecord->message), 11, '.....');
                    $query[$key]->latestCreatedAtFromat = $latestRecord->created_at->diffForHumans(); 
            }

        }

        // showing recent chatted records first
        $data = [];
        foreach ($query as $key => $record) {
            // if more than 1 user send messages on same time i.e. same second then
            // $record->checking which is a user ID will differentiate the array key
            $data[$record->latestCreatedAt->toDateTimeString() . '-' . $record->checking] = $record;
        }

        krsort($data);

        return $data;
    }
    
    public static function updateMessaes($where = [], $data = [])
    {
        $query = self::where($where)->update($data);

        return $query;
    }
}
