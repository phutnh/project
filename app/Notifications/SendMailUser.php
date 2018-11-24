<?php

namespace DHPT\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMailUser extends Notification
{
  use Queueable;

  protected $data;

  public function __construct($data)
  {
     $this->data = $data;
  }

  public function via($notifiable)
  {
      return ['mail'];
  }

  public function toMail($notifiable)
  {
    $content = $this->data;
    return (new MailMessage)->greeting($content['greeting'])
      ->subject($content['subject'])
      ->line($content['line'])
      ->action($content['action'])
      ->line($content['line']);
  }

  public function toArray($notifiable)
  {
    return [
    ];
  }
  
  // Hướng dẫn
  /*
  $content_mail['greeting'] = 'Xin chào bạn';
  $content_mail['subject'] = 'Hợp đồng mới';
  $content_mail['line'] = 'Một tài khoản đã gửi yêu cầu duyệt hợp đồng';
  $content_mail['action'] = 'Bạn có thể truy cập <a>link</a> để xem chi tiết';
  $content_mail['line'] = 'Vui lòng vào trang quản lý để duyệt hợp đồng này';
  $user = NhanVien::find($id_nhanvien);
  $user->notify(new SendMessage($content_mail));
  */
}
