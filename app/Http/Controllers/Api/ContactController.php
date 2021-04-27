<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnulationFormRequest;
use App\Http\Requests\ContactSendRequest;
use App\Mail\AnnulationMail;
use App\Mail\ContactMail;
use App\Mail\ReservationMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(ContactSendRequest $request)
    {
        $emailContactVerif =  $request->get('email_contact');
        $fullNameContactVerif =  $request->get('full_name_contact');

        $emailIsValid = $request->get('email_contact');
        $email_format = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';

        if(!preg_match($email_format, $emailIsValid)) {
            return response()->json(['error' => "Le champ email n'est pas valide."], 400);
        }

        if(!$emailContactVerif && !$fullNameContactVerif){
            return response()->json(['error' => "Les champs email et nom/prénom sont obligatoires."], 400);
        }

        if(!$emailContactVerif){
            return response()->json(['error' => "Le champ email est obligatoire."], 400);
        }

        if(!$fullNameContactVerif){
            return response()->json(['error' => "Le champ nom/prénom est obligatoire."], 400);
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

        return response()->json(['status' => 'Votre demande de contact a bien été envoyée, nous vous répondrons sous 24h !' ], 201);

    }
}
