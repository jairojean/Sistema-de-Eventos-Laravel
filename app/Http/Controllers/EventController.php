<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use SebastianBergmann\Environment\Console;

class EventController extends Controller
{


   //         Index 
   public function index(){
      $events = Event::all();
      return view('events.index', compact('events'));
   }
   //         Create 
   public function create() {
      return view('events.create');
   }

   public function store(Request $request)
   {


      $event = new Event;
      $event->title = $request->title;
      $event->description = $request->description;
      $event->city = $request->city;
      $event->district = $request->district;
      $event->vip = $request->vip;
      $event->date = $request->date;
      $event->items = $request->items;
      
      $user = auth()->user();
      $event->user_id = $user->id;


     
      if ($request->file('image')->isvalid()) {

         $requestImage = $request->image;
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
         $requestImage->move(public_path('img/events'), $imageName);
         $event->image =  $requestImage;
          
         $event->save();
         return redirect()
            ->route('event.index')
            ->with('msg', 'Evento Salvo com sucesso!');
      }
         $event->image = "/img/events/show1.jpg";
      $event->save();
      
      return redirect()
         ->route('event.index')
         ->with('msg', 'Evento Salvo com sucesso!');
   }


   public function edit($id)  {
      $user = auth()->user();
          $event = Event::findorFail($id);

      if ($user->id != $event->user_id) {
         return redirect()->route('event.dashboard');
      }
         return view('events.edit', compact('event'));
   }

   public function update(Request $request)
   {
      $data = $request->all();
      if ($request->hasFile('image') && $request->file('image')->isvalid()) {

         $requestImage = $request->image;
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
         $imageName = $requestImage->move(public_path('img/events'), $imageName);
         $data['image'] = $imageName;
   
      }
      Event::findorFail($request->id)->update($data);

      return redirect()
         ->route('event.index')
         ->with('msg', 'Evento Editado com sucesso!');
   }




   //         Show 
   public function show($id)
   {
      $event = Event::find($id);
      $user = auth()->user();
      $hasUserJoin = false;

      if ($user) {
         $userEvents = $user->eventAsParticipant->toArray();
         foreach ($userEvents as $userEvent) {
            if ($userEvent['id'] == $id) {
               $hasUserJoin = true;
            }
         }
      }
         $eventOwner = User::where('id', $event->user_id)->first()->toArray();

             return view('events.show', compact('event', 'eventOwner', 'hasUserJoin'));
   }

   //         Destroy
   public function Destroy($id) {
      $e = Event::findorFail($id);
      $e->delete();

      return redirect('event.dashboard')
         ->with('O evento foi Deletado com sucesso!');
   }

   public function dashboard(){
      $user = auth()->user();
       $events = $user->events;
          $eventAsParticipant = $user->eventAsParticipant;

      return view('events.dashboard', compact('events', 'eventAsParticipant'));
   }

   //         Participar do Evento
   public function joinEvent($id) {
      $user = auth()->user();
         $user->eventAsParticipant()->attach($id);
           $event = Event::findorFail($id);
      return redirect()
         ->route('event.dashboard')
         ->with('msg', 'Presença Confirmada com sucesso!');
   }


   public function leaveEvent($id)  {
      $user = auth()->user();
         $user->eventAsParticipant()->detach($id);
             $event = Event::findorFail($id);

      return redirect()
         ->route('event.dashboard')
         ->with('msg', 'Você saiu do Evento!');
   }
}
