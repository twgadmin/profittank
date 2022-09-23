<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\Controller;
use App\Http\Requests\Front\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\User;
use App\Models\Question;
use App\Models\QuestionsOption;
use App\Models\QuestionsCategory;
use App\Models\UsersAnswer;
use Auth;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
      //  $categories = QuestionsCategory::all();
        
        return view('frontend.dashboard.index');
    }

    public function GetQuestionbyCategory(Request $request)
    {     
        $questions = Question::QuestionbyCategory($request->categories);

        $options = QuestionsOption::getOptionsByCategories(
            ['questions.status' => 1, 'questions_categories.status' => 1],
            $request->categories
        );

        $progress = count($questions);
        $submition = count($questions);
        $submition++;
        return view('frontend.questions.show' , compact('questions', 'options','submition','progress'));
    }

    // ajaxProgressbar
    public function progressbar(Request $request){

          $progressbar = Question::ProgressBar($request->progressId , $request->total_steps);
          print_r($progressbar);
    }

   // ajaxGetprofitIncreas
    public function ajaxGetProfitIncrease(Request $request){ 

        $data =  UsersAnswer::total();
        print_r($data->toArray());

    }       


    // StoreAnsers
    public function storeAnswers(Request $request)
    {
        $data = $request->except([
            '_token',
            '_method'
        ]);

        $survey = Survey::create(['user_id' => Auth::id()]); 
       
        if (count($request->question) > 0) {
            foreach ($request->question as $questionId => $optionData) {
                $answer = [
                    
                    'survey_id'   =>  $survey->id,
                    'user_id'     =>  Auth::id(), 
                    'question_id' => $questionId
                ];

                if (isset($optionData['option']) && is_array($optionData['option'])) {
                    if (count($optionData['option']) == 1) {
                        if (isset($optionData['option'][0])) { 
                        // For single radio button value, or single drop down value
                            $answer['option_id']   = $optionData['option'][0];
                            $answer['user_answer'] = $optionData['option'][0];
                        } else {
                         // For single check box value
                            $data = array_values($optionData['option']); // resetting array keys
                            $answer['option_id']   = $data[0];
                            $answer['user_answer'] = $data[0];
                        }
                        UsersAnswer::create($answer);
                    } else {
                        // For multiple input type text fields or multiple check boxes
                        foreach ($optionData['option'] as $optionId => $userAnswer) {
                            $answer['option_id']   = $optionId;
                            $answer['user_answer'] = $userAnswer;

                            UsersAnswer::create($answer);
                        }
                    }
                } else {
                    // For single input type tex field
                    $answer['option_id']   = 0;
                    $answer['user_answer'] = $optionData['option'];

                    UsersAnswer::create($answer);
                }
            }
        }

        return 'Answers have been added successfully.'; // TODO
    }
        

    public function getCalcalations(Request $request){

        return $request->all();

    }
  
  
}