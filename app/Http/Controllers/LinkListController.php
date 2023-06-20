<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkListController extends Controller
{
    //тип шаблона верхнего уровня "нюансы приготовления, время готовки и пропорции
    public function index($listName)
    {
        $links = (object) [
            0 => (object) [
                'title' => 'Пельмешки-хинкалии',
                'link' => 'link1',],
            1 => (object) [
                'title' => 'Рыбы. Общие сведения',
                'link' => 'link2',],
            2 => (object) [
                'title' => 'Рыбный бульен',
                'link' => 'link3',],
            3 => (object) [
                'title' => 'Говяжий бульен. Описание процесса',
                'link' => 'link4',],
            4 => (object) [
                'title' => 'Яйца',
                'link' => 'link5',],
            5 => (object) [
                'title' => 'Рыба в духовке',
                'link' => 'link6',],
            6 => (object) [
                'title' => 'Мясо в духовке. Общие принципы',
                'link' => '',],
        ];

        return view('link-list.index', compact('links'));
    }
}
