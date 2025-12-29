<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = [
            ['id'=>1,'title'=>'Reunião de Pais','date'=>now()->addDays(10)],
        ];
        $meta = ['title'=>'Eventos - '.config('app.name'),'meta_description'=>'Calendário de eventos.'];
        return view('pages.events.index', compact('events'))->with($meta);
    }

    public function show($id)
    {
        $event = ['id'=>$id,'title'=>'Reunião de Pais','date'=>now()->addDays(10),'description'=>'Descrição do evento.'];
        $meta = ['title'=>$event['title'].' - '.config('app.name'),'meta_description'=>substr($event['description'],0,150)];
        return view('pages.events.show', compact('event'))->with($meta);
    }
}
