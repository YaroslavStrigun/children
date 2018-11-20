<?php

namespace App\Http\Controllers;


use App\Http\Requests\MailRequest;
use App\Mail\HelpMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(MailRequest $request)
    {
        $message = new HelpMail($request->all(), 'Вопрос с сайта Ангелы Добра');

        Mail::to(setting('admin_mail', 'yastrigun@mail.com'))->send($message);

        return back()->with('success', ['Спасибо! Ваше сообщение было успешно отправлено.']);

    }
}
