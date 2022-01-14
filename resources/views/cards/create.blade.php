
@extends('layout_master')


@section('content')

<div class="col-5 bg-white mt-5">
   
    
    <div class="col ">
        
        
        @if ($errors->any())
         
    <div class="alert alert-danger">
         <label class="text-center mb-3 font-bold">Błędy w formularzu:</label>
         
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        
@endif
        
        
<div class="h-25"></div>
        
        
        <div class="col-9 text-center">
            
            <label class="text-lg">Dodanie karty:</label>
        </div>
        <form method="POST" action="{{ route('cards.store')}}"  >
       @csrf
       
       
       
       <div class="form-group">
    <label for="numerKarty">Wpisz numer karty</label>
    <input type="text" class="form-control liczba_input" name="numerKarty" id="numerKarty" placeholder="Wpisz numer karty ">
     </div>
    <div class="form-group">
    <label >PIN</label>
    <input type="text" class="form-control liczba_input" name="pin"  placeholder="podaj pin do karty ">
     </div>
    <div class="form-group">
    <label >Podaj datę ważności</label>
    <input type="date" class="form-control" name="dataWaznosci"  placeholder="dd.mm.yyyy ">
     </div>
       <div class="form-group">
    <label >Podaj kwotę </label>
    <input type="text" class="form-control kwota" name="kwota"  placeholder="Podaj kwotę ">
     </div>
       
       <div class="row mt-4">
        <button type="submit" class="btn btn-primary">Dodaj kartę</button>
       </div>
         
              
    
</form>

<div class="row mt-5">
    @if (session('status'))

 <div class="alert alert-success" role="alert">
  {{session('status')}}
</div>
@elseif(session('failed'))
<div role="alert">
    <div class="alert alert-danger">
    <p>{{session('failed')}}</p>
  </div>
</div>
@endif
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-5">
    <a href="{{route('cards.index')}}" class="btn btn-primary">Powrót do listy kart
    </a>
    </div>
</div>

    </div>
</div>
    

@endsection

