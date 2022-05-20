<?php

namespace App\Models;

use App\Models\Resources\Faq;

class FaqGetter{
    public function getAllFaqs(){
        return Faq::all();
    }
}

