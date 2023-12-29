<?php

namespace Groups\Hook;

class GroupsHook
{
    public function handle(){
        echo view('wadmin-groups::blocks.sidebar');
    }
}
