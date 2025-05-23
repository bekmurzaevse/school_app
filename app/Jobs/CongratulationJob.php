<?php

namespace App\Jobs;

use App\Exceptions\ApiResponseException;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CongratulationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // if ($this->employeeId == 0 || $this->text == "") {
            $list = Employee::all();
            foreach ($list as $employee){
                $date = Carbon::create($employee->birth_date);
                if ($date->month == Carbon::now()->month && $date->day == Carbon::now()->day){
                    Http::withHeaders([
                        'Authorization' => 'Bearer ' . $this->getToken(),
                    ])->post('notify.eskiz.uz/api/message/sms/send', [
                        'mobile_phone' => $employee->phone,
                        'message' => 'Это тест от Eskiz',
                        'from' => '4546',
                    ]);
                }
            }

        // } else {
            // try {
            //     $employee = Employee::findOrFail($this->employeeId)->first();
            //     Http::withHeaders([
            //         'Authorization' => 'Bearer ' . $this->getToken(),
            //     ])->post('notify.eskiz.uz/api/message/sms/send', [
            //         'mobile_phone' => $employee->phone,
            //         // 'message' => 'Это тест от Eskiz',
            //         'message' => $this->text,
            //         'from' => '4546',
            //     ]);
            // } catch(ModelNotFoundException $ex){
            //     throw new ApiResponseException("Employee not found!", 404);
            // }
        // }

    }

    public function getToken()
    {
        $token = Cache::remember('sms_token', now()->addMonth(), function () {
            $res = Http::post('notify.eskiz.uz/api/auth/login',[
                'email'=>'',
                'password'=>'',
            ]);
            $token = $res['data']['token'];
            return $token;
        });
        return $token;
    }
}
