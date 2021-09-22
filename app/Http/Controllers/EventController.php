<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
   public function index()
   {
      $events = Event::all();
      return view('events.index', compact('events'));
   }

   public function create()
   {
      return view('events.create');
   }

   public function store(Request $request)
   {
      if ($request->file('image')->isValid()) {
         $requestImage = $request->file('image')->store('Events');

         /*
      if($request->hasFile('image') && $request->file('image')->isvalid()) {
     
         $requestImage = $request->image;
       
         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." .$extension;
         
         $requestImage->move(public_path('img/events'),$imageName);
          $event->image = $imageName;
     
   */
         $event =  Event::Create($request->all());
         $event->image =  $requestImage;
         $event->save();

         return redirect()
            ->route('event.index')
            ->with('msg', 'Evento Salvo com sucesso!');
      }

      $event =  Event::Create($request->all());
      $event->items = $request->items;
      $event->save();

      return redirect()
         ->route('event.index')
         ->with('msg', 'Evento Salvo com sucesso!');
   }

   // Show

   public function show($id)
   {
      $event = Event::find($id);
      return view('events.show', compact('event'));
   }


   // Deletar Produtos
   public function Delete($id)
   {
      $e = Event::findorFail($id);
         $e->delete();
         redirect()
            ->route('event.index')
            ->with('O evento foi Deletado com sucesso!');
      
      
   }
}
