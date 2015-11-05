<?php namespace JetCMS\Website\Controllers;

use Mail;
use Request;
use Input;
use Validator;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    /**
     * @param $name
     * @return \Illuminate\View\View
     */
    public function postMailController($name)
    {
        $validator = $this->validator($name);

        if (config('jetcms.form.'.$name) === null)
        {
            return redirect('/form/'.config('jetcms.setting.default_form'));
        }

        if (!$validator->fails())
        {
            Mail::send('emails.default', array('input' => Input::all(),'name'=>$name), function($message) use ($name)
            {
                foreach (config('jetcms.setting.email_to') as $val)
                {
                    $message->to($val, config('mail.from.name'))->subject(config('jetcms.form.'.$name.'.email_subject','Form send'));
                }

                foreach (config('jetcms.form.'.$name.'.email_to') as $val)
                {
                    $message->to($val, config('mail.from.name'))->subject(config('jetcms.form.'.$name.'.email_subject','Form send'));
                }
            });

            if (config('jetcms.form.'.$name.'.success_redirect') !== null)
            {
                return redirect(config('jetcms.form.'.$name.'.success_redirect'));
            }
            return redirect('/form/'.$name.'/success');
        }

        Request::flashOnly(config('jetcms.form.'.$name.'.flash_only'),config('jetcms.form.'.$name.'.only'));
        return view(config('jetcms.form.'.$name.'.layouts','form.layouts.master'),[
            'content'=>view('form.'.$name,[
                'errors' => $validator->errors()
            ])
        ]);
    }

    public function getMailController($name)
    {
        if (config('jetcms.form.'.$name) === null)
        {
            return redirect('/form/'.config('jetcms.setting.default_form'));
        }

        return view(config('jetcms.form.'.$name.'.layouts','tpl.form.layouts.master'),[
            'content'=>view('form.'.$name)
        ]);
    }

    public function anySuccess($name)
    {
        return view(config('jetcms.form.'.$name.'.layouts','form.layouts.master'),[
            'content'=>view(config('jetcms.form.'.$name.'.success_tpl','form.success.default'))
        ]);
    }

    protected function validator ($name)
    {
        return Validator::make(
            Request::only(config('jetcms.form.'.$name.'.only')),
            config('jetcms.form.'.$name.'.vlidation'),
            config('jetcms.form.'.$name.'.description')
        );
    }
}

