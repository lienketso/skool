<?php
namespace Faq\Hook;

class FaqHook
{
    public function handle(){
        echo view('wadmin-faq::blocks.sidebar');
    }
}
