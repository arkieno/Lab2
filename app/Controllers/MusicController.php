<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicModel;

class MusicController extends BaseController
{
    private $music;
    private $playlist;

    public function __construct(){
        $this->music = new \App\models\MusicModel();
        $this->playlist = new \App\models\PlaylistModel();
    }
    public function addsong(){
            $data["musicname"] = $this->request->getVar("musicname");
            $this->music->save($data);
            return redirect()->to('main');
    }
    public function createplaylist(){
        $data["playlist"] = $this->request->getVar("playlist");
        $this->playlist->save($data);
        return redirect()->to('main');
    }
    public function index()
    {
        $data= ['music' => $this->music->findAll(),
        'playlist' => $this->playlist->findAll()];
        return view('music',$data);
    }
    public function searchsong()
{
    $searchQuery = $this->request->getVar('search');
    $data = [
        'music' => [],
        'playlist' => $this->playlist->findAll()
    ];

    if ($searchQuery) {
        $main = new MusicModel();
        $data['music'] = $main->like('musicname', $searchQuery)->findAll();
    }

    return view('music', $data);
}

}