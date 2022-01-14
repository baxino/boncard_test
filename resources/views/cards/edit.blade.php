
@extends('layout_master')


@section('content')

<div class="col-5">
   
    
    <div class="col mx-auto">
        
        
        @if ($errors->any())
         <div class="w-full mt-5">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"">
         <label class="text-center mb-3 font-bold">Błędy w formularzu:</label>
         
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
         </div>
@endif
        
        
<div class="h-25"></div>
        
        
        <div class="row fs-3">
            <label class="text-center">Edycja karty numer {{$card->numerKarty}} :</label>
            
        </div>
        <form method="POST" action="{{ route('cards.update',$card->id)}}"  >
       @csrf
       @method('PUT')
       
       
       <div class="form-group">
    <label for="numerKarty">Wpisz numer karty</label>
    <input type="text" class="form-control liczba_input" name="numerKarty" id="numerKarty" readonly value="{{$card->numerKarty}}">
     </div>
    <div class="form-group">
    <label >PIN</label>
    <input type="text" class="form-control liczba_input" name="pin"  placeholder="podaj PIn do karty " value="{{$card->PIN}}">
     </div>
    <div class="form-group">
    <label >Podaj datę ważności</label>
    <input type="date" class="form-control" name="dataWaznosci"  placeholder="dd.mm.yyyy " value="{{$card->dataWaznosci}}">
     </div>
       <div class="form-group">
    <label >Podaj kwotę</label>
    <input type="text" class="form-control kwota" name="kwota"  placeholder="Podaj kwotę " value="{{number_format($card->kwota,2)}}">
     </div>
       <div class="row mt-4">
        <button type="submit" class="btn btn-primary">Aktualizuj kartę</button>
       </div>
         
              
    
</form>

<div class="w-full mt-5">
    
    @if (session('status'))
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div>
        <p>{{session('status')}}</p>
    </div>
  </div>
</div>
					@elseif(session('failed'))
						<div role="alert">
  <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
    Danger
  </div>
  <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
    <p>{{session('failed')}}</p>
  </div>
</div>
					@endif
    
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-5">
    <a href="{{route('main')}}" class="btn btn-primary">Powrót do listy kart
    </a>
    </div>
</div>

    </div>
</div>
    

@endsection

