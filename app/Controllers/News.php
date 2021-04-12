<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends Controller {

    public function index() {
        $model = new NewsModel;

        $data = [
            'news' => $model->getNews()
        ];

        echo view('templates/header');
        echo view('news/overview', $data);
        echo view('templates/footer');
    }

    public function noticias($id = null) {
        $model = new NewsModel;
        $data ['news'] = $model->getNews($id);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não pode encontrar o arquivo.");
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header');
        echo view('news/noticia', $data);
        echo view('templates/footer');
    }

    public function create() {
        helper('form');

        echo view('templates/header');
        echo view('news/create');
        echo view('templates/footer');
    }

    public function save() {
        helper('form');
        $model = new NewsModel();
        $rules = [
            'title' => 'required|min_length[10]|max_length[100]',
            'body' => 'required'
        ];
        if ($this->validate($rules)) {
            $model->save([
                'id' => $this->request->getVar('id'),
                'title' => $this->request->getVar('title'),
                'slog' => url_title($this->request->getVar('title')),
                'body' => $this->request->getVar('body'),
            ]);
            if ($this->request->getVar('id') === '') {
                $data['sucess'] = "Notícia Salva com Sucesso!";
            } else {
                $data['sucess'] = "Notícia Alterada com Sucesso!";
            }
            echo view('templates/header');
            echo view('news/create', $data);
            echo view('templates/footer');
        } else {
            echo view('templates/header');
            echo view('news/create');
            echo view('templates/footer');
        }
    }

    public function seeNews($id = null) {
        $model = new NewsModel();

        $data['news'] = $model->getNews($id);

        echo view('templates/header');
        echo view('news/noticias', $data);
        echo view('templates/footer');
    }

    public function edit($id = null) {
        $model = new NewsModel();
        $data['news'] = $model->getNews($id);

        if (empty($data['news'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException("Não foi encontrado este item");
        }

        $data = [
            'id' => $data['news']['id'],
            'title' => $data['news']['title'],
            'body' => $data['news']['body']
        ];

        echo view('templates/header');
        echo view('news/create', $data);
        echo view('templates/footer');
    }

    public function delete($id = null) {
        $model = new NewsModel();
        $model->delete($id);
        $this->index();
    }

}
