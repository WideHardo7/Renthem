<?php

namespace App\Models;

use App\Models\Resources\Faq;

class FaqGetter{
    public function getAllFaqs(){
        return Faq::all();
    }
    
    public function getThisFaq($id){
        return Faq::where('FaqId',$id)->first();
    }
            
}

