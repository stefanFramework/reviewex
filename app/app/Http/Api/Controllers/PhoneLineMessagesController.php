<?php

namespace App\Http\Api\Controllers;

use Throwable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Domain\Models\PhoneLineMessage;
use App\Domain\Repositories\RepositoryInterfaces\IPhoneLineRepository;
use App\Http\Api\Exceptions\ValidationException;


class PhoneLineMessagesController extends Controller
{
    private $phoneLineRepository;

    public function __construct(IPhoneLineRepository $phoneLineRepository)
    {
        $this->phoneLineRepository = $phoneLineRepository;
    }

    public function validateInput(array $inputData)
    {
        $rules = [
            'phone_line' => 'required',
            'from' => 'required|max:150',
            'message' => 'required'
        ];

        $validator = Validator::make($inputData, $rules);

        if ($validator->fails()) {
            throw new ValidationException('Invalid Input');
        }
    }

    public function store(Request $request)
    {
        try {
            $inputData = $request->only(['phone_line', 'from', 'message']);
            $this->validateInput($inputData);

            $phonLine = $this->phoneLineRepository->findByNumber($inputData['phone_line']);
            
            $phoneLineMessage = new PhoneLineMessage();
            $phoneLineMessage->phoneLine()->associate($phonLine);
            $phoneLineMessage->from = $inputData['from'];
            $phoneLineMessage->message = $inputData['message'];
            $phoneLineMessage->save();

            return response()->json([], 201);

        } catch(ValidationException $vex) {
            Log::error('api.phone_line_message.error', ['error' => $vex->getMessage()]);
            return response()->json(['error' => $vex->getMessage()], 400);
        } catch(Throwable $ex) {
            Log::error('api.phone_line_message.error', ['error' => $ex->getMessage()]);
            return response()->json(['error' => 'Unable to save message'], 500);
        }
        
    }

}