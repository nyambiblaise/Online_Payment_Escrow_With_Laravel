<?php

namespace App\Http\Controllers;

use App\Events\UpdateChatAdminNotification;
use App\Events\UpdateChatUserNotification;
use App\Models\Admin;
use App\Models\ChatNotification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;

class ChatNotificationController extends Controller
{
    public function showByAdmin($id)
    {
        $siteNotifications = ChatNotification::whereHasMorph(
            'chatNotificational',
            [
                User::class,
                Admin::class
            ],
            function ($query) use ($id) {
                $query->where([
//                    'chat_notificational_id' => Auth::id()
                    'escrow_id' => $id,
                ]);
            }
        )->with('chatNotificational:id,username,image')->get();

        return $siteNotifications;
    }

    public function show($id)
    {
        $siteNotifications = ChatNotification::whereHasMorph(
            'chatNotificational',
            [
                User::class,
                Admin::class,
            ],
            function ($query) use ($id) {
                $query->where([
                    'escrow_id' => $id,
//                    'chat_notificational_id' => Auth::id()
                ]);
            }
        )->with('chatNotificational:id,username,image')->get();

        return $siteNotifications;
    }

    public function newMessage(Request $request)
    {

        $rules = [
            'escrowId' => ['required'],
            'message' => ['required']
        ];

        $req = Purify::clean($request->all());
        $validator = Validator::make($req, $rules);
        if ($validator->fails()) {
            return response(['errors' => $validator->messages()], 200);
        }


        $user = auth::user();
        $ecrowId = $req['escrowId'];

        $chat = new ChatNotification();
        $chat->description = $req['message'];
        $chat->escrow_id = $ecrowId;
        $log = $user->chatNotificational()->save($chat);


        $data['id'] = $log->id;
        $data['escrow_id'] = $log->escrow_id;
        $data['chat_notificational_id'] = $log->chat_notificational_id;
        $data['chat_notificational_type'] = $log->chat_notificational_type;
        $data['chat_notificational'] = [
            'fullname' => $log->chatNotificational->fullname,
            'id' => $log->chatNotificational->id,
            'image' => $log->chatNotificational->image,
            'mobile' => $log->chatNotificational->mobile,
            'photo' => $log->chatNotificational->photo,
            'profileName' => $log->chatNotificational->profileName,
            'username' => $log->chatNotificational->username,
        ];
        $data['description'] = $log->description;
        $data['is_read'] = $log->is_read;
        $data['is_read_admin'] = $log->is_read_admin;
        $data['formatted_date'] = $log->formatted_date;
        $data['created_at'] = $log->created_at;
        $data['updated_at'] = $log->updated_at;

        event(new \App\Events\UserChatNotification($data, $ecrowId));

        return response(['success' => true], 200);
    }


    public function newMessageByAdmin(Request $request)
    {

        $rules = [
            'escrowId' => ['required'],
            'message' => ['required']
        ];

        $req = Purify::clean($request->all());
        $validator = Validator::make($req, $rules);
        if ($validator->fails()) {
            return response(['errors' => $validator->messages()], 200);
        }


        $user = auth::guard('admin')->user();
        $ecrowId = $req['escrowId'];

        $chat = new ChatNotification();
        $chat->description = $req['message'];
        $chat->escrow_id = $ecrowId;
        $log = $user->chatNotificational()->save($chat);


        $data['id'] = $log->id;
        $data['escrow_id'] = $log->escrow_id;
        $data['chat_notificational_id'] = $log->chat_notificational_id;
        $data['chat_notificational_type'] = $log->chat_notificational_type;
        $data['chat_notificational'] = [
            'fullname' => $log->chatNotificational->fullname,
            'id' => $log->chatNotificational->id,
            'image' => $log->chatNotificational->image,
            'mobile' => $log->chatNotificational->mobile,
            'photo' => $log->chatNotificational->photo,
            'profileName' => $log->chatNotificational->profileName,
            'username' => $log->chatNotificational->username,
        ];
        $data['description'] = $log->description;
        $data['is_read'] = $log->is_read;
        $data['is_read_admin'] = $log->is_read_admin;
        $data['formatted_date'] = $log->formatted_date;
        $data['created_at'] = $log->created_at;
        $data['updated_at'] = $log->updated_at;

        event(new \App\Events\UserChatNotification($data, $ecrowId));
        return response(['success' => true], 200);
    }

    public function readAt($id)
    {
        $siteNotification = ChatNotification::find($id);
        if ($siteNotification) {
            $siteNotification->delete();
            if (Auth::guard('admin')->check()) {
                event(new UpdateChatAdminNotification(Auth::id()));
            } else {
                event(new UpdateChatUserNotification(Auth::id()));
            }
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        return $data;
    }

    public function readAllByAdmin()
    {
        $siteNotification = ChatNotification::whereHasMorph(
            'chatNotificational',
            [Admin::class],
            function ($query) {
                $query->where([
                    'chat_notificational_id' => Auth::id()
                ]);
            }
        )->delete();

        if ($siteNotification) {
            event(new UpdateChatAdminNotification(Auth::id()));
        }
        $data['status'] = true;
        return $data;
    }

    public function readAll()
    {
        $siteNotification = ChatNotification::whereHasMorph(
            'chatNotificational',
            [User::class],
            function ($query) {
                $query->where([
                    'chat_notificational_id' => Auth::id()
                ]);
            }
        )->delete();
        if ($siteNotification) {
            event(new UpdateChatUserNotification(Auth::id()));
        }

        $data['status'] = true;
        return $data;
    }
}
