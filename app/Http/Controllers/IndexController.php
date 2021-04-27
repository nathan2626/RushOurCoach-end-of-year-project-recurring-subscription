<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSendRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sendContact(ContactSendRequest $request)
    {

        // I chose to customize the messages here because
        // if I go through the requests and there is an error,
        // the message will be displayed "The full name contact field is required.",
        // and I don’t want that.

        $emailContactVerif =  $request->get('email_contact');
        $fullNameContactVerif =  $request->get('full_name_contact');

        // Because I don’t go through the requests (top reason)
        $emailIsValid = $request->get('email_contact');
        $email_format = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';

        if(!preg_match($email_format, $emailIsValid)) {
            return redirect('/#contactUs')
                ->with('error',"Le champ email n'est pas valide.")->withInput();
        }

        if(!$emailContactVerif && !$fullNameContactVerif){
            return redirect('/#contactUs')
                ->with('error',"Les champs email et nom/prénom sont obligatoires.")->withInput();
        }

        if(!$emailContactVerif){
            return redirect('/#contactUs')
                ->with('error',"Le champ email est obligatoire.")->withInput();
        }

        if(!$fullNameContactVerif){
            return redirect('/#contactUs')
                ->with('error',"Le champ nom/prénom est obligatoire.")->withInput();
        }

        $params = [
            'coach_select_contact' => $request->get('coach_select_contact'),
            'amateur_select_contact' => $request->get('amateur_select_contact'),
            'message_contact' => $request->get('message_contact'),
            'email_contact' => $request->get('email_contact'),
            'full_name_contact' => $request->get('full_name_contact'),
            'subject_contact' => $request->get('subject_contact'),
        ];


        Mail::to(Config::get('contact.email'))->send(new ContactMail($params));

        return redirect('/#contactUs')
            ->with('status', 'Votre demande de contact a bien été envoyée, nous vous répondrons sous 24h !');

    }
}
