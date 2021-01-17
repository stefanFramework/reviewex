<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

use App\Domain\Models\PhoneLine;
use App\Domain\Models\PhoneLineMessage;
use App\Domain\Repositories\PhoneLineRepository;
use App\Http\Front\ViewModels\PhoneLineMessageViewModel;
use App\Http\Front\ViewModels\PhoneLineViewModel;

class MessagesController extends Controller
{
    private PhoneLineRepository $phoneLineRepository;

    public function __construct(PhoneLineRepository $phoneLineRepository)
    {
        $this->phoneLineRepository = $phoneLineRepository;
    }

    public function index(int $phoneLineId)
    {
        /** @var PhoneLine $phoneLine */
        $phoneLine = $this->phoneLineRepository->findById($phoneLineId);
        $messages = $phoneLine->getLatestMessages();

        return View::make('messages', [
            'phoneLine' => $this->buildViewModel($phoneLine, $messages)
        ]);
    }

    private function buildViewModel(PhoneLine $phoneLine, $messages) 
    {
        $vm = new PhoneLineViewModel();
        $vm->id = $phoneLine->id;
        $vm->number = $phoneLine->number;
        $vm->messages = $this->buildMessagesViewModel($messages);
        $vm->country = $phoneLine->country->name;

        return $vm;
    }

    private function buildMessagesViewModel($messages)
    {
        return $messages->map(function (PhoneLineMessage $message) {
            $vm = new PhoneLineMessageViewModel();
            $vm->id = $message->id;
            $vm->from = $message->from;
            $vm->message = $message->message;
            $vm->date = $message->created_at;

            return $vm;
        })->toArray(); 
    }
}